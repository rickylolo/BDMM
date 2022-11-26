
<?php
include_once 'db.php';

class MetodoPago extends DB
{

    // ---------------------------------------CONSULTA DE INFORMACION------------------------------------------
     // QUERY Get Datos Todos los Metodos de Pago
    function getAllMetodoPago()
    {
        $get = "CALL sp_GestionMetodoDePago('G', 
         NULL,
         NULL,
         NULL,
         NULL,
         NULL,
         NULL,
         NULL);";
        $query = $this->connect()->query($get);
        return $query;
    }


    // ---------------------------------------INSERTAR INFORMACION------------------------------------------
    // QUERY Insertar Metodo de Pago

    function insertarMetodoPago($Usuario_id,$tipoMetodo,$nombreMetodo,$imagenMetodo)
    {
        $imagenMetodo = mysqli_escape_string($this->myCon(), $imagenMetodo); //IMAGEN
        $insert = "CALL sp_GestionMetodoDePago('I', 
         NULL,
         $Usuario_id,
         NULL,
         '$tipoMetodo',
         '$nombreMetodo',
         NULL,
         '$imagenMetodo');";
        $query = $this->connect()->query($insert);
        return $query;
    } 

   // ---------------------------------------ACTUALIZAR INFORMACION------------------------------------------
   // QUERY Actualizar Metodo de pago
    function actualizarMetodoPago($MetodoPago_id,$tipoMetodo,$nombreMetodo,$imagenMetodo)
    {
        $imagenMetodo = mysqli_escape_string($this->myCon(), $imagenMetodo); //IMAGEN
        $update =  "CALL sp_GestionMetodoDePago('E', 
         $MetodoPago_id,
         NULL,
         NULL,
         '$tipoMetodo',
         '$nombreMetodo',
         NULL,
         '$imagenMetodo');";
        $query = $this->connect()->query($update);
        return $query;
    }
     // ---------------------------------------ELIMINAR INFORMACION------------------------------------------
    // QUERY Eliminar Metodo de pago
    function eliminarMetodoPago($MetodoPago_id)
    {
        $delete = "CALL sp_GestionMetodoDePago('D', 
         $MetodoPago_id,
         NULL,
         NULL,
         NULL,
         NULL,
         NULL,
         NULL);";
        $query = $this->connect()->query($delete);
        return $query;
    }
}

?>
