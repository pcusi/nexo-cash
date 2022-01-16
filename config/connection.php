<?php
//db details
/*
    $host = 'localhost';
    $username = 'nexocash_admin';
    $password = '_y9SMDxaOIRZ';
    $database = 'nexocash_db';
*/
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'nexocash_db';

//Connect and select the database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>