<?php

require './libs/Smarty.class.php';

include './config.php';

session_start();
$smarty = new Smarty;

if ($_GET['smarty'] == 'dashboard') {
	if (empty($_SESSION['uid'])) {
		header("location: index.php");
	}

	include './php/layout/dashboard.php';

	$smarty->assign("user_list", $user_list);
	$smarty->assign("user", $user);
	$smarty->display("./layout/dashboard.tpl");
} else if ($_GET['smarty'] == 'error') {
	$msg = $_GET['msg'];
	$smarty->assign("msg", substr($msg, 1, strlen($msg) - 2));
	$smarty->display("./error.tpl");
}

if ($_SESSION['uid']) {
	header("location: index.php?smarty=dashboard");
} else if (empty($_GET['smarty'])) {
	$smarty->display("./auth/login.tpl");
}