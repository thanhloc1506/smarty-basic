<?php
include "../../config.php";
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
    $sql = "INSERT INTO user (UID, FULL_NAME, USERNAME, PASS) values('$id', '$name', '$username', '$pass')";
    $conn->query($sql);
}

header("location: ../../index.php?smarty=dashboard");