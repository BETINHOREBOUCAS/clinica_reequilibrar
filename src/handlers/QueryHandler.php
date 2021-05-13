<?php

namespace src\handlers;

use src\models\GeneralSQL;
use src\models\Modality;

class QueryHandler {

    public static function getInformation($idAgendamento, $dataAtual, $user) {
        $query = "SELECT pacientes.nome AS nome_paciente FROM agendamentos INNER JOIN pacientes ON agendamentos.id_paciente = pacientes.id WHERE agendamentos.id = $idAgendamento";
        
        $array = array(
            'idAgendamento' => ['idAgendamento' => $idAgendamento],
            'dataAtual' => $dataAtual,
            'user' => $user,
            'modality' => Modality::getModalidadeAll(),
            'patient' => GeneralSQL::sqlAll($query, true)
        );

        return $array;
    }
    
}
