<?php


namespace BasisData\Mongo\Controller;


use BasisData\Mongo\App\Session;
use BasisData\Mongo\App\View;
use BasisData\Mongo\config\DatabaseFactory;
use BasisData\Mongo\config\Mongo;
use BasisData\Mongo\Services\OrderServices;
use BasisData\Mongo\Services\ProductServices;

class ProductController
{
    private ProductServices $productServices;
    private OrderServices $orderServices;

    public function __construct()
    {
        $this->productServices = new ProductServices();
        $this->orderServices = new OrderServices();
    }

    /**
     * @throws \Exception
     */
    public function index()
    {
        $products = iterator_to_array($this->productServices->findAll());
        $orders = iterator_to_array($this->orderServices->findOrderBySession("63a306ea12d75"));

        foreach ($products as $product) {
            foreach ($orders as $order) {
                foreach ($order['orders'] as $item) {
                    if($product['id'] == $item['id']){
                        $product['order_qty'] = $item['qty'];
                    }
                }
            }
        }

        View::show('Product/index', [
            'products' => $products
        ]);
    }
}