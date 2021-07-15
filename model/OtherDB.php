<?php
namespace Model;
include_once "Product.php";
use Model\Product;

use PDO;


class OtherDB
{
public $connection;

public function __construct($connection)
{
$this->connection = $connection;
}

public function getAll(): array
{
$sql = "SELECT * FROM `other`";
$stmt = $this->connection->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$products = [];
foreach ($result as $item){
$product = new Product($item['name'],$item['category'],$item['price']);
$product->setImage($item['image']);
$product->setId($item['id']);
$products[] = $product;
}
return $products;

}
public function insert(object $product){
$sql = "INSERT INTO `other` (image,name,category,price) VALUES (?,?,?,?)";
$stmt = $this->connection->prepare($sql);
$stmt->bindParam(1, $product->image);
$stmt->bindParam(2,$product->name);
$stmt->bindParam(3,$product->category);
$stmt->bindParam(4,$product->price);
return  $stmt->execute();
}
public function update($id,$product)
{
$sql = "UPDATE `other` SET image=?, name = ?,category = ?,price = ? WHERE id = ?";
$stmt = $this->connection->prepare($sql);
$stmt->bindParam(1,$product->image);
$stmt->bindParam(2,$product->name);
$stmt->bindParam(3,$product->category);
$stmt->bindParam(4,$product->price);
$stmt->bindParam(5,$id);
$stmt->execute();
}
public function getId($id): array
{
$sql = "SELECT * FROM `other`WHERE id=?";
$stmt = $this->connection->prepare($sql);
$stmt->bindParam(1,$id);
$stmt->execute();
$result = $stmt->fetchAll();
$products = [];
foreach ($result as $item){
$product = new Product($item['name'],$item['category'],$item['price']);
$product->setId($item['id']);
$product->setImage($item['image']);
$products[] = $product;
}
return $products;
}
public function delete($id){
$sql ="DELETE FROM `other` WHERE id = ?";
$stmt = $this->connection->prepare($sql);
$stmt->bindParam(1,$id);
return $stmt->execute();
}
public function search(): array
{
    $value = $_REQUEST['search'];
    $sql  = "SELECT * FROM `other` WHERE `name` LIKE "."'%".$value."%"."'; ";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $products = [];
    foreach ($result as $item){
        $product = new Product($item['name'],$item['category'],$item['price']);
        $product->setId($item['id']);
        $product->setImage($item['image']);
        $products[] = $product;
    }
    return $products;
}
}
