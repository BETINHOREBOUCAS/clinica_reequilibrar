<?php
namespace src\controllers;

use \core\Controller;
use src\models\GeneralSQL;
use src\models\Patients;

class PatientsController extends Controller {

    public function index() {
        $array = [];

        $page = filter_input(INPUT_GET, 'p', FILTER_VALIDATE_INT);
        
        if (!empty($_SESSION['notice'])) {
            $array['notice'] = [
                'notice' => $_SESSION['notice'],
                'code' => $_SESSION['code']
            ];

            $_SESSION['notice'] = '';
            $_SESSION['code'] = '';
        }

        if (!empty($_GET['search']) || !empty($_GET['situation'])) {           
            

            $sqlModel = new Patients();

            $search = [
                'name' => filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING),
                'situation' => filter_input(INPUT_GET, 'situation', FILTER_SANITIZE_STRING)
            ];

            $array = $sqlModel->getPatients('pacientes', $search, $page);


        } else {
            $search = [
                'name' => "",
                'situation' => ""
            ];
        }

        $array['search'] = $search;

        $this->render('patients-00', $array);
    }

    public function cadastro() {
        
        $this->render('patients-01-register');
    }

    public function cadastroAction() {

        if (!empty($_POST['name'])) {

            $data = [
                "nome" => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
                "email" => filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
                "mae" => filter_input(INPUT_POST, 'mother', FILTER_SANITIZE_STRING),
                "pai" => filter_input(INPUT_POST, 'dad', FILTER_SANITIZE_STRING),
                "cpf" => filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING),
                "nascimento" => filter_input(INPUT_POST, 'birth', FILTER_SANITIZE_STRING),
                "sexo" => filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING),
                "cep" => filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING),
                "endereco" => filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING),
                "numero" => filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING),
                "celular" => filter_input(INPUT_POST, 'cell', FILTER_SANITIZE_STRING),
                "whatsapp" => filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING),
                "recado" => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING)
            ];

            GeneralSQL::insertInto('pacientes', $data);

            $_SESSION['notice'] = "Usúario cadastrado com sucesso!";
            $_SESSION['code'] = 2;

            $this->redirect('/pacientes');
        } 
    }

    public function agendamento() {
        $this->render('patients-02-scheduling');
    }

    public function consulta() {
        $this->render('patients-03-query');
    }

    public function anamnese() {
        $this->render('patients-04-anamnese');
    }

    public function exames() {
        $this->render('patients-05-exams');
    }

    public function diagnostico() {
        $this->render('patients-06-diagnosis');
    }

    public function evolucao() {
        $this->render('patients-07-evolution');
    }

    public function arquivo() {
        $this->render('patients-08-folder');
    }

    public function prontuario() {
        $this->render('patients-09-medical');
    }

    public function informacoes() {
        $this->render('patients-10-information');
    }

    public function informacoesEditar() {
        $this->render('patients-11-information-edit');
    }
}