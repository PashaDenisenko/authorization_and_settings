<?php

class User {

    private $db;
    private static $user = null;

    private function __construct() {
        $this->db = new mysqli(HOST, USER, PASSWORD, DB);
        $this->db->query("SET NAMES 'utf8'");
    }

    public static function getObject() {
        require_once "settings.php";
        if (self::$user === null)
            self::$user = new User();
        return self::$user;
    }

    public function regUser($name, $password, $email) {
        $password = md5($password);
        return $this->db->query("INSERT INTO users (name, password, email)
                                                 VALUES
                                      		   ('$name', '$password', '$email')");
    }

    public function findName($name) {
        $result = $this->db->query("SELECT name FROM users WHERE name='$name'");
        return $result->num_rows;
    }

    public function findNameAndEmail($name, $email) {
        $result = $this->db->query("SELECT name FROM users WHERE name='$name' AND email = '$email'");
        return $result->num_rows;
    }

    private function checkUser($name, $password) {
        $result_set = $this->db->query("SELECT password FROM users WHERE name = '$name'");
        $user = $result_set->fetch_assoc();
        $result_set->close();
        if (!$user) {
            return false;
        } else {
            return $user["password"] === $password;
        }
    }

    public function isAuth() {
        session_start();
        $name = $_SESSION["name"];
        $password = $_SESSION["password"];
        return $this->checkUser($name, $password);
    }

    public function login($name, $password) {
        $password = md5($password);
        if ($this->checkUser($name, $password)) {
            session_start();
            $_SESSION["name"] = $name;
            $_SESSION["password"] = $password;
            return true;
        } else {
            return false;
        }
    }

    public function forgotPassword($name, $new_password) {
        $result = $this->db->query("UPDATE users SET password = '" . md5($new_password) . "' WHERE name = '$name'");
        return $result;
    }

    public function changeName($name) {
        session_start();
        $result = $this->db->query("UPDATE users SET name = '$name' WHERE name = '" . $_SESSION['name'] . "'");
        if ($result)
            $_SESSION["name"] = $name;
        return $result;
    }

    public function changeEmail($email) {
        session_start();
        $result = $this->db->query("UPDATE users SET email = '$email' WHERE name = '" . $_SESSION['name'] . "'");
        return $result;
    }

    public function changePassword($password, $old_password) {
        session_start();
        $password = md5($password);
        $old_password = md5($old_password);
        $result = $this->db->query("UPDATE users SET password = '$password' WHERE name = '" . $_SESSION['name'] . "' AND password = '$old_password'");
        if ($result)
            $_SESSION["password"] = $password;
        return $result;
    }

    public function __destruct() {
        if ($this->db)
            $this->db->close();
    }

}
