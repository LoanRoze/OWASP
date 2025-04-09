<?php


function getDbConnection() {
    include_once "../env.php";

    $host = $dbInfo['host'];
    $dbName = $dbInfo['dbName'];
    $user = $dbInfo['user'];
    $pass = $dbInfo['pass'];

    $connection = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $connection;
}