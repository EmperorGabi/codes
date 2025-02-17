<?php
    define('service_account_key','{
        // provide firebase service account here
      }');
?>

<?php
require importer().'/vendor/autoload.php';
require_once 'firestore_rest_api.php';
require_once 'geofire_common_min.php';

use Kreait\Firebase\Factory;

class AuthResponse {
    public $statusCode;
    public $body;
    # TODO add user type

    function __construct($statusCode, $body) {
        $this->statusCode = $statusCode;
        $this->body = $body;
    }



    function decode() {

        return json_decode($this->body, true);

    }

}

class Firebase {
    public $factory;
    public $auth;
    public $firestore;
    public $fcm;
    public Database $database;
    public function __construct(Database $database) {
        $this->factory = (new Factory)->withServiceAccount(service_account_key);
        $this->auth = $this->factory->createAuth();
        $this->firestore = new FirestoreRestApi(service_account_key);
        $this->fcm = $this->factory->createMessaging();
        $this->database = $database;
    }

    public function deleteUser($userID) {
        $this->auth->deleteUser($userID);
        $this->database->deleteUser($userID);
    }

    public function createClient($name, $email, $password, $referalCode) {
        $user = $this->auth->createUserWithEmailAndPassword($email, $password);
        $this->auth->createCustomToken($user->uid,['accountType' => 'client']);
        $this->database->createClient($user->uid, $email, $name, $referalCode);
    }

    public function signInWithEmailAndPassword($email, $password) {
        return $this->auth->signInWithEmailAndPassword($email, $password);
    }

    public function createCustomToken($userID, $claims) {
        return $this->auth->createCustomToken($userID, $claims);
    }

    private function authenticate($token) {
        $res = $this->auth->verifyIdToken($token, true);
        return $res->claims();
    }

    public function authenticator() : AuthResponse {
        try {
            $headers = array_change_key_case(getallheaders(), CASE_LOWER);
            if (!isset($headers['authorization']) 
                || !isset($headers['id']) ) {
                return new AuthResponse(400, 'Missing credentials');
            }

            $authToken = str_replace("Bearer ", "", $headers['authorization']);
            $userID = $headers['id'];

            $res = $this->authenticate($authToken);
            if ($userID != $res->get('sub')) {
                return new AuthResponse(401, 'Unauthorized user');
            }

            return new AuthResponse(200, $res->get('sub'));
        } catch (Exception $e) {
            return new AuthResponse(400, 'Authentication failed');
        }

    }

    public function getUserByID($uid) {
        try {
            $user = $this->auth->getUser($uid);
            return $user;
        } catch (Exception $e) {
            return null;
        }
    }

    public function sendNotification($title, $body, $notType, $id, $fcmToken, $receiverID) {
        $message = [
            'token' => $fcmToken,
            'data' => [
                'title' => $title,
                'body' => $body,
                'type' => $notType,
                'id' => $id,
            ],
            'android' => ['priority' => 'high']
        ];

        try {
            if ($fcmToken != null) {
                $this->fcm->send($message);
            }
            $this->database->storeNotification($receiverID, $message);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function findWithinRadius($center, $radiusInM=10) {
        # implementation has been moved to GabrielFirebase;
    }
}
?>
