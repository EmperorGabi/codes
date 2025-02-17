<?php
function terminator($message = 'An error occurred', $statusCode = 400)
{
    http_response_code($statusCode);
    die($message);
}

function successResponse($message, $statusCode = 200)
{
    http_response_code($statusCode);
    die($message);
}

function successResponseObj($message)
{
    http_response_code(200);
    die(json_encode($message));
}

function validatePrice($str)
{
    $num = str_replace(',', '', $str);
    if ($num) {
        return $num;
    }
    throw new Exception('Invalid price');
}

function validatePriceNull($str)
{
    $pattern = '/^\d{1,3}(?:,\d{3})*$/';
    if (preg_match($pattern, $str)) {
        return $str;
    } else {
        return null;
    }
}

function validateLocation($string)
{
    $pattern = '/^([A-Za-z]+), ([A-Za-z]+), ([A-Za-z]+), ([A-Za-z]+)$/';
    if (preg_match($pattern, strtolower($string), $matches)) {
        return $matches;
    }
    return null;
}

function parseInputJson()
{

    $postData = file_get_contents('php://input');

    $data = json_decode($postData, true);

    if (json_last_error() !== JSON_ERROR_NONE) {

        terminator('Error parsing data');
    }

    if (!is_array($data)) {

        terminator('Invalid data format');
    }

    return $data;
}

function generateNumericOTP($n = 6)
{

    $generator = "1357902468";

    $result = "";

    for ($i = 1; $i <= $n; $i++) {

        $result .= substr($generator, (rand() % (strlen($generator))), 1);
    }

    return $result;
}

function generateAlphaNumericCode($n = 6)
{
    $generator = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand() % (strlen($generator))), 1);
    }
    return $result;
}

function generateSecurePassword($length = 12): string {
    return substr(bin2hex(random_bytes($length)), 0, $length);
}


function httpRequest(array $options): AuthResponse
{
    $ch = curl_init();
    // Extract the values from the $options array

    $url = $options['url'] ?? '';

    $method = strtoupper($options['method'] ?? 'POST');

    $body = $options['body'] ?? [];

    $headers = $options['headers'] ?? [];

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    curl_setopt($ch, CURLOPT_HEADER, true);

    if (!empty($headers)) {

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

    }


    // Handle POST request

    if ($method === 'POST' && !empty($body)) {

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body)); 

    } elseif ($method === 'GET' && !empty($body)) {
        $url .= '?' . http_build_query($body);

        curl_setopt($ch, CURLOPT_URL, $url);
    }

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return new AuthResponse(curl_getinfo($ch, CURLINFO_HTTP_CODE), 'Error: ' . curl_error($ch));
    }

    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

    $bodyContent = substr($response, $headerSize);
    // Close cURL session
    curl_close($ch);
    
    return new AuthResponse($statusCode, $bodyContent);
}
