<?php
@include "../../config.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['u_id'];
    $name = $_POST['u_name'];
    $username = $_POST['u_username'];
    $password = $_POST['u_password'];

    $sql = "UPDATE user SET FULL_NAME = '$name', USERNAME = '$username', PASS = '$password' where UID = '$id'";
    $conn->query($sql);
}
header("location: ../../index.php?smarty=dashboard");