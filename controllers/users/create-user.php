<?php
require "../../models/users.php";
$User = new User;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $name = $year = '';
    if (!empty($_POST['c_id'])) {
        $id = $_POST['c_id'];
    }
    if (!empty($_POST['c_name'])) {
        $name = $_POST['c_name'];
    }
    if (!empty($_POST['c_username'])) {
        $username = $_POST['c_username'];
    }
    if (!empty($_POST['c_password'])) {
        $pass = $_POST['c_password'];
    }
    $User->createUser($id, $name, $username, $pass);
}

header("location: ../../pages/dashboard.php");