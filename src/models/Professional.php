<?php
namespace src\models;
use \core\Model;
use PDO;
use src\handlers\PrintHandler;

class Professional extends Model {

    public static function getProfessionalAll() {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT id, nome FROM profissional WHERE permissao != 'atendente'";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = [];
        }

        return $sql;
    }

    
}