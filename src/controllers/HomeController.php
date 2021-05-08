<?php
namespace src\controllers;

use \core\Controller;
use DateTime;
use DateTimeZone;
use src\handlers\HomeHandler;
use src\handlers\LoginHandler;
use src\handlers\PrintHandler;
use src\models\GeneralSQL;

class HomeController extends Controller {

    private $user;
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

        $array['user'] = $this->user;
        $idLogged = $this->user->id;
        $dataAtual = $this->dataAtual;

        $array['dataAtual'] = $dataAtual;

        $month = "";
        if (isset($_GET['month']) && !empty($_GET['month'])) {
            $month = filter_var($_GET['month'], FILTER_SANITIZE_STRING);
        } 

        $query = "SELECT COUNT(*) AS totShedule FROM agendamentos WHERE id_profissional = $idLogged AND data = '$dataAtual'";
        $array['countSchedule'] = GeneralSQL::sqlAll($query, true);

        $calendar = new HomeHandler();
        $array['calendario'] = $calendar->calendar($month);
        $array['feriados'] = $calendar->getFeriados($month);
        

        $this->render('home', $array);
    }

}