<?php

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'Toyslk.com';

$conn = new mysqli($server, $username, $password, $database);
if ($conn) {
    // echo ("Database connected successfully.");
}else{
    echo ("database connection error !");
}

?>