<?php

namespace src\handlers;

use DateTime;
use DateTimeZone;

class PrintHandler
{

    public static function print_r($print, bool $exit = false)  {
        if ($exit) {
            echo "<pre>";
            print_r($print);
            exit;
        } else {
            echo "<pre>";
            print_r($print);
        }
        
    }
}
