<?php


namespace BasisData\Mongo\Controller;


use BasisData\Mongo\App\Session;
use BasisData\Mongo\config\DatabaseFactory;
use MongoDB\Collection;
class OrderController
{
    private Collection $database;

    public function __construct()
    {
        $this->database = DatabaseFactory::Mongo('orders');
    }

    public function add()
    {

        Session::Get('s_id') ?? Session::Set('s_id', uniqid());

        $session_id = Session::Get('s_id');

        $existSession = $this->database->find([
            'session_id' => $session_id
        ]);


        if(sizeof($existSession->toArray()) == 0){
            $this->database->insertOne([
                'session_id' => $session_id
            ]);
        }

        try {
            $id = (int)$_GET['id'];
            $existItem = $this->database->findOne([
               'session_id' => $session_id
            ]);

            $data = [];

            foreach ($existItem['orders'] ?? [] as $key=>$value) {
                $data[] = $existItem['orders'][$key]['id'];
            }

            if(in_array($id, $data))
            {
                $this->database->updateOne([
                    'session_id' => $session_id,
                    'orders.id' => $id
                ], [
                    '$inc' => [
                        'orders.$.qty' => 1
                    ]
                ]);
//                echo json_encode(in_array($id, $data));
            }
            else
            {
                $product = DatabaseFactory::Mongo('products')->findOne([
                    'id' => $id
                ]);
                $this->database->updateOne([
                    'session_id' => $session_id,
                ], [
                    '$push' => [
                        'orders' => [
                            'id' => $product['id'],
                            'name' => $product['description'],
                            'price' => $product['price'],
                            'qty' => 1
                        ]
                    ]
                ]);
//                echo json_encode($product);
            }

        }catch (\Exception $ex){
            throw new \Exception('error');
        }
    }
}