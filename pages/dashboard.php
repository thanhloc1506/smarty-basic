<?php
require "../smarty/libs/mySmarty.class.php";
require '../models/users.php';

session_start();

$User = new User;
$smarty = new mySmarty;

if ($_SESSION['uid']) {
    $user_id = $_SESSION['uid'];

    $user_list = $User->getListUser();
    $user = $User->getUserById($user_id);

    $smarty->assign("user_list", $user_list);
    $smarty->assign("user", $user);

    $smarty->display("layout/dashboard.tpl");
} else {
    header("location: login.php");
}