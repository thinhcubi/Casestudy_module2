<?php
namespace Model;
class Product
{
    public string $name;
    public string $category;
    public string $image;
    public int $price;
    public int $id;

    public function __construct(string $name,string $category,string $price)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }public function setImage($image){
        $this->image = $image;
    }
    public function getImage(){
        return $this->image;
    }
}