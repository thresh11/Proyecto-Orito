<?php

$host = "localhost";
$dbname = "orito_verde";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,username: $username, password: $password,database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;