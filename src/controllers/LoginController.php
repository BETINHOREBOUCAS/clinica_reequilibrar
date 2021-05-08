<?php
namespace src\controllers;

use \core\Controller;
use DateTime;
use DateTimeZone;
use src\handlers\LoginHandler;
use src\handlers\PrintHandler;

class LoginController extends Controller {

    public $user;

    public function login() {
        $notice = [];

        if (!empty($_SESSION['notice'])) {
            $notice['notice'] = $_SESSION['notice'];
            $_SESSION['notice'] = '';
        }
        
        $this->render('login');
    }

    public function loginAction() {

        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        $dataAtual = $date->format('Y-m-d');
        $expira = strtotime($dataAtual) + (86400 * 360);
        
        $email = filter_var($_POST['user'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $remember = filter_var($_POST['remember']??'');

        $token = LoginHandler::verifyCount($email, $password);        

        if ($email && $password) {
            if ($remember) {
                if ($token) {
                    setcookie('token', $token, $expira);
                    $this->redirect('/');
                } else {
                    $_SESSION['notice'] = "E-mail e/ou senha não conferem!";
                    $this->redirect('/login');
                }
            } else {
                if ($token) {
                    $_SESSION['token'] = $token;
                    $this->redirect('/');
                } else {
                    $_SESSION['notice'] = "E-mail e/ou senha não conferem!";
                    $this->redirect('/login');
                }
            }
        }

        $this->redirect('/login');      

    }

    public function logout() {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        $dataAtual = $date->format('Y-m-d');
        $expira = strtotime($dataAtual) - (86400 * 360);

        setcookie('token', '', $expira);

        $_SESSION['token'] = '';

        $this->redirect('/login');
    }
}