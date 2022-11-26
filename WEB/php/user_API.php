<?php
include_once 'user_Queries.php';





class userAPI
{
     function seleccionLoggeo($usuario, $password)
    {

        $user = new User();
        $arrUsers = array();
        $arrUsers["Datos"] = array();

        $res = $user->IniciarSesion($usuario, $password);

        if ($res) { // Entra si hay información
            session_start();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "id" => $row['ID'],
                    "rol" => $row['rol']
                );
                $_SESSION['id'] = $obj["id"];
                $_SESSION['rol'] = $obj["rol"];
                array_push($arrUsers["Datos"], $obj);
            }
           echo json_encode($arrUsers["Datos"]);
        } else {
            header("Location:../index.php");
            exit();
        }
    }

    function getUserData($id_user)
    {

        $user = new User();
        $arrUsers = array();
        $arrUsers["Datos"] = array();

        $res = $user->getUserData($id_user);
        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "ID" => $row['ID'],
                    "email" => $row['email'],
                    "username" => $row['username'],
                    "userRol" => $row['userRol'],
                    "PFP" => base64_encode(($row['PFP'])),
                    "nombreCompleto" => $row['nombreCompleto'],
                    "nombreUsuario" => $row['nombreUsuario'],
                    "apellidoPaterno" => $row['apellidoPaterno'],
                    "apellidoMaterno" => $row['apellidoMaterno'],
                    "fecha" => $row['fecha'],
                    "sexo" => $row['sexo'],
                    "esPrivado" => $row['esPrivado']
                );
                array_push($arrUsers["Datos"], $obj);
            }
            echo json_encode($arrUsers["Datos"]);
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

    function actualizarUser($id, $email, $username, $password,  $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac)
    {
        $user = new User();
        $user->actualizarUser($id, $email, $username, $password,$user_IMG, $names, $lastNameP, $lastNameM, $fechaNac);
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
        case "iniciarSesion":
            $var = new userAPI();
            $var->seleccionLoggeo($_POST['username'], $_POST['password']);
            break;
        case "registrarUsuarioAdministrador":
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var = new userAPI();
            $var->insertarUserComprador($_POST['email'], $_POST['usuario'], $_POST['contrasenia'], 2, $binariosImagen, $_POST['names'], $_POST['lastNameP'], $_POST['lastNameM'], $_POST['fechaNacimiento'], $_POST['genero']);
            break;
        case "registrarUsuarioVendedor":
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var = new userAPI();
            $var->insertarUserVendedor($_POST['email'], $_POST['usuario'], $_POST['contrasenia'], 3, $binariosImagen, $_POST['names'], $_POST['lastNameP'], $_POST['lastNameM'], $_POST['fechaNacimiento'], $_POST['genero']);
            break;
        case "registrarUsuarioComprador":
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var = new userAPI();
            $var->insertarUserComprador($_POST['email'], $_POST['usuario'], $_POST['contrasenia'], 4, $binariosImagen, $_POST['names'], $_POST['lastNameP'], $_POST['lastNameM'], $_POST['fechaNacimiento'], $_POST['genero']);
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
            $var->actualizarUser($id, $_POST['email'], $_POST['usuario'], $_POST['contrasenia'],$binariosImagen, $_POST['names'], $_POST['lastNameP'], $_POST['lastNameM'], $_POST['fechaNacimiento']);
            break;
        case "obtenerDataUsuario":
            session_start();
            $id = $_SESSION['id'];
            $var = new userAPI();
            $var->getUserData($id);
            break;
    }
}

//Cerrar Sesión
if (isset($_GET['logout'])) {
    $var = new userAPI();
    $var->cerrarSesion();
}

