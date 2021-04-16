<?php
namespace src\models;
use \core\Model;

class Settings extends Model {

    public $pdo;

    function __construct() {
        $this->pdo = Conection::sqlSelect();
    }

    
}