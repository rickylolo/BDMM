
<?php
include_once 'db.php';

class multimedia extends DB
{
    // ---------------------------------------CONSULTA DE INFORMACION------------------------------------------
    // QUERY Get Datos de todos las imagenes de un producto
    function getAllMultimediaProductoImagen($Producto_id)
    {
        $get = "CALL sp_Gestionmultimedia('G', 
        NULL,
        $Producto_id,
        NULL,
        NULL)";
        $query = $this->connect()->query($get);
        return $query;
    }

        // QUERY Get Datos de todos los videos de un producto
    function getAllMultimediaProductoVideo($Producto_id)
    {
        $get = "CALL sp_Gestionmultimedia('N', 
        NULL,
        $Producto_id,
        NULL,
        NULL)";
        $query = $this->connect()->query($get);
        return $query;
    }


    // ---------------------------------------INSERTAR INFORMACION------------------------------------------
    // QUERY Insertar multimedia

    function insertarMultimedia($Producto_id, $Multimedia, $esVideo)
    {
        $Multimedia = mysqli_escape_string($this->myCon(), $Multimedia); //IMAGEN
        $insert = "CALL sp_GestionMultimedia('I', 
        NULL,
        $Producto_id,
        '$Multimedia',
        $esVideo)";
        $query = $this->connect()->query($insert);
        return $query;
    } 

   // ---------------------------------------ACTUALIZAR INFORMACION------------------------------------------
   // QUERY Actualizar multimedia
    function actualizarMultimedia($ProductoMultimedia_id,$Producto_id, $Multimedia, $esVideo)
    {
        $Multimedia = mysqli_escape_string($this->myCon(), $Multimedia); //IMAGEN
        $update =  "CALL sp_GestionMultimedia('E', 
        $ProductoMultimedia_id,
        $Producto_id,
        '$Multimedia',
        $esVideo)";
        $query = $this->connect()->query($update);
        return $query;
    }
     // ---------------------------------------ELIMINAR INFORMACION------------------------------------------
    // QUERY Eliminar multimedia
    function eliminarmultimedia($ProductoMultimedia_id)
    {
        $delete = "CALL sp_GestionMultimedia('D', 
        $ProductoMultimedia_id,
        NULL,
        NULL,
        NULL)";
        $query = $this->connect()->query($delete);
        return $query;
    }
}

?>
