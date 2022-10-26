<?php


namespace BasisData\Mongo\Controller;


use BasisData\Mongo\App\View;
use BasisData\Mongo\config\Mongo;

class ProductController
{
    public function index()
    {
        $products = Mongo::connect()->test->products->find();
        View::show('Product/index', [
            'data' => $products
        ]);
    }
}