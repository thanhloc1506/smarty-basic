<?php
require '../smarty/libs/mySmarty.class.php';

$smarty = new mySmarty;
$msg = $_GET['msg'];
$smarty->assign("msg", substr($msg, 1, strlen($msg) - 2));
$smarty->display("error.tpl");