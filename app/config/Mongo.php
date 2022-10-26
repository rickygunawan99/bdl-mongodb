<?php

namespace BasisData\Mongo\config;


class Mongo
{
    private static $mongo = null;

    public static function connect()
    {
        if(self::$mongo == null){
            self::$mongo = new \MongoDB\Client();
        }
        return self::$mongo;
    }
}