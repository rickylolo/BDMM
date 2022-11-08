<?php
include_once 'queryUser.php';





class userAPI
{
    function insertarUserComprador($email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero)
    {
        $user = new User();
        $user->insertarUsuarioComprador($email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero);
    }

    function insertarUserVendedor($email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero)
    {
        $user = new User();
        $user->insertarUserVendedor($email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero);
    }

    function actualizarUser($id, $email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero)
    {
        $user = new User();
        $user->actualizarUser($id, $email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero);
    }


    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("Location:index.php");
        exit();
    }
}



//AJAX

if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) {
        case "registrarUsuarioComprador":
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var = new userAPI();
            $var->insertarUserComprador($_POST['email'], $_POST['usuario'], $_POST['contrasenia'], 1, $binariosImagen, $_POST['names'], $_POST['lastNameP'], $_POST['lastNameM'], $_POST['fechaNacimiento'], $_POST['genero']);
            break;
        case "registrarUsuarioVendedor":
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var = new userAPI();
            $var->insertarUserVendedor($_POST['email'], $_POST['usuario'], $_POST['contrasenia'], 1, $binariosImagen, $_POST['names'], $_POST['lastNameP'], $_POST['lastNameM'], $_POST['fechaNacimiento'], $_POST['genero']);
            break;
        case "actualizarUser":
            session_start();
            $id = $_SESSION['id'];
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var = new userAPI();
            $var->actualizarUser($id, $_POST['email'], $_POST['usuario'], $_POST['contrasenia'], 1, $binariosImagen, $_POST['names'], $_POST['lastNameP'], $_POST['lastNameM'], $_POST['fechaNacimiento'], $_POST['genero']);
            break;
    }
}
