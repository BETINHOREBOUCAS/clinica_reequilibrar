<?php

namespace src\handlers;

use DateTime;
use DateTimeZone;

class ScheduleHandler
{

    public static function groupProfessional(array $data, array $professional)  {
        
        if (count($data) > 0) {
            // Agrupar por profisinal
            for ($i=0; $i < count($professional); $i++) { 
                foreach ($data as $value) {
                    if ($value['id_profissional'] == $professional[$i]['id']) {
                        $array[$professional[$i]['nome']][] = $value;
                    }
                }
            }
        } else {
            $array = [];
        }
        
        return $array;
    }

}
