<?php

namespace src\models;

use \core\Model;
use PDO;
use src\handlers\PrintHandler;

class Schedule extends Model
{

    public static function getShedule(array $query)
    {
        $pdo = Conection::sqlSelect();

        if ($query[0]) {
            $sql = "SELECT * FROM vagas WHERE " . implode(' AND ', $query);

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
}
