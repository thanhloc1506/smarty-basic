<?php
require '../../models/users.php';
$User = new User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['u_id'];
    $name = $_POST['u_name'];
    $username = $_POST['u_username'];
    $password = $_POST['u_password'];

    $User->updateUser($id, $name, $username, $password);
}
header("location: ../../index.php?smarty=dashboard");