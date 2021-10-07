<?php

$server_name = '127.0.0.1';
$db_username = 'root';
$db_password = 'LocT@2031';
$db_name = 'manament_user';

$conn = new mysqli($server_name, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}