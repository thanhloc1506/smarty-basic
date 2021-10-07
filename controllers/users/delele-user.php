<?php
require '../../models/users.php';
$id = $_GET['id'];
$User = new User;

$User->deleteUser($id);

header("location: ../../index.php?smarty=dashboard");