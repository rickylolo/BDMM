<?php
include_once 'queryUser.php';





class userAPI
{




    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("Location:index.php");
        exit();
    }
}

//AJAX
