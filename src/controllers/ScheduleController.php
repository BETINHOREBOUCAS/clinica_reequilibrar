<?php
namespace src\controllers;

use \core\Controller;

class ScheduleController extends Controller {

    public function index() {
        $this->render('schedule-00');
    }

    public function horarios() {
        $this->render('schedule-01-setings');
    }

}