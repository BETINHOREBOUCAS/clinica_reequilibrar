<?php

namespace src\models;

use \core\Model;
use PDO;
use src\handlers\PrintHandler;

class Schedule extends Model
{

    public static function getShedule(array $query, $modality = []) {
        $pdo = Conection::sqlSelect();
        $complement = array();
        if (!empty($modality)) {
            $sql = $pdo->query("SELECT nome from modalidades WHERE id = $modality");
            
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch(PDO::FETCH_ASSOC);
                $modality = $sql['nome'];

                $sql = "SELECT * from profissional WHERE modalidade LIKE '%$modality%'";
                $sql = $pdo->query($sql);
                if ($sql->rowCount() > 0) {
                    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $complement = array();
                    foreach ($sql as $value) {
                        $complement[] = $value['id'];
                    }
                }
            }   

        } 
        if (!empty($complement)) {
            $complement = " AND id_profissional = ".implode(" OR id_profissional = ", $complement);
        } else {
            $complement = "";
        }
        
        if ($query[0]) {
            $sql = "SELECT * FROM vagas WHERE " . implode(' AND ', $query).$complement." ORDER BY data asc";

            $sql = $pdo->query($sql);

            if ($sql->rowCount() > 0) {
                $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = array("aviso" => "Nenhuma informação encontrada!");
            }

            return $sql;
            
        } else {
            return [];
        }
    }

    public static function lastSchedules($idPatiente) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT data, nome, comparecimento, motivo FROM agendamentos INNER JOIN profissional ON agendamentos.id_profissional = profissional.id WHERE id_paciente = $idPatiente ORDER BY data LIMIT 10";
        $sql = $pdo->query($sql);
        if ($sql->rowCount()>0) {
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = [];
        }

        return $sql;
    }
}
