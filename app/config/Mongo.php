<?php

namespace BasisData\Mongo\config;

use Exception;
use MongoDB\Client;

class Mongo
{
    private static Client|null $mongo = null;

    /**
     * @throws Exception
     */
    public static function collection(string $dbName): \MongoDB\Collection
    {
        try {
            if(self::$mongo == null){
                self::$mongo = new \MongoDB\Client();
            }
            return self::$mongo->test->$dbName;
        }catch (Exception $e){
            throw new Exception("Timeout");
        }
    }
}