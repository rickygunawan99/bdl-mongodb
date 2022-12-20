<?php


namespace BasisData\Mongo\Controller;


use BasisData\Mongo\App\View;
use BasisData\Mongo\config\DatabaseFactory;
use BasisData\Mongo\config\Mongo;

class ProductController
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $products = DatabaseFactory::Mongo('products')->find();
        View::show('Product/index', [
            'products' => $products
        ]);
    }
}