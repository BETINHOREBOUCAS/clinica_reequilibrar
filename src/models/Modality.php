<?php
namespace src\models;
use \core\Model;
use PDO;
use src\handlers\PrintHandler;

class Modality extends Model {

    public static function getModalidadeAll() {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM modalidades";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = [];
        }

        return $sql;
    }  
}