<?php
include_once "../../vendor/autoload.php";

use Controller\AuthController;

if ($_SERVER['REQUEST_METHOD']=='POST'){
    session_start();
    $authController = new AuthController();
    if(!$authController->login()){
        $error = "Tài khoản hoặc mật khẩu không đúng";
    }
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper fadeInDown">
    <div id="formContent">

        <form method="post">
            <input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
        <div style="color: red">   <?php if(isset($error)):{
                echo $error;
            }?>
            <?php endif; ?>
        </div>
        <a href="register.php">Register</a>
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>

</body>
</html>