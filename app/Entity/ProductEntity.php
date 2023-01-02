<?php


namespace BasisData\Mongo\Entity;


class ProductEntity
{
    public string $name;
    public ?int $stock;
    public ?string $category;
    public ?int $price;
}