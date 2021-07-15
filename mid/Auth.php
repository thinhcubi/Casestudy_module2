<?php

namespace Mid;
class Auth
{
    public function construct()
    {
    }
    public function login() {
        if(!isset($_SESSION['userLogin']))
        {
            header("Location: resource/view/login.php");
        }
    }

}