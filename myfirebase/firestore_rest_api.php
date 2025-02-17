<?php
function import() {
    $position = strpos(dirname(__FILE__), '// root directory name');
    return substr(dirname(__FILE__), 0, $position + strlen('// root directory name'));
}

require_once import().'/utils/authenticator.php';
require_once import().'/utils/gabrielfirebase.php';

use GuzzleHttp\Client;
use Google\Auth\Credentials\ServiceAccountCredentials;

class FirestoreRestApi
{
    private $client;
    private $serviceAccount;
    private $accessToken;
    private $projectId;

    /**
     * FirestoreRestApi constructor.
     * @param string $serviceAccountPath Path to the service account JSON file.
     * @param string $projectId Firebase project ID.
     */
    public function __construct($serviceAccountKey)
    {
        $this->client = new Client();
        $this->serviceAccount = json_decode($serviceAccountKey, true);
        $this->projectId = $this->serviceAccount['project_id'];
        $this->accessToken = $this->generateAccessToken();
    }

    /**
     * Generates an access token using the service account credentials.
     * @return string Access token.
     * @throws Exception If token generation fails.
     */
     private function generateAccessToken(): string
     {
         try {
             return GabrielFirebase::generateAccessToken();
         } catch (\Exception $e) {
             // Handle errors
             terminator('Something went wrong. Try again');
         }
     }


    /**
     * Creates a document in a Firestore collection.
     * @param string $collection Collection name.
     * @param string $documentId Document ID.
     * @param array $data Document data.
     * @return array API response.
     */
    public function createDocument(string $collection, array $data): array
    {
        $url = "https://firestore.googleapis.com/v1/projects/{$this->projectId}/databases/(default)/documents/$collection";
        $response = $this->client->post($url, [
            'headers' => [
                'Authorization' => "Bearer {$this->accessToken}",
                'Content-Type' => 'application/json',
            ],
            'json' => ['fields' => $this->formatFields($data),],
        ]);

        $responseData = json_decode($response->getBody(), true);

        if (isset($responseData['name'])) {
            $documentNameParts = explode('/', $responseData['name']);
            $documentId = end($documentNameParts);
            $responseData['docID'] = $documentId; // Add the document ID to the response array
        }

        return $responseData;
    }

    public function createDocumentWithID(string $collection, string $documentId, array $data): array
    {
        // URL with document ID specified
        $url = "https://firestore.googleapis.com/v1/projects/{$this->projectId}/databases/(default)/documents/{$collection}/{$documentId}";

        $response = $this->client->patch($url, [
            'headers' => [
                'Authorization' => "Bearer {$this->accessToken}",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'fields' => $this->formatFields($data),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    private function formatFields(array $data): array
    {
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[$key] = $this->mapToFirestoreType($value);
        }
        return $fields;
    }

    private function mapToFirestoreType($value): array
    {
        # implementation has been moved to GabrielFirebase;
        return [];
    }

    /**
     * Updates a document in a Firestore collection.
     * @param string $collection Collection name.
     * @param string $documentId Document ID.
     * @param array $data Updated data.
     * @return array API response.
     */
    public function updateDocument(string $collection, string $documentId, array $data): array
    {
        // Fields to update
        $updateMaskPaths = array_keys($data);

        // Construct the URL with multiple `updateMask.fieldPaths`
        $updateMaskQuery = implode(
            '&updateMask.fieldPaths=',
            array_map('urlencode', $updateMaskPaths)
        );
        $url = "https://firestore.googleapis.com/v1beta1/projects/{$this->projectId}/databases/(default)/documents/$collection/$documentId?updateMask.fieldPaths=$updateMaskQuery";

        $response = $this->client->patch($url, [
            'headers' => [
                'Authorization' => "Bearer {$this->accessToken}",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'fields' => $this->formatFields($data), // Formats the fields into Firestore's structure
            ],
        ]);

        return json_decode($response->getBody(), true);
    }




    /**
     * Deletes a document from a Firestore collection.
     * @param string $collection Collection name.
     * @param string $documentId Document ID.
     * @return bool True on success.
     */
    public function deleteDocument(string $collection, string $documentId): bool
    {
        $url = "https://firestore.googleapis.com/v1/projects/{$this->projectId}/databases/(default)/documents/$collection/$documentId";
        $response = $this->client->delete($url, [
            'headers' => [
                'Authorization' => "Bearer {$this->accessToken}",
            ],
        ]);

        return $response->getStatusCode() === 200;
    }



    /**
     * Recursively normalizes Firestore document fields into simple PHP values.
     *
     * @param array $firestoreDocument
     * @return array
     */
    function normalizeFirestoreDocument(array $firestoreDocument): array
    {
        $fields = $firestoreDocument['fields'] ?? [];
        $result = [];
        foreach ($fields as $key => $value) {
            $result[$key] = $this->parseFirestoreValue($value);
        }
        return $result;
    }

    /**
     * Converts a Firestore field value to a native PHP value.
     *
     * @param array $fieldValue
     * @return mixed
     */
    function parseFirestoreValue(array $fieldValue)
    {
        if (isset($fieldValue['stringValue'])) {
            return $fieldValue['stringValue'];
        }
        if (isset($fieldValue['nullValue'])) {
            return null;
        }
        if (isset($fieldValue['integerValue'])) {
            return (int) $fieldValue['integerValue'];
        }
        if (isset($fieldValue['doubleValue'])) {
            return $fieldValue['doubleValue'];
        }
        if (isset($fieldValue['booleanValue'])) {
            return (bool) $fieldValue['booleanValue'];
        }
        if (isset($fieldValue['arrayValue'])) {
            return array_map([$this,'parseFirestoreValue'], $fieldValue['arrayValue']['values'] ?? []);
        }
        if (isset($fieldValue['mapValue'])) {
            return $this->normalizeFirestoreDocument(['fields' => $fieldValue['mapValue']['fields']]);
        }
        if (isset($fieldValue['timestampValue'])) {
            return new \DateTime($fieldValue['timestampValue']);
        }
        if (isset($fieldValue['geoPointValue'])) {
            return [
                'latitude' => $fieldValue['geoPointValue']['latitude'],
                'longitude' => $fieldValue['geoPointValue']['longitude'],
            ];
        }
        // Add other Firestore types as needed (e.g., timestampValue, geopointValue)
        return null; // Fallback for unknown types
    }

    public function getGeoHash(string $collection, string $startAt, string $endAt): array
    {
        # implementation has been moved to GabrielFirebase;
        return [];
    }
}
