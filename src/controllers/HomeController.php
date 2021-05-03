<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\HomeHandler;

class HomeController extends Controller {

    public function index() {   
        $month = "";
        if (isset($_GET['month']) && !empty($_GET['month'])) {
            $month = filter_var($_GET['month'], FILTER_SANITIZE_STRING);
        } 

        $calendar = new HomeHandler();
        $calendario['calendario'] = $calendar->calendar($month);
        $calendario['feriados'] = $calendar->getFeriados($month);
        

        $this->render('home', $calendario);
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}