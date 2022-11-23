
<?php
include_once 'db.php';

class producto extends DB
{
    // ---------------------------------------CONSULTA DE INFORMACION------------------------------------------
     // QUERY Get Datos de todos los productos
    function getAllProductos()
    {
        $get = "CALL sp_GestionProducto('A', 
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
    // QUERY Insertar producto

    function insertarProducto($Usuario_id ,$nombreProducto,$esCotizado,$Precio,$cantidadDisponible)
    {
        $insert = "CALL sp_GestionProducto('I', 
        NULL,
        $Usuario_id,
        '$nombreProducto',
        '$esCotizado',
        '$Precio',
        '$cantidadDisponible');";
        $query = $this->connect()->query($insert);
        return $query;
    } 

   // ---------------------------------------ACTUALIZAR INFORMACION------------------------------------------
   // QUERY Actualizar producto
    function actualizarProducto($Producto_id,$Usuario_id ,$nombreProducto,$esCotizado,$Precio,$cantidadDisponible)
    {
        $update =  "CALL sp_GestionProducto('E', 
        $Producto_id,
        $Usuario_id,
        '$nombreProducto',
        '$esCotizado',
        '$Precio',
        '$cantidadDisponible');";
        $query = $this->connect()->query($update);
        return $query;
    }
     // ---------------------------------------ELIMINAR INFORMACION------------------------------------------
    // QUERY Eliminar producto
    function eliminarProducto($Producto_id)
    {
        $delete = "CALL sp_GestionProducto('D', 
        $Producto_id,
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
