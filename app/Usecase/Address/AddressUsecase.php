<?php

namespace App\Usecase\BI;

class AddressUsecase
{
    public static function getBI($bi) 
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://ka6xhw.deta.dev/bi/'.$bi);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

        $data = json_decode(curl_exec($ch),true);

        curl_close($ch);

        return $data;
    }

    public function loadFromBI($bi)
    {
        $data = AddressUsecase::getBI($bi);

        if (isset($data["ID_NUMBER"])) {
            return $data;
        }
        return $data;
    }
}
