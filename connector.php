<?php
    require_once 'database.php';
    require_once 'firebase.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "";

    function importer() {
        $position = strpos(dirname(__FILE__), 'root directory');
        return substr(dirname(__FILE__), 0, $position + strlen('root directory'));
    }

    define('importer', importer());

    $connector = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $database = new Database($connector);

    $firebase = new Firebase($database);
?>