<?php
namespace src\models;
use \core\Model;
use PDO;

class GeneralSQL extends Model {

    public static function insertInto (string $table, array $data, bool $lastId = false) {
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

        if ($lastId) {
            return $pdo->lastInsertId();
        } else {
            return $sql->rowCount();
        }    
    }

    public static function countPage($page, $count) {
        
        $total = $count ?? 0;
        $paginas = ceil($total / 10);

        $page = ($page - 1) * 10;
        
        return [$page, 'qtdPage' => $paginas];
    }

    public static function sqlAll($sql, $control = false) {
        $pdo = Conection::sqlSelect();

        if ($control) {
            $sql = $pdo->query($sql);
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch(PDO::FETCH_ASSOC);
                return $sql;
            }
        } else {
            $sql = $pdo->query($sql);
        }

        return array();
    }

    public static function selectAll($sql, $control = false) {
        $pdo = Conection::sqlSelect();

        if ($control) {
            $sql = $pdo->query($sql);
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $sql;
            }
        } else {
            $sql = $pdo->query($sql);
        }

        return array();
    }
}