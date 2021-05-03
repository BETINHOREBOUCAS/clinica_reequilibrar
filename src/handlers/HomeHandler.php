<?php

namespace src\handlers;

use DateTime;
use DateTimeZone;

class HomeHandler
{

    public function calendar($month = [])
    {

        if (!empty($month)) {
            $date = new DateTime($month);
        } else {
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        }
        

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

    public function getFeriados($month)
    {
        if (!empty($month)) {
            $date = new DateTime($month);
        } else {
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        }
        
        $ano = $date->format('Y');
        $mes = $date->format('m');

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://api.calendario.com.br/?json=true&ano=$ano&estado=CE&cidade=JAGUARUANA&token=YmV0aW5ob3JlYm91Y2FzOUBnbWFpbC5jb20maGFzaD0xMDIyODQ5ODk"
        ]);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        foreach ($response as $value) {
            if (substr($value->date, 3, 2) == $mes) {
                $feriados[] = array(
                    'day' => substr($value->date, 0, 2),
                    'code' => $value->type_code,
                    'name' => $value->name,
                    'type' => $value->type
                );
            }
            
        }

        //PrintHandler::print_r($response, true);
        //PrintHandler::print_r($feriados, true);
        return $feriados;        
    }
}
