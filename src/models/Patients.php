<?php
namespace src\models;
use \core\Model;
use PDO;

class Patients extends Model {

    public static function getPatientsAll()  {
        $pdo = Conection::sqlSelect();
        $sql = "SELECT * FROM profissional";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public static function getPatients($table, $search, $page) {
        $pdo = Conection::sqlSelect();

        $name = $search['name'];
        $situation = $search['situation'];

        /* Contador de páginas */

        $query = "SELECT * FROM $table WHERE nome LIKE :nome OR cpf LIKE :cpf AND situacao = :situacao";

        $sql = $pdo->prepare($query);
        $sql->bindValue(':nome', "%$name%");
        $sql->bindValue(':situacao', $situation);
        $sql->bindValue(':cpf', "%$name%");
        $sql->execute();
        
        $count = $sql->rowCount();

        if (!empty($page)) {
            $resp = GeneralSQL::countPage($page, $count);   
            $limit = $resp[0];
            $array['qtdPage'] = $resp['qtdPage'];
        } else {
            $resp = GeneralSQL::countPage(1, $count);
            $limit = $resp[0];
            $array['qtdPage'] = $resp['qtdPage'];
        }            
        
        $query = "SELECT * FROM $table WHERE nome LIKE :nome OR cpf LIKE :cpf AND situacao = :situacao ORDER BY nome asc LIMIT $limit,10";

        $sql = $pdo->prepare($query);
        $sql->bindValue(':nome', "%$name%");
        $sql->bindValue(':situacao', $situation);
        $sql->bindValue(':cpf', "%$name%");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array['patients'] = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
    }
}