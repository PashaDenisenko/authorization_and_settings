<?php
if (isset($_POST['name']) && isset($_POST['email'])) {
    require_once "user_class.php";
    $user = User::getObject();

    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags($_POST['email']));

    if ($name == '' || strlen($name) < 1) {
        $res = 'Field with the name cannot be blank';
    } else if (strlen($name) > 30) {
        $res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
    } else if ($email == '' || strlen($email) < 1) {
        $res = 'Field with the email cannot be blank';
    } else if (strlen($email) > 30) {
        $res = 'You have exceeded the maximum permissible length of the email, it is equal to 30';
    } else if (!preg_match("/^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i", $email)) {
        $res = 'Incorrect format email';
    } else {
        if ($user->findName($name) == 0) {
            $res = 'Sorry, but user with this name is not registered';
        } else if ($user->findNameAndEmail($name, $email) == 0) {
            $res = 'Sorry, but a user with this email is not registered';
        } else {
            $new_password = substr(md5(time()), 7);
            $subject = 'New password';
            $message = $name . ': your new password: ' . $new_password;
            if (!mail($email, $subject, $message, 'From:pashadenisenko@mail.ru')) {
                $res = 'An error occurred registering the reason may be incorrectly specified email';
            } else {
                $res = $user->forgotPassword($name, $new_password);
                if ($res) {
                    $res = 'New password sent to your email';
                } else {
                    $res = 'Sorry, there was an error connecting to the database';
                }
            }
        }
    }
    echo($res);
}
