<?php


namespace BasisData\Mongo\config;
use BasisData\Mongo\config\Mysql;

class DatabaseFactory
{
    /**
     * @throws \Exception
     */
    public static function Mongo(string $collName): \MongoDB\Collection
    {
        return Mongo::collection($collName);
    }

    /**
     * @throws \Exception
     */
    public static function MySQL(): ?\PDO
    {
        return Mysql::connect();
    }
}