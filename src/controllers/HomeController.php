<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\HomeHandler;

class HomeController extends Controller {

    public function index() {       

        $calendario = new HomeHandler();
        $calendario = $calendario->calendar();
        
        

        $this->render('home', $calendario);
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}