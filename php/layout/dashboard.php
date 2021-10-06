<?php
session_start();
include '../../config.php';

$sql = 'SELECT * from user where role=1';

$user_result = $conn->query($sql);

$user_list = [];

if (mysqli_num_rows($user_result) > 0) {
    $idx = 0;
    while ($user = mysqli_fetch_assoc($user_result)) {
        $user_list[$idx++] = json_encode($user);
    }
}

$user_id = $_SESSION['uid'];
$user = null;

$sql = "SELECT * from user where UID = '$user_id'";
$user_query = $conn->query($sql);
$user = $user_query->fetch_assoc();