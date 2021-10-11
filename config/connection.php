<?php
//db details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_nexocash';

//Connect and select the database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>