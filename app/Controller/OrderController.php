<?php

namespace BasisData\Mongo\Controller;

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

        try {
            if($status == "inc-prod") {
                $this->update($id, 1, "63a306ea12d75");
            }elseif ($status == "del-prod"){
                $this->delete($id,"63a306ea12d75");
            }else if($status == "dec-prod"){
                $this->update($id, -1, "63a306ea12d75");
            }
        }catch (\Exception $e){

        }
    }

    /**
     * @throws Exception
     */
    private function update(int $id, int $qty, $session = "")
    {
//        Session::Get('s_id') ?? Session::Set('s_id', '63a341668ba00');

        $session_id = $session;

        $existSession = $this->orderServices->isExistSession($session_id);

        if($existSession == 0){
            $data = [
                'session_id' => $session_id,
                'status' => 0
            ];
            $this->orderServices->save($data);
        }

        try {
//            $id = (int)$_GET['id'];
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
}