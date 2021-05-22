<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\PrintHandler;
use src\models\GeneralSQL;

class ScheduleController extends Controller {

    private $user;

    public function __construct() {
        $this->user = LoginHandler::checkLogin();
        if($this->user === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $array = ['user' => $this->user];

        

        $this->render('schedule-00', $array);
    }

    public function horarios() {
        $array = ['user' => $this->user];
        $this->render('schedule-01-setings', $array);
    }

    public function agendamento() {
        $array = ['user' => $this->user];
        $idLogged = $this->user->id;

        if (!empty($_SESSION['notice'])) {
            $array['notice'] = [
                'notice' => $_SESSION['notice'],
                'code' => $_SESSION['code']
            ];

            $_SESSION['notice'] = '';
            $_SESSION['code'] = '';
        }

        $dataAtual = filter_input(INPUT_GET, 'dataAtual', FILTER_SANITIZE_STRING);
        $searchDataI = filter_input(INPUT_GET, 'dataI', FILTER_SANITIZE_STRING);
        $searchDataF = filter_input(INPUT_GET, 'dataF', FILTER_SANITIZE_STRING);
        $professional = filter_input(INPUT_GET, 'profissional', FILTER_VALIDATE_INT)??999999999999;

        if (!empty($dataAtual)) {
            $query = "SELECT pacientes.id AS id_paciente, agendamentos.id AS id_agendamento, profissional.nome AS profissional, pacientes.nome AS paciente, agendamentos.data, agendamentos.hora FROM agendamentos INNER JOIN profissional ON agendamentos.id_profissional = profissional.id INNER JOIN pacientes ON agendamentos.id_paciente = pacientes.id WHERE id_profissional = $idLogged AND data = '$dataAtual' AND ativo = 1 ORDER BY data asc";
            $array['agendamentos'] = GeneralSQL::selectAll($query, true);
        } else if ($professional != 0 && !empty($searchDataI) && !empty($searchDataF)){
            if ($professional == 999999999999) {
                $query = "SELECT pacientes.id AS id_paciente, agendamentos.id AS id_agendamento, profissional.nome AS profissional, pacientes.nome AS paciente, agendamentos.data, agendamentos.hora FROM agendamentos INNER JOIN profissional ON agendamentos.id_profissional = profissional.id INNER JOIN pacientes ON agendamentos.id_paciente = pacientes.id WHERE id_profissional = $idLogged AND data BETWEEN '$searchDataI' AND '$searchDataF' AND ativo = 1 ORDER BY data asc";
                $array['agendamentos'] = GeneralSQL::selectAll($query, true);
            } else if ($this->user->permissao == 1) {
                $query = "SELECT pacientes.id AS id_paciente, agendamentos.id AS id_agendamento, profissional.nome AS profissional, pacientes.nome AS paciente, agendamentos.data, agendamentos.hora FROM agendamentos INNER JOIN profissional ON agendamentos.id_profissional = profissional.id INNER JOIN pacientes ON agendamentos.id_paciente = pacientes.id WHERE id_profissional = '$professional' AND data BETWEEN '$searchDataI' AND '$searchDataF' AND ativo = 1 ORDER BY data asc";
                $array['agendamentos'] = GeneralSQL::selectAll($query, true);
            } else {
                $this->redirect('/');
            }
        } else if ($professional == 0 && !empty($searchDataI) && !empty($searchDataF)){
            if ($this->user->permissao == 1) {
                $query = "SELECT pacientes.id AS id_paciente, agendamentos.id AS id_agendamento, profissional.nome AS profissional, pacientes.nome AS paciente, agendamentos.data, agendamentos.hora FROM agendamentos INNER JOIN profissional ON agendamentos.id_profissional = profissional.id INNER JOIN pacientes ON agendamentos.id_paciente = pacientes.id WHERE id_profissional != 0 AND data BETWEEN '$searchDataI' AND '$searchDataF' AND ativo = 1 ORDER BY data asc";
                $array['agendamentos'] = GeneralSQL::selectAll($query, true);
            } else {
                $this->redirect('/');
            }
        }

        $query = "SELECT * FROM profissional";
        $array['professional'] = GeneralSQL::selectAll($query, true);
        //PrintHandler::print_r($array['agendamentos'], true);
        $this->render('query-schedule-00', $array);
    }

}