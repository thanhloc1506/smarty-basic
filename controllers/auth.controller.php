<?php
session_start();
function text_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $error = "";
    $username = $password = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['username'])) {
            $error = "something went wrong!";
        } else {
            $username = text_input($_POST["username"]);
        }
        if (empty($_POST['password'])) {
            $error = "something went wrong!";
        } else {
            $password = text_input($_POST["password"]);
        }
    }

    require '../models/users.php';

    $msg = "Something went wrong";
    $User = new User;

    $user_info = $User->getUserByUsername($username);
    if ($user_info !== null) {
        $isValidPassword = $password == $user_info['PASS'];
        $isAdmin = $user_info['role'] == 0;
        if ($isValidPassword && $isAdmin) {
            $_SESSION['uid'] = $user_info['UID'];
            header("location: ../pages/dashboard.php");
        } else {
            $msg = "Username or Password is invalid!";
            header("location: ../pages/error.php?msg='$msg'");
        }
    } else {
        $msg = "Username or Password is invalid!";
        header("location: ../pages/error.php?msg='$msg'");
    }
} else if ($_GET['req'] == 'logout') {
    session_unset();
    header('location: ../index.php');
}