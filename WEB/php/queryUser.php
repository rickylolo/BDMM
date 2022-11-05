
<?php
include_once 'db.php';

class User extends DB
{
    function insertarUsuario()
    {
        //  $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG); //IMAGEN
        $insert = "CALL sp_GestionUsuario()";
        $query = $this->connect()->query($insert);
        return $query;
    }
    function updateUser($idUser, $username, $password, $names, $lastName, $email, $telefono, $user_Type, $user_IMG)
    {
        $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG);
        $update = "CALL sp_GestionUsuario('E',$idUser,'$username','$password','$names','$lastName','$email','$telefono',$user_Type,'$user_IMG')";
        $query = $this->connect()->query($update);
        return $query;
    }
    function deleteUser($idUser)
    {
        $delete = "CALL sp_GestionUsuario('D',$idUser,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
        $query = $this->connect()->query($delete);
        return $query;
    }
    function deleteReportero($idUser)
    {
        $delete = "CALL sp_GestionUsuario('D',$idUser,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
        $query = $this->connect()->query($delete);
        return $query;
    }
    function log_in($username, $password)
    {
        $login = "CALL sp_GestionUsuario('L',NULL,'$username','$password',NULL,NULL,NULL,NULL,NULL,NULL)";
        $query = $this->connect()->query($login);
        return $query;
    }
    function getUser($idUser)
    {
        $consulta = "CALL sp_GestionUsuario('G',$idUser,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
        $query = $this->connect()->query($consulta);
        return $query;
    }
    function getUsers()
    {
        $consulta = "CALL sp_GestionUsuario('A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
        $query = $this->connect()->query($consulta);
        return $query;
    }
}


?>