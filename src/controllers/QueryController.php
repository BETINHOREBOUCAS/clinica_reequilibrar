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
        
        $this->render('query-00');
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

    public function anamnese($attr) {
        $idAgendamento = filter_var($attr['id'], FILTER_VALIDATE_INT);
    
        $this->idUserSchedule = GeneralSQL::sqlAll("SELECT id_profissional FROM agendamentos WHERE id = $idAgendamento", true);

        // verifica se o agendamento pertence o profissional
        if ($this->idUserSchedule['id_profissional'] != $this->user->id) {
            $this->redirect('/agendamentos?dataAtual='.$this->dataAtual);
        }     

        $array = QueryHandler::getInformation($idAgendamento, $this->dataAtual, $this->user);

        $this->render('patients-04-anamnese', $array);
    }

    public function exames($attr) {
        $idAgendamento = filter_var($attr['id'], FILTER_VALIDATE_INT);
    
        $this->idUserSchedule = GeneralSQL::sqlAll("SELECT id_profissional FROM agendamentos WHERE id = $idAgendamento", true);

        // verifica se o agendamento pertence o profissional
        if ($this->idUserSchedule['id_profissional'] != $this->user->id) {
            $this->redirect('/agendamentos?dataAtual='.$this->dataAtual);
        }     

        $array = QueryHandler::getInformation($idAgendamento, $this->dataAtual, $this->user);

        $this->render('patients-05-exams', $array);
    }

    public function diagnostico($attr) {
        $idAgendamento = filter_var($attr['id'], FILTER_VALIDATE_INT);
    
        $this->idUserSchedule = GeneralSQL::sqlAll("SELECT id_profissional FROM agendamentos WHERE id = $idAgendamento", true);

        // verifica se o agendamento pertence o profissional
        if ($this->idUserSchedule['id_profissional'] != $this->user->id) {
            $this->redirect('/agendamentos?dataAtual='.$this->dataAtual);
        }     

        $array = QueryHandler::getInformation($idAgendamento, $this->dataAtual, $this->user);

        $this->render('patients-06-diagnosis', $array);
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