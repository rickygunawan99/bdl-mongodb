<?php


namespace BasisData\Mongo\Controller;


use BasisData\Mongo\App\Session;
use BasisData\Mongo\App\View;
use BasisData\Mongo\Services\OrderServices;
use BasisData\Mongo\Services\ProductServices;
use Exception;

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
     * @throws Exception
     */
    public function index()
    {
        if(!Session::Get('s_id')){
            Session::Set('s_id', uniqid());
        }
        $products = iterator_to_array($this->productServices->findAll());
        $orders = iterator_to_array($this->orderServices->findOrderBySession(Session::Get('s_id')));
        $categories = array();
        $total = 0;

        foreach ($products as $product) {
            foreach ($orders as $order) {
                foreach ($order['orders'] as $item) {
                    if($product['id'] == $item['id']){
                        $product['order_qty'] = $item['qty'];
                        $total += $item['qty'] * $product['price'];
                    }
                }
            }
//            $categories[] = str_replace(' ', '-', $product['category']);
            $categories[] = $product['category'];
        }

        View::show('Product/index2', [
            'products' => $products,
            'categories' => array_unique($categories),
            'total' => $total
        ]);
    }


}