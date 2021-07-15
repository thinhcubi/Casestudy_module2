<?php


use Model\DBConnection;
use Model\Product;
use Model\JuiceDB;

//namespace Controller;
class JuiceController
{
    public JuiceDB $productDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=cafe", "root", "Cubi@2712");
        $this->productDB = new JuiceDB($connection->connect());
    }
    public function showJuice(){
        $products = $this->productDB->getAll();
        include_once "resource/juice/list.php";
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
    public function addJuice(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "resource/juice/add.php";
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
    public function editJuice()
    {
        $id = $_REQUEST['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $products = $this->productDB->getId($id);
            include_once "resource/juice/edit.php";
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
            header('Location: index.php?page=juice-list');
        }
    }
    public function deleteJuice()
    {
        $id = $_REQUEST['id'];
        $this->productDB->delete($id);
        header('location: index.php?page=juice-list');
    }
    public function search(){
        $products = $this->productDB->search();
        include_once "resource/juice/search.php";
    }

}