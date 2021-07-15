<?php
use Model\DBConnection;
use Model\Product;
use Model\OtherDB;

//namespace Controller;
class OtherController
{
    public OtherDB $productDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=cafe", "root", "Cubi@2712");
        $this->productDB = new OtherDB(($connection->connect()));
    }
    public function showOther(){
        $products = $this->productDB->getAll();
        include_once "resource/other/list.php";
    }
    public function uploadImage(): string
    {
        $target_dir = "public/image/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        return $target_file;
    }
    public function error(): array
    {
        $errors = [];
        $fields = ['name','category','price'];
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = 'Must fill in blank spot';
            }
        }
        return $errors;
    }
    public function addOther(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "resource/other/add.php";
        } else {
            $errors = $this->error();
            if (empty($errors)) {
                $image=$this->uploadImage();
                $product = new Product($_POST['name'],$_POST['category'],$_POST['price']);
                $product->setImage($image);
                $this->productDB->insert($product);
                header('Location: index.php?page=juice-list');
            } else {
                include_once "resource/juice/add.php";
            }
        }
    }
    public function editOther()
    {
        $id = $_REQUEST['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $products = $this->productDB->getId($id);
            include_once "resource/other/edit.php";
        } else {
            if($_FILES['image']['name'] === ""){
                $products = $this->productDB->getId($id);
                foreach ($products as $item){
                    $image = $item->getImage();
                    $product = new Product($_POST['name'], $_POST['category'], $_POST['price']);
                    $product->setImage($image);
                    $this->productDB->update($id, $product);
                }
            } else {
                $product = new Product($_POST['name'], $_POST['category'], $_POST['price']);
                $image = $this->uploadImage();
                $product->setImage($image);
                $this->productDB->update($id, $product);
            }
            header('Location: index.php?page=other-list');
        }
    }
    public function deleteOther()
    {
        $id = $_REQUEST['id'];
        $this->productDB->delete($id);
        header('location: index.php?page=other-list');
    }
    public function search(){
        $products = $this->productDB->search();
        include_once "resource/other/search.php";
    }
}