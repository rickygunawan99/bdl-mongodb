<?php


namespace BasisData\Mongo\Services;


use BasisData\Mongo\config\DatabaseFactory;
use BasisData\Mongo\Entity\ProductEntity;
use MongoDB\BSON\ObjectId;
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

    public function findOne(array $filter): object|array|null
    {
        return $this->database->findOne($filter);
    }

    public function findAll(array $data=[], array $filter=[])
    {
        return $this->database->find($data, $filter);
    }

    public function deleteById($id)
    {
        return $this->database->deleteOne([
            '_id' => new ObjectId($id)
        ]);
    }

    public function updateOne($filter, $update)
    {
        return $this->database->updateOne($filter, $update);
    }

    public function insertOne(ProductEntity $product)
    {
        $id = $this->lastProductId()+1;
        $this->database->insertOne([
            'category' => str_replace(' ', '', $product->category),
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $product->stock,
            'id' => $id
        ]);
    }

    private function lastProductId(): int
    {
        return $this->database->findOne([], ['sort'=>['id'=>-1], ['limit'=>1]])['id'];
    }
}