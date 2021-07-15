<?php


namespace Controller;

use Services\AuthService;
use Model\UserDB;
use Model\DBConnection;



class AuthController
{
    public AuthService $authService;
    public UserDB $userDB;

    public function __construct()
    {
        $this->authService = new AuthService();
        $connection = new DBConnection("mysql:host=localhost;dbname=cafe", "root", "Cubi@2712");
        $this->userDB = new UserDB($connection->connect());
    }

    public function login(): bool
    {
        return $this->authService->checkUser($_REQUEST);
    }
    public function logout() {
        if(isset($_SESSION['userLogin'])){
            session_destroy();
            header('Location: index.php');
        }
    }
    public function addUser($user,$password){
        $this->userDB->add($user,$password);
        header('Location: ../../index.php');
    }
}
