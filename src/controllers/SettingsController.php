<?php
namespace src\controllers;

use \core\Controller;
use src\models\GeneralSQL;

class SettingsController extends Controller {

    public function user() {
        $send_notice = [];
        if (!empty($_SESSION['notice'])) {
            $send_notice['notice'] = $_SESSION['notice'];
            $send_notice['code'] = $_SESSION['code'];

            $_SESSION['notice'] = '';
            $_SESSION['code'] = '';
        }
        $this->render('settings-00-user', $send_notice);
    }

    public function newUser() {
        
        $this->render('settings-03-new-user');
    }

    public function newUserAction() {

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            
            $sqlModel = new GeneralSQL();

            $data = [
                "nome" => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
                "email" => filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
                "senha" => password_hash($_POST['password'], PASSWORD_DEFAULT),
                "cpf" => filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING),
                "nascimento" => filter_input(INPUT_POST, 'birth', FILTER_SANITIZE_STRING),
                "sexo" => filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING),
                "cep" => filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING),
                "endereco" => filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING),
                "numero" => filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING),
                "celular" => filter_input(INPUT_POST, 'cell', FILTER_SANITIZE_STRING),
                "whatsapp" => filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING),
                "permissao" => filter_input(INPUT_POST, 'permission', FILTER_SANITIZE_STRING)
            ];

            $sqlModel->insertInto('profissional', $data);

            $_SESSION['notice'] = "Usúario cadastrado com sucesso!";
            $_SESSION['code'] = 2;

            $this->redirect('/configuracao/usuarios');
        }       
        
    }

    public function modalidades() {
        $this->render('settings-01-modality');
    }

    public function newModalidades() {
        $this->render('settings-04-new-modality');
    }

}