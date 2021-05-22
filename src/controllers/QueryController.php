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
        $idSchedule = filter_var($attr['idagendamento'], FILTER_VALIDATE_INT);
    
        $this->idUserSchedule = GeneralSQL::sqlAll("SELECT id_profissional FROM agendamentos WHERE id = $idSchedule", true);

        // verifica se o agendamento pertence o profissional
        if ($this->idUserSchedule['id_profissional'] != $this->user->id) {
            $this->redirect('/agendamentos?dataAtual='.$this->dataAtual);
        }     

        $array = QueryHandler::getInformation($idSchedule, $this->dataAtual, $this->user);
        
        $this->render('patients-03-query', $array);
    }

    public function consultaAction($attr) {
        $idSchedule = filter_var($attr['idagendamento'], FILTER_VALIDATE_INT);
        $idPatient = filter_var($attr['idpaciente'], FILTER_VALIDATE_INT);
        $idProfessional = $this->user->id;

        $data_schedule = [
            "data_consulta" => filter_input(INPUT_POST, 'data_consulta', FILTER_SANITIZE_STRING),
            "id_modalidade" => filter_input(INPUT_POST, 'id_modalidade', FILTER_VALIDATE_INT),
            "titulo" => filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING),
            "descricao" => filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING),
            "diagnostico" => filter_input(INPUT_POST, 'diagnostico', FILTER_SANITIZE_STRING),
            "retorno" => filter_input(INPUT_POST, 'retorno', FILTER_VALIDATE_INT),
            "id_paciente" => $idPatient,
            "id_profissional" => $idProfessional
        ];

        // Inserindo consultas e modificando agendamentos no banco
        $idQuery = GeneralSQL::insertInto('consultas', $data_schedule, true);
        GeneralSQL::sqlAll("UPDATE agendamentos SET ativo = 0 WHERE id = $idSchedule");

        $data_exam = [
            "data_exame" => filter_input(INPUT_POST, 'data_exame', FILTER_SANITIZE_STRING),
            "nome_exame" => filter_input(INPUT_POST, 'nome_exame', FILTER_SANITIZE_STRING),
            "url_exame" => "",
            "id_consulta" => $idQuery,
            "id_paciente" => $idPatient
        ];        

        // Inserindo exame do paciente no banco
        if (isset($_FILES['scan']['tmp_name']) && !empty($_FILES['scan']['tmp_name'])) {
            $name_file = strtolower($data_exam['nome_exame']."--".md5(rand(0, 9999).time()).".pdf");
            move_uploaded_file($_FILES['scan']['tmp_name'], '../src/exam/'.$name_file);

            $data_exam['url_exame'] = $name_file;

            GeneralSQL::insertInto('exames', $data_exam);
        }

        // Sessão criada para notificar em ScheduleController/agendamento
        $_SESSION['notice'] = "Consulta finalizada!";
        $_SESSION['code'] = 2;

        $this->redirect('/agendamentos?dataAtual='.$this->dataAtual);
    }

    public function evolucao($attr) {
        $idSchedule = filter_var($attr['id'], FILTER_VALIDATE_INT);
    
        $this->idUserSchedule = GeneralSQL::sqlAll("SELECT id_profissional FROM agendamentos WHERE id = $idSchedule", true);

        // verifica se o agendamento pertence o profissional
        if ($this->idUserSchedule['id_profissional'] != $this->user->id) {
            $this->redirect('/agendamentos?dataAtual='.$this->dataAtual);
        }     

        $array = QueryHandler::getInformation($idSchedule, $this->dataAtual, $this->user);

        $this->render('patients-07-evolution', $array);
    }

    public function cancelarAgendamento($attr) {
        $idSchedule = filter_var($attr['idagendamento'], FILTER_VALIDATE_INT);
        $motivo = filter_input(INPUT_POST, 'motivo', FILTER_SANITIZE_STRING);

        $teste = GeneralSQL::sqlAll("UPDATE agendamentos SET motivo = '$motivo', ativo = 0 WHERE id = $idSchedule");

        echo json_encode(["status" => true]);
        
    }

}