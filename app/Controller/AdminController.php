<?php


namespace BasisData\Mongo\Controller;


use BasisData\Mongo\App\Session;
use BasisData\Mongo\App\View;
use BasisData\Mongo\Entity\ProductEntity;
use BasisData\Mongo\Services\OrderServices;
use BasisData\Mongo\Services\ProductServices;
use MongoDB\BSON\ObjectId;

class AdminController
{
    private OrderServices $orderServices;
    private ProductServices $productServices;


    public function __construct()
    {
        $this->orderServices = new OrderServices();
        $this->productServices = new ProductServices();
    }

    public function dashboard()
    {
        $orders = $this->orderServices->findAll( ['$and'=>[['session_id'=>['$exists'=>true]],['status'=>0]]], ['sort'=>['_id' => -1]]);
        $products = $this->productServices->findAll([],['sort' => ['category' => 1]]);
        View::show('Admin/index', [
            'order' =>  $orders,
            'product' => $products
        ]);
    }

    public function doAction()
    {
        try {
            if(isset($_POST['delete'])){
                $this->deleteProduct($_POST['_id']);
            }
            Session::Set('success', 'delete oke');
        }catch (\Exception $exception){
            Session::Set('err', $exception->getMessage());
        } finally {
            View::redirect('/admin');
        }
    }

    public function deleteProduct(string $id)
    {
        try {
           $this->productServices->deleteById($id);
        }catch (\Exception $e){
            throw new \Exception('delete produk gagal, silahkan cek kembali koneksi anda');
        }
    }

    public function editProduct()
    {
        $_id = new ObjectId($_GET['_id']);
       $filter = array(
           '_id' => new ObjectId($_id)
       );

       $update = array(
           '$set' => array(
               'name' => $_GET['name'],
               'category' => $_GET['ctgr'],
               'qty' => $_GET['qty'],
               'price' => $_GET['price']
           )
       );

        try {
            $this->productServices->updateOne($filter, $update);
            echo json_encode('edit oke');
        }catch (\Exception $exception){
            echo json_encode('edit gagal, coba lagi');
        }
    }

    public function addProduct()
    {
        View::show('Admin/add-product', []);
    }

    public function doAddProduct()
    {
        $product = new ProductEntity();
        $product->name = $_POST['proName'];
        $product->category = $_POST['catName'];
        $product->price = $_POST['harga'];
        $product->stock = $_POST['stock'];

        try {
            $this->productServices->insertOne($product);
            View::show('Admin/add-product', [
                'success' => 'Tambah produk berhasil'
            ]);
        }catch (\Exception $e){
            View::show('Admin/add-product', [
                'success' => 'Tambah produk gagal, ' . $e
            ]);
        }
    }
}