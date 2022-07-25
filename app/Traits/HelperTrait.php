<?php

namespace App\Traits;

trait HelperTrait{
    public function tryParseInt($num)
    {
        if (!$num || empty($num)) return 0;
        $num = str_split($num,1);
        $data = "";
        for ($i = 0; $i < count($num); $i++) {
            $num[$i] = preg_replace('/[a-zA-Z,;]+/', '', $num[$i]);
            $data .= trim($num[$i]);
        }
        $result = (intval($data));
        return $result;
    }
    public function format_money($num)
    {
       return number_format($num);
    }
}
