<?php
namespace Services;

//include_once  "../model/DBConnection.php";
//include_once "../model/CafeDB.php";

use Model\DBConnection;
use Model\UserDB;


class AuthService
{
    public UserDB $productDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=cafe","root","Cubi@2712");
        $this->productDB = new UserDB($connection->connect());
    }
    public function checkUser($request): bool
    {
        $user = $this->productDB->findByUserPassword($request);
        if($user){
            $_SESSION['userLogin'] = $user;
            header('Location: ../../index.php');
        }
        return false;
    }
}