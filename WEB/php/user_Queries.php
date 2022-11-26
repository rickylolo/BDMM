
<?php
include_once 'db.php';

class User extends DB
{

    // ---------------------------------------CONSULTA DE INFORMACION------------------------------------------
    // QUERY Iniciar Sesion Usuario 

    function IniciarSesion($emailUsername, $password)
    {
        $get = "CALL sp_GestionUsuario('L', 
         NULL,
         NULL,
         '$emailUsername', 
         '$password', 
         NULL,
         NULL, 
         NULL, 
         NULL, 
         NULL, 
         NULL, 
         NULL,
         1); ";
        $query = $this->connect()->query($get);
        return $query;
    }

        // QUERY Get Datos Usuario

    function getUserData($Usuario_id)
    {
        $get = "CALL sp_GestionUsuario('G', 
         $Usuario_id,
         NULL,
         NULL,
         NULL,
         NULL,
         NULL, 
         NULL, 
         NULL, 
         NULL, 
         NULL, 
         NULL,
         1); ";
        $query = $this->connect()->query($get);
        return $query;
    }


    // ---------------------------------------INSERTAR INFORMACION------------------------------------------
    // QUERY Insertar Usuario Comprador

    function insertarUsuarioComprador($email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero)
    {
        $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG); //IMAGEN
        $insert = "CALL sp_GestionUsuario('I', 
        NULL,
        '$email',
        '$username', 
        '$password', 
         $user_Type,
        '$user_IMG', 
        '$names', 
        '$lastNameP', 
        '$lastNameM', 
        '$fechaNac', 
        '$genero',
        1); ";
        $query = $this->connect()->query($insert);
        return $query;
    }

    // QUERY Insertar Usuario Vendedor

    function insertarUserVendedor($email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero)
    {
        $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG); //IMAGEN
        $insert = "CALL sp_GestionUsuario('I', 
        NULL,
        '$email',
        '$username', 
        '$password', 
         $user_Type,
        '$user_IMG', 
        '$names', 
        '$lastNameP', 
        '$lastNameM', 
        '$fechaNac', 
        '$genero',
        1);";
        $query = $this->connect()->query($insert);
        return $query;
    }

   // ---------------------------------------ACTUALIZAR INFORMACION------------------------------------------
   // QUERY Actualizar Usuario
    function actualizarUser($id, $email, $username, $password,  $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac)
    {
        $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG); //IMAGEN
        $update = "CALL sp_GestionUsuario('E', 
        $id,
        '$email',
        '$username', 
        '$password', 
         NULL,
        '$user_IMG', 
        '$names', 
        '$lastNameP', 
        '$lastNameM', 
        '$fechaNac', 
         NULL,
         NULL);";
        $query = $this->connect()->query($update);
        return $query;
    }

    function actualizarPrivacidad($id, $privacidad)
    {
        $update = "CALL sp_GestionUsuario('P', 
        $id,
        NULL,
        NULL, 
        NULL, 
        NULL,
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL,
        $privacidad); ";
        $query = $this->connect()->query($update);
        return $query;
    }

     // ---------------------------------------ELIMINAR INFORMACION------------------------------------------
}

?>
