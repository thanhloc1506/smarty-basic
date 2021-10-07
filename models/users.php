<?php

class User
{

    function getUserByUsername($username)
    {
        @include 'config.php';
        $sql = "select * from user where '$username'=username; ";
        $user = $conn->query($sql);
        if ($user->num_rows === 1) {
            $user_info = $user->fetch_assoc();
            return $user_info;
        }
        return null;
    }

    function getListUser()
    {
        @include 'config.php';
        $sql = 'SELECT * from user where role=1';

        $user_result = $conn->query($sql);

        $user_list = [];

        if (mysqli_num_rows($user_result) > 0) {
            $idx = 0;
            while ($user = mysqli_fetch_assoc($user_result)) {
                $user_list[$idx++] = json_encode($user);
            }
        }
        return $user_list;
    }

    function getUserById($user_id)
    {
        @include 'config.php';
        $sql = "SELECT * from user where UID = '$user_id'";
        $user_query = $conn->query($sql);
        $user = $user_query->fetch_assoc();
        return $user;
    }
    function createUser($id, $name, $username, $pass)
    {
        include 'config.php';
        $sql = "INSERT INTO user (UID, FULL_NAME, USERNAME, PASS) values('$id', '$name', '$username', '$pass')";
        $conn->query($sql);
    }

    function deleteUser($id)
    {
        include 'config.php';
        $sql = "DELETE FROM user where UID = '$id'";
        $conn->query($sql);
    }

    function updateUser($id, $name, $username, $pass)
    {
        include 'config.php';
        $sql = "UPDATE user SET FULL_NAME = '$name', USERNAME = '$username', PASS = '$pass' where UID = '$id'";
        $conn->query($sql);
    }
}