<?php

require 'libs/Smarty.class.php';
require '../models/users.php';

include '../config.php';

session_start();
$smarty = new Smarty;
$User = new User;

if ($_GET['smarty'] == 'dashboard') {
    if (empty($_SESSION['uid'])) {
        header("location: index.php");
    }

    $user_id = $_SESSION['uid'];
    $user_list = $User->getListUser();
    $user = $User->getUserById($user_id);
    $smarty->assign("user_list", $user_list);
    $smarty->assign("user", $user);
    $smarty->display("layout/dashboard.tpl");
} else if ($_GET['smarty'] == 'error') {
    $msg = $_GET['msg'];
    $smarty->assign("msg", substr($msg, 1, strlen($msg) - 2));
    $smarty->display("error.tpl");
}

if ($_SESSION['uid']) {
    header("location: index.php?smarty=dashboard");
} else if (empty($_GET['smarty'])) {
    $smarty->display("auth/login.tpl");
}