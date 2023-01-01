<?php

namespace BasisData\Mongo\Controller;

use BasisData\Mongo\App\Session;
use BasisData\Mongo\App\View;
use BasisData\Mongo\Services\OrderServices;
use BasisData\Mongo\Services\ProductServices;
use Exception;

class OrderController
{
    private OrderServices $orderServices;
    private ProductServices $productServices;


    public function __construct()
    {
        $this->orderServices = new OrderServices();
        $this->productServices = new ProductServices();
    }

    public function index()
    {
        $status = $_GET['action'];
        $id = (int)$_GET['id'];
        Session::Get('s_id') ?? Session::Set('s_id', uniqid());
        $session = Session::Get('s_id');

        try {
            if($status == "inc-prod") {
                $this->update($id, 1, $session);
            }elseif ($status == "del-prod"){
                $this->delete($id,$session);
            }else if($status == "dec-prod"){
                $this->update($id, -1, $session);
            }
        }catch (\Exception $e){

        }
    }

    /**
     * @throws Exception
     */
    private function update(int $id, int $qty, $session = "")
    {
        $session_id = $session;

         $this->orderServices->hasSessionOrInsert($session_id);

        try {
            $filter = array(
                'session_id' => $session_id,
                'orders' => array(
                    '$elemMatch' => array(
                        'id' => $id
                    )
                )
            );
            $option = array(
                'projection' => array(
                    'orders.$' => true
                )
            );
            $existProd = $this->orderServices->findOne($filter, $option);

            if($existProd) {
                $filter = array(
                    'session_id' => $session_id,
                    'orders.id' => $id
                );
                $update = array(
                    '$inc' => array(
                        'orders.$.qty' => $qty
                    )
                );
            } else {
                $product = $this->productServices->findOne(['id' => $id]);
                $filter = array(
                    'session_id' => $session_id
                );
                $update = array(
                    '$push' => array(
                        'orders' => array(
                            'id' => $product['id'],
                            'name' => $product['name'],
                            'price' => $product['price'],
                            'qty' => 1
                        )
                    )
                );
            }
            $this->orderServices->updateOne($filter, $update);
        }catch (\Exception $ex){
            echo json_encode(["err"=>"Tambah item gagal, coba ulangi kembali"]);
        }
    }

    private function delete(int $id, string $session)
    {
        try {
            $filter = array(
                'session_id' => $session
            );
            $update = array(
                '$pull' => array(
                    'orders' => array(
                        'id' => $id
                    )
                )
            );

            $this->orderServices->updateOne($filter, $update);
        }catch (Exception $exception){

        }
    }

    public function checkout()
    {
        $orderDetail = $this->orderServices->findOrderBySession('63a306ea12d75');
        View::show('Order/checkout', [
            'order' => $orderDetail
        ]);
    }
}