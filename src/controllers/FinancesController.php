<?php
namespace src\controllers;

use \core\Controller;

class FinancesController extends Controller {

    public function movimentacao() {
        $this->render('finances-00-movement');
    }

    public function pagar() {
        $this->render('finances-01-pay');
    }

    public function receber() {
        $this->render('finances-02-receive');
    }
}