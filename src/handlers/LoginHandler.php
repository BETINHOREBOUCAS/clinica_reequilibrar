<?php

namespace src\handlers;

use src\models\GeneralSQL;

class LoginHandler {

    public static function verifyCount($email, $password) {
        $sql = "SELECT * FROM profissional WHERE email = '$email'";
        $resp = GeneralSQL::sqlAll($sql, true);
        if ($resp) {
            if (password_verify($password, $resp['senha'])) {
                $token = md5(time().rand(0,9999).time());
                GeneralSQL::sqlAll("UPDATE profissional SET token = '$token' WHERE email = '$email'");
                return $token;
            } 
        }

        return false;    
    }

    public static function checkLogin() {
        if (!empty($_COOKIE['token'])) {
            $token = $_COOKIE['token'];
            $user = GeneralSQL::sqlAll("SELECT * FROM profissional WHERE token = '$token'", true);

            if (count($user) > 0) {
                return (object) $user;
            }
        } else if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $user = GeneralSQL::sqlAll("SELECT * FROM profissional WHERE token = '$token'", true);

            if (count($user) > 0) {
                return (object) $user;
            }
        }
        
        return false;
    }
    
}
