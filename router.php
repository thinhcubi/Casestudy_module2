<?php

use Controller\HomeController;
use Controller\CafeController;
use Controller\AuthController;


include_once "controller/CafeController.php";
include_once "controller/HomeController.php";
include_once "controller/JuiceController.php";
include_once "controller/AuthController.php";
include_once "controller/OtherController.php";
include_once "controller/OderController.php";

$page = $_REQUEST['page'] ?? null;
$cafeController = new CafeController();
$juiceController = new JuiceController();
$homeController = new HomeController();
$authController = new AuthController();
$otherController = new OtherController();
$oderController = new OderController();
switch ($page){
    case 'cafe-list':
        $cafeController->showProduct();
        break;
    case 'add-Product':
        $cafeController->addProduct();
        break;
    case 'edit-Product':
        $cafeController->edit();
        break;
    case 'delete-Product':
        $cafeController->delete();
        break;
    case 'juice-list':
        $juiceController->showJuice();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'add-Juice':
        $juiceController->addJuice();
        break;
    case 'delete-Juice':
        $juiceController->deleteJuice();
        break;
    case 'edit-Juice':
        $juiceController->editJuice();
        break;
    case 'other-list':
        $otherController->showOther();
        break;
    case 'edit-Other':
        $otherController->editOther();
        break;
    case 'add-Other':
        $otherController->addOther();
        break;
    case 'delete-Other':
        $otherController->deleteOther();
        break;
    case 'oder-Cafe':
        $oderController->oderCafe();
        break;
    case 'oder-Juice':
        $oderController->oderJuice();
        break;
    case 'oder-Other':
        $oderController->oderOther();
        break;
    case 'oder-list':
        $oderController->showOder();
        break;
    case 'search-Other':
        $otherController->search();
        break;
    case 'search-Cafe':
        $cafeController->search();
        break;
    case 'search-Juice':
        $juiceController->search();
        break;
    default:
        $homeController->showDashBoard();
        break;
}