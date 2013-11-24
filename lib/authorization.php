<?php
if (isset($_POST['name']) && isset($_POST['password'])) {
    require_once "user_class.php";
    $user = User::getObject();

    $name = trim(strip_tags($_POST['name']));
    $password = trim(strip_tags($_POST['password']));

    if ($name == '' || strlen($name) < 1) {
        $res = 'Field with the name cannot be blank';
    } else if (strlen($name) > 30) {
        $res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
    } else if ($password == '' || strlen($password) < 1) {
        $res = 'Field with the password cannot be blank';
    } else if (strlen($password) > 30) {
        $res = 'You have exceeded the maximum permissible length of the password, it is equal to 30';
    } else {
        $res = $user->login($name, $password);
        if ($res) {
            $res = true;
        } else {
            $res = 'Check the name or password';
        }
    }
    echo($res);
}