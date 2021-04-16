<?php
namespace src\models;
use \core\Model;

class GeneralSQL extends Model {

    public static function insertInto (string $table, array $data) {
        $pdo = Conection::sqlSelect();

        foreach ($data as $key => $value) {
            $keyBind[] = ":$key";
            $valueData[] = $value;
        }

        $key = implode(', ', array_keys($data));
        $keyBindStr = implode(', ', $keyBind);

        $sql = "INSERT INTO $table ($key) VALUES ($keyBindStr)";

        $sql = $pdo->prepare($sql);
        for ($i=0; $i < count($data); $i++) { 
            $sql->bindValue("$keyBind[$i]", $valueData[$i]);
        }

        $sql->execute();

        return $sql->rowCount();
    }

    public static function countPage($page, $count) {
        
        $total = $count ?? 0;
        $paginas = ceil($total / 10);

        $page = ($page - 1) * 10;
        
        return [$page, 'qtdPage' => $paginas];
    }
}