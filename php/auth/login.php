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


    @include "../../config.php";
    $sql = "";
    $msg = "Something went wrong";
    if ($username) {
        $sql = $sql . "select * from user where '$username'=username; ";
        $user = $conn->query($sql);
        if ($user->num_rows === 1) {
            $user_info = $user->fetch_assoc();
            $hash =  $user_info['PASS'];
            $isValidPassword = $password == $hash;
            $isAdmin = $user_info['role'] == 0;
            if ($isValidPassword && $isAdmin) {
                $_SESSION['uid'] = $user_info['UID'];
                echo $_SESSION['uid'];
                header("location: ../../index.php?smarty=dashboard");
            } else {
                $msg = "Username or Password is invalid!";
            }
        } else {
            $msg = "Username or Password is invalid!";
        }
        header("location: ../../index.php?smarty=error&msg='$msg'");
    }
}