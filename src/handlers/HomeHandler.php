<?php

namespace src\handlers;

use DateTime;
use DateTimeZone;

class HomeHandler
{

    public function calendar()
    {
        
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));

        $data = $date->format('Y-m');
        $dia1 = date('w', strtotime($data));
        $dias = date('t', strtotime($data));
        $linhas = ceil(($dias + $dia1) / 7);
        $dia1 = -$dia1;
        $data_inicio = date('Y-m-d', strtotime($dia1 . ' days', strtotime($data)));
        $data_fim = date('Y-m-d', strtotime(($dia1 + ($linhas * 7) - 1) . ' days', strtotime($data)));

        $array = [
            'linhas' => $linhas,
            'data_inicio' => $data_inicio,
            'data_fim' => $data_fim,
            'mes' => $date->format('m'),
            'ano' => $date->format('Y')
        ];

       


        return $array;
    }
}
