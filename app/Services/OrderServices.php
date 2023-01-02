<?php


namespace BasisData\Mongo\Services;


use BasisData\Mongo\config\DatabaseFactory;
use BasisData\Mongo\Entity\ProductEntity;
use Exception;
use MongoDB\Collection;
use MongoDB\Driver\Cursor;
use MongoDB\InsertOneResult;
use MongoDB\UpdateResult;

class OrderServices
{
    private Collection $database;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->database = DatabaseFactory::Mongo('orders');
    }

    public function hasSession(string $id): int
    {
        return $this->database->countDocuments([
            'session_id' => $id
        ]);
    }

    public function hasSessionOrInsert(string $id): string
    {
        if( $this->hasSession($id) == 0){
            $this->database->insertOne(array(
                'session_id' => $id,
                'status' => 0
            ));
        }

        return $id;
    }

    public function save(array $data): InsertOneResult
    {
        return $this->database->insertOne($data);
    }

    public function findOne(array $filter, array $option): object|array|null
    {
        return $this->database->findOne($filter, $option);
    }

    public function updateOne(array $filter, array $update): UpdateResult
    {
        return $this->database->updateOne($filter, $update);
    }

    public function findOrderBySession(string $sessionId)
    {
        return $this->database->find([
            'session_id' => $sessionId
        ]);
    }

    public function findAll(array $filter = [], array $option = [])
    {
        return $this->database->find($filter, $option);
    }

}