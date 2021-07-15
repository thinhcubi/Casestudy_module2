<?php

use Model\CafeDB;
use Model\OtherDB;
use Model\JuiceDB;
use Model\DBConnection;

include_once "model/DBConnection.php";
class OderController
{
    public CafeDB $cafeDB;
    public OtherDB $otherDB;
    public JuiceDB $juiceDB;
    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=cafe", "root", "Cubi@2712");
        $this->otherDB = new OtherDB(($connection->connect()));
        $this->juiceDB = new JuiceDB($connection->connect());
        $this->cafeDB = new CafeDB($connection->connect());
    }

    public function oderOther(): array
    {
        $id = $_REQUEST['id'];
        $oder = $this->otherDB->getId($id);
        var_dump($oder);
        die();
    }
    public function oderJuice(): array
    {
        $id = $_REQUEST['id'];
       return $this->juiceDB->getId($id);
    }
    public function oderCafe(): array
    {
        $id = $_REQUEST['id'];
      return $this->cafeDB->getId($id);
    }
    public function showOder(){
     $products = [];
     $other = $this->oderOther();
     $juice = $this->oderJuice();
     var_dump($juice);
     die();
     $cafe = $this->oderCafe();
     array_push($products,$other);
     array_push($products,$juice);
     array_push($products,$cafe);
     var_dump($products);
    }

}
