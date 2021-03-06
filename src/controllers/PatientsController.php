<?php
namespace src\controllers;

use \core\Controller;
use DateTime;
use DateTimeZone;
use src\handlers\ApiHandler;
use src\handlers\LoginHandler;
use src\handlers\PrintHandler;
use src\handlers\ScheduleHandler;
use src\models\GeneralSQL;
use src\models\Modality;
use src\models\Patients;
use src\models\Professional;
use src\models\Schedule;

class PatientsController extends Controller {

    private $user;

    public function __construct() {
        $this->user = LoginHandler::checkLogin();
        if($this->user === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
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
        $array['user'] = $this->user;

        $this->render('patients-00', $array);
    }

    public function cadastro() {
        $array = ['user' => $this->user];
        $this->render('patients-01-register', $array);
    }

    public function cadastroAction() {

        if (!empty($_POST['name'])) {

            $anamnese = json_encode([
                "alergia" => filter_input(INPUT_POST, 'alergia', FILTER_SANITIZE_STRING),
                "diabetes" => filter_input(INPUT_POST, 'diabetes', FILTER_SANITIZE_STRING),
                "hipertensao" => filter_input(INPUT_POST, 'hipertensao', FILTER_SANITIZE_STRING),
                "neoplasia" => filter_input(INPUT_POST, 'neoplasia', FILTER_SANITIZE_STRING),
                "cronica" => filter_input(INPUT_POST, 'cronica', FILTER_SANITIZE_STRING),
                "fumante" => filter_input(INPUT_POST, 'fumante', FILTER_SANITIZE_STRING),
                "etilismos" => filter_input(INPUT_POST, 'etilismos', FILTER_SANITIZE_STRING),
                "atividade" => filter_input(INPUT_POST, 'atividade', FILTER_SANITIZE_STRING)
            ]);

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
                "recado" => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING),
                "anamnese" => $anamnese 
            ];

            $anamnese = [

            ];

            GeneralSQL::insertInto('pacientes', $data);

            $_SESSION['notice'] = "Us??ario cadastrado com sucesso!";
            $_SESSION['code'] = 2;

            $this->redirect('/pacientes');
        } 
    }

    public function agendamento($attr) {
        $data = ['user' => $this->user];

        $idPatiente = filter_var($attr['id'], FILTER_VALIDATE_INT);
        if (!empty($_SESSION['notice'])) {
            $data['notice'] = [
                'notice' => $_SESSION['notice'],
                'code' => $_SESSION['code']
            ];

            $_SESSION['notice'] = '';
            $_SESSION['code'] = '';
        }

        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        $dateStart = $date->format("Y-m-d");
        $dateEnd = $date->format("Y-m-31");
        
        $data['today'] = $date->format('Y-m');

        $data['modality'] = Modality::getModalidadeAll();
        $data['professional'] = Professional::getProfessionalAll();

        // Filtros de busca de agendamentos
        $modality = filter_input(INPUT_GET, 'modality', FILTER_SANITIZE_STRING);
        if (count($_GET) > 1) {

            $month = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_STRING);
            $professional = filter_input(INPUT_GET, 'professional', FILTER_SANITIZE_STRING);
            
            if (!empty($_GET['month']) && isset($_GET['month'])) {
                $query[] = "data BETWEEN '$month-01' AND '$month-31'";
            } else {
                $query[] = "data BETWEEN '$dateStart' AND '$dateEnd'";
            }

            if (!empty($_GET['professional']) && isset($_GET['professional'])) {
                $query[] = "id_profissional = $professional";
            }

        } else {
            $query = [false];
        }

        $data['schedule'] = Schedule::getShedule($query, $modality);
        $data['last'] = Schedule::lastSchedules($idPatiente);

        if (!array_key_exists('aviso', $data['schedule'])) {
            $data['schedule'] = ScheduleHandler::groupProfessional($data['schedule'], $data['professional']);
        }

        $this->render('patients-02-scheduling', $data);
    }

    public function agendamentoAction($attr) {
        $arrayJson = json_decode($_POST['date']);
        $idPatiente = filter_var($attr['id'], FILTER_VALIDATE_INT);
        $idProfessional = $arrayJson->idProfissional;
        $data = filter_var($arrayJson->data, FILTER_SANITIZE_STRING);
        $time = filter_var($_POST['hora'], FILTER_SANITIZE_STRING);
        
        ScheduleHandler::saveSchedule($idProfessional, $data, $time, $idPatiente);
        
        $_SESSION['notice'] = "Agendamento efetuado com sucesso!";
        $_SESSION['code'] = 2;

        header("Location: ". $_SERVER['HTTP_REFERER']);        
    }

    public function arquivo() {
        $this->render('patients-08-folder', ['user' => $this->user]);
    }

    public function prontuario() {
        $this->render('patients-09-medical', ['user' => $this->user]);
    }

    public function informacoes() {
        $this->render('patients-10-information', ['user' => $this->user]);
    }

    public function informacoesEditar() {
        $this->render('patients-11-information-edit', ['user' => $this->user]);
    }
}