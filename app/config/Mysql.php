<?php


namespace BasisData\Mongo\config;

class Mysql
{
    private static ?\PDO $pdo = null;

    public static function connect()
    {
        try {
            if(self::$pdo == null){
                require_once  __DIR__ . '/../../config/database.php';
                $config = getArrayDatabase();
                self::$pdo = new \PDO(
                    $config['database']['local']['url'],
                    $config['database']['local']['username'],
                    $config['database']['local']['password'],
                );
            }
            return self::$pdo;
        }catch (\Exception $e){
            throw new \Exception("Periksa ulang koneksi sql");
        }
    }
}