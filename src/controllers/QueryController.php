<?php
namespace src\controllers;

use \core\Controller;
use DateTime;
use DateTimeZone;
use src\handlers\LoginHandler;
use src\handlers\PrintHandler;
use src\handlers\QueryHandler;
use src\models\GeneralSQL;
use src\models\Modality;

class QueryController extends Controller {

    private $user;
    private $idUserSchedule;
    private $dataAtual;

    public function __construct() {
        $this->user = LoginHandler::checkLogin();
        if($this->user === false) {
            $this->redirect('/login');
        }

        $dataObject = new DateTime();
        $dataObject->setTimezone(new DateTimeZone('America/Sao_paulo'));
        $this->dataAtual = $dataObject->format('Y-m-d');
    }

    public function index() {
        
        $this->render('query-00', ['user' => $this->user]);
    }

    public function consulta($attr) {
        $idAgendamento = filter_var($attr['id'], FILTER_VALIDATE_INT);
    
        $this->idUserSchedule = GeneralSQL::sqlAll("SELECT id_profissional FROM agendamentos WHERE id = $idAgendamento", true);

        // verifica se o agendamento pertence o profissional
        if ($this->idUserSchedule['id_profissional'] != $this->user->id) {
            $this->redirect('/agendamentos?dataAtual='.$this->dataAtual);
        }     

        $array = QueryHandler::getInformation($idAgendamento, $this->dataAtual, $this->user);
        
        $this->render('patients-03-query', $array);
    }

    public function consultaAction() {

        $data_consulta = [
            "data_consulta" => filter_input(INPUT_POST, 'data_consulta', FILTER_SANITIZE_STRING),
            "id_modalidade" => filter_input(INPUT_POST, 'id_modalidade', FILTER_VALIDATE_INT),
            "titulo" => filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING),
            "descricao" => filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING),
            "diafnostico" => filter_input(INPUT_POST, 'diafnostico', FILTER_SANITIZE_STRING),
            "retorno" => filter_input(INPUT_POST, 'retorno', FILTER_VALIDATE_INT)
        ];

        $data_exame = [
            "data_exame" => filter_input(INPUT_POST, 'data_exame', FILTER_SANITIZE_STRING),
            "nome_exame" => filter_input(INPUT_POST, 'nome_exame', FILTER_SANITIZE_STRING),
            "url_exame" => filter_input(INPUT_POST, 'url_exame', FILTER_SANITIZE_STRING),
            "id_consulta" => filter_input(INPUT_POST, 'id_consulta', FILTER_VALIDATE_INT)
        ];
        
        print_r($_FILES);
        PrintHandler::print_r($_POST, true);
    }

    public function evolucao($attr) {
        $idAgendamento = filter_var($attr['id'], FILTER_VALIDATE_INT);
    
        $this->idUserSchedule = GeneralSQL::sqlAll("SELECT id_profissional FROM agendamentos WHERE id = $idAgendamento", true);

        // verifica se o agendamento pertence o profissional
        if ($this->idUserSchedule['id_profissional'] != $this->user->id) {
            $this->redirect('/agendamentos?dataAtual='.$this->dataAtual);
        }     

        $array = QueryHandler::getInformation($idAgendamento, $this->dataAtual, $this->user);

        $this->render('patients-07-evolution', $array);
    }

}