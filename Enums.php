<?php

namespace App\Enums;

use ReflectionClass;
use Illuminate\Support\Str;

class Enum{
    public static function getAll(){
        $reflection = new ReflectionClass(get_called_class());
        $arry = $reflection->getConstants();
        $arry = array_flip($arry);
        $arry = array_map(function($item){
            return Str::lower(Str::replace('_', ' ', $item));
        }, $arry);
        return $arry;
    }

    public static function get($value){
        $array = self::getAll();
        return $array[$value];
    }

    public static function count(){
        return count(self::getAll());
    }
}
