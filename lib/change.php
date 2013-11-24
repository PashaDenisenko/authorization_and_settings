<?php
if (isset($_POST['name'])) {
    require_once "user_class.php";
    $user = User::getObject();
    $name = trim(strip_tags($_POST['name']));
    if ($name == '' || strlen($name) < 1) {
        $res = 'Field with the name cannot be blank';
    } else if (strlen($name) > 30) {
        $res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
    } else {
        if ($user->findName($name) == 0) {
            $res = $user->changeName($name);
            if ($res) {
                $res = 'The name was changed';
            } else {
                $res = 'An error occurred when connecting to the database';
            }
        } else {
            $res = 'Sorry, but a user with that name already exists, please enter another';
        }
    }
    echo($res);
}

if (isset($_POST['password']) && isset($_POST['old_password'])) {
    require_once "user_class.php";
    $user = User::getObject();
    $password = trim(strip_tags($_POST['password']));
    $old_password = trim(strip_tags($_POST['old_password']));
    if ($password == '' || strlen($password) < 1) {
        $res = 'Field with the password cannot be blank';
    } else if (strlen($password) > 30) {
        $res = 'You have exceeded the maximum permissible length of the password, it is equal to 30';
    } else if ($old_password == '' || strlen($old_password) < 1) {
        $res = 'Field with the old password cannot be blank';
    } else if (strlen($old_password) > 30) {
        $res = 'You have exceeded the maximum permissible length of the old password, it is equal to 30';
    } else {
        $res = $user->changePassword($password, $old_password);
        if ($res) {
            $res = 'The password was changed';
        } else {
            $res = 'An error occurred when connecting to the database';
        }
    }
    echo($res);
}

if (isset($_POST['email'])) {
    require_once "user_class.php";
    $user = User::getObject();
    $email = trim(strip_tags($_POST['email']));
    if ($email == '' || strlen($email) < 1) {
        $res = 'Field with the name cannot be blank';
    } else if (strlen($email) > 30) {
        $res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
    } else if (!preg_match("/^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i", $email)) {
        $res = 'Incorrect format email';
    } else {
        $res = $user->changeEmail($email);
        if ($res) {
            $res = 'The email was changed';
        } else {
            $res = 'An error occurred when connecting to the database';
        }
    }
    echo($res);
}