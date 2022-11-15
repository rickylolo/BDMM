
<?php
include_once 'db.php';

class User extends DB
{
    // QUERY Iniciar Sesion Usuario 

    function Iniciar($emailUsername, $password)
    {
        $insert = "CALL sp_GestionUsuario('L', 
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
        $query = $this->connect()->query($insert);
        return $query;
    }


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

    // QUERY Insertar Usuario Comprador

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
        1); ";
        $query = $this->connect()->query($insert);
        return $query;
    }

    function actualizarUser($id, $email, $username, $password, $user_Type, $user_IMG, $names, $lastNameP, $lastNameM, $fechaNac,  $genero)
    {
        $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG); //IMAGEN
        $insert = "CALL sp_GestionUsuario('E', 
        $id,
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

    function actualizarPrivacidad($id, $privacidad)
    {
        $priv = "CALL sp_GestionUsuario('P', 
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
        $query = $this->connect()->query($priv);
        return $query;
    }
}

?>
