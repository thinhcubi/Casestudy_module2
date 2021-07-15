<?php

use Controller\AuthController;
include_once "../../vendor/autoload.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user = $_POST['email'];
    $password = $_POST['password'];
    $authController = new AuthController();
    $authController->addUser($user,$password);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <form method="post">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                </div>
                <input name="name" class="form-control" placeholder="Full name" type="text" >
<!--                <p class="help-block text-danger">--><?php //if (isset($_SESSION['user'])){ echo $_SESSION['user']; session_destroy();} ?><!--</p>-->
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" >
<!--                <p class="help-block text-danger">--><?php //if(isset($_SESSION['email'])) {echo $_SESSION['email']; session_destroy();} ?><!-- </p>-->
            </div> <!-- form-group// -->
            <div class="form-group input-group">

                <input name="" class="form-control" placeholder="Phone number" type="text">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    <input class="form-control" placeholder="Repeat password" name="password" type="password" >
                </div> <!-- form-group// -->
                <div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="../../index.php">Log In</a> </p>
        </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
</body>
</html>
