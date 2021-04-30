<?php
namespace src\controllers;

use \core\Controller;
use src\api\GetApi;
use src\handlers\PrintHandler;

class ApiController extends Controller {

    public function getTime($attr) {
        $idProfessional = filter_var($attr['idprofissional'], FILTER_VALIDATE_INT);
        $date = filter_var($attr['data'], FILTER_SANITIZE_STRING);

        $query = "SELECT hora FROM vagas WHERE data = '$date' AND id_profissional = $idProfessional AND disponivel = 1";
        
        $result = GetApi::select($query);
        PrintHandler::print_r($result);
        //echo json_encode($array);
    }

}