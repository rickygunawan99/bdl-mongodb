<?php


namespace BasisData\Mongo\Controller;


use BasisData\Mongo\config\DatabaseFactory;

class OrderController
{

    public function add()
    {
        session_start();

        if(!isset($_SESSION['s_id'])){
            $_SESSION['s_id'] = uniqid();
        }

        $session_id = $_SESSION['s_id'];

        $existSession = DatabaseFactory::Mongo('orders')->findOne([
            'session_id' => $session_id
        ]);

        $item = [
            'item' => $_GET['id']
        ];

        if(!$existSession){
            DatabaseFactory::Mongo('orders')->insertOne([
                'session_id' => $session_id
            ]);
        }

        try {
            DatabaseFactory::Mongo('orders')->updateOne([
               'session_id' => $session_id
            ], [
                '$push' => [
                    'orders' => [
                        'name' => 'test',
                        'price' => 123339,
                        'qty' => 3
                    ]
                ]
            ]);
        }catch (\Exception $ex){

        }
    }
}