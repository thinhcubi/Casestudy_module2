<?php

namespace Model;
//include_once "Product.php";

use Model\Product;
use PDO;


class JuiceDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM `juice`";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
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

    public function insert(object $product)
    {
        $sql = "INSERT INTO `juice` (image,name,category,price) VALUES (?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $product->image);
        $stmt->bindParam(2, $product->name);
        $stmt->bindParam(3, $product->category);
        $stmt->bindParam(4, $product->price);
        return $stmt->execute();
    }

    public function update($id, $author)
    {
        $sql = "UPDATE `juice` SET image=?, name = ?,category = ?,price = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $author->image);
        $stmt->bindParam(2, $author->name);
        $stmt->bindParam(3, $author->category);
        $stmt->bindParam(4, $author->price);
        $stmt->bindParam(5, $id);
        $stmt->execute();
    }

    public function getId($id): array
    {
        $sql = "SELECT * FROM `juice`WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $products = [];
        foreach ($result as $item) {
            $product = new Product($item['name'], $item['category'], $item['price']);
            $product->setId($item['id']);
            $product->setImage($item['image']);
            $products[] = $product;
        }
        return $products;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `juice` WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function search(): array
    {
        $value = $_REQUEST['search'];
        $sql  = "SELECT * FROM `juice` WHERE `name` LIKE "."'%".$value."%"."'; ";
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
