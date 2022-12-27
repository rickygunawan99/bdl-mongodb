<?php


namespace BasisData\Mongo\Services;


use BasisData\Mongo\config\DatabaseFactory;
use MongoDB\Collection;

class ProductServices
{
    private Collection $database;

    public function __construct()
    {
        $this->database = DatabaseFactory::Mongo(
            'products'
        );
    }

    public function findOne(array $data): object|array|null
    {
        return $this->database->findOne($data);
    }

    public function findAll(): \MongoDB\Driver\Cursor
    {
        return $this->database->find();
    }
}