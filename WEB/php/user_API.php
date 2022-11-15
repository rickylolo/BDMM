<?php
include_once 'queryUser.php';





class userAPI
{
     function seleccionLoggeo($usuario, $password)
    {

        $user = new User();
        $arrUsers = array();
        $arrUsers["Datos"] = array();

        $res = $user->log_in($usuario, $password);

        if ($res) { // Entra si hay información
            session_start();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "Usuario_id" => $row['ID']
                );
                $_SESSION['Usuario_id'] = $obj["Usuario_id"];
                array_push($arrUsers["Datos"], $obj);
            }
            if (!$res->fetch(PDO::FETCH_ASSOC)) {
                if ($_SESSION != NULL) {
                    header("Location:../mainPage.php");
                    exit();
                } else {
                    header("Location:../index.php");
                    exit();
                }
            }
        } else {
            header("Location:../index.php");
            exit();
        }
    }

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


// PROCEDIMIENTOS NO ASINCRONOS, Necesita de actualizar la pagina para funcionar o redirigir a otra
//Cerrar Sesión
if (isset($_GET['logout'])) {
    $var = new userAPI();
    $var->cerrarSesion();
}

// AQUI ENTRA DESDE EL FORMS DE LOGIN 
// Buscar User
if (isset($_POST['username']) && isset($_POST['password'])) {
    $var = new userAPI();
    $var->seleccionLoggeo($_POST['username'], $_POST['password']);
}
