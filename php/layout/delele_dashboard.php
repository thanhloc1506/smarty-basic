<?php
@include '../../config.php';
$id = $_GET['id'];
$sql = "DELETE FROM user where UID = '$id'";
$conn->query($sql);
header("location: ../../index.php?smarty=dashboard");