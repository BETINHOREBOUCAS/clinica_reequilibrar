<?php

namespace src\handlers;

use src\models\GeneralSQL;

class ScheduleHandler
{

    public static function groupProfessional(array $data, array $professional)  {
        
        if (count($data) > 0) {
            // Agrupar por profisinal
            for ($i=0; $i < count($professional); $i++) { 
                foreach ($data as $value) {
                    if ($value['id_profissional'] == $professional[$i]['id']) {
                        $array[$professional[$i]['nome']][] = $value;
                    }
                }
            }
        } else {
            $array = [];
        }
        
        return $array;
    }

    public static function saveSchedule($idProfessional, $data, $time, $idPartient) {
        $generalSql = new GeneralSQL();

        // Salvando Agendamento
        $dataPartient = array(
            'id_paciente' => $idPartient,
            'id_profissional' => $idProfessional,
            'data' => $data,
            'hora' => $time
        );
        if ($generalSql->insertInto('agendamentos', $dataPartient) > 0) {
            // Atualizando Vagas        
            $results = $generalSql->sqlAll("SELECT id, hora FROM vagas WHERE id_profissional = $idProfessional AND data = '$data'", true);
            $idSchedule = $results['id'];
            $results = json_decode($results['hora']);
            $controlVacancy = 1;
            foreach ($results as $result) {
                if ($result->time == $time) {
                    $result->available = 0;
                }
                if ($result->available == 1) {
                    $controlVacancy++;
                }
            }
            
            if ($controlVacancy > 1) {
                $results = json_encode($results);
                $generalSql->sqlAll("UPDATE vagas SET hora = '$results' WHERE id = $idSchedule");
            } else {
                $results = json_encode($results);
                $generalSql->sqlAll("UPDATE vagas SET hora = '$results', disponivel = 0 WHERE id = $idSchedule");
            }
            
        }
        
    }

}
