<?php
if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['email'])) {
    require_once "user_class.php";
    $user = User::getObject();

    $name = trim(strip_tags($_POST['name']));
    $password = trim(strip_tags($_POST['password']));
    $password_again = trim(strip_tags($_POST['password_again']));
    $email = trim(strip_tags($_POST['email']));

    if ($name == '' || strlen($name) < 1) {
        $res = 'Field with the name cannot be blank';
    } else if (strlen($name) > 30) {
        $res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
    } else if ($password == '' || strlen($password) < 1) {
        $res = 'Field with the password cannot be blank';
    } else if (strlen($password) > 30) {
        $res = 'You have exceeded the maximum permissible length of the password, it is equal to 30';
    } else if ($password != $password_again) {
        $res = 'Check passwords they do not match';
    } else if ($email == '' || strlen($email) < 1) {
        $res = 'Field with the email cannot be blank';
    } else if (strlen($email) > 30) {
        $res = 'You have exceeded the maximum permissible length of the email, it is equal to 30';
    } else if (!preg_match("/^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i", $email)) {
        $res = 'Incorrect format email';
    } else {
        if ($user->findName($name) == 0) {
            $subject = 'Congratulations';
            $message = 'Congratulations, you have successfully registered';
            if (!mail($email, $subject, $message, 'From:pashadenisenko@mail.ru')) {
                $res = 'An error occurred registering the reason may be incorrectly specified email';
            } else {
                $res = $user->regUser($name, $password, $email);
                if ($res) {
                    $res = 'Congratulations, registration was successful';
                } else {
                    $res = 'Sorry, there was an error connecting to the database';
                }
            }
        } else {
            $res = 'Sorry, but a user with that name already exists, please enter another';
        }
    }
    echo($res);
}
