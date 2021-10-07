<?php
require "../smarty/libs/mySmarty.class.php";

$smarty = new mySmarty;

session_start();

if ($_SESSION['uid']) {
    header("location: dashboard.php");
}
$smarty->display("auth/login.tpl");