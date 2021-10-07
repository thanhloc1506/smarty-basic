<?php
session_start();
function text_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
require '../smarty/libs/mySmarty.class.php';
$smarty = new mySmarty;

if ($_SESSION['uid']) {
    header("location: ../pages/dashboard.php");
} else {
    header("location: ../pages/login.php");
}