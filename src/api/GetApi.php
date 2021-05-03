<?php

namespace src\api;

use PDO;
use src\models\Conection;

class GetApi {
    
    public static function select($query) {
        $pdo = Conection::sqlSelect();

        $sql = $pdo->query($query);
        if ($sql->rowCount()>0) {
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = array(array('hora' => '[{"time":"","available":null}]'));
        }
        return $sql;
    }
    
}
