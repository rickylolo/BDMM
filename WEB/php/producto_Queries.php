
<?php
include_once 'db.php';

class producto extends DB
{
    // ---------------------------------------CONSULTA DE INFORMACION------------------------------------------
     // QUERY Get Datos de todos los productos aprobados
    function getAllProductos()
    {
        $get = "CALL sp_GestionProducto('A', 
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

   // QUERY Get Datos de todos los productos aprobados
    function getAllProductosNoAprobados()
    {
        $get = "CALL sp_GestionProducto('N', 
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

    // QUERY Get Datos de todos los productos aprobados
    function getAllProductosAprobadosVendedor($id)
    {
        $get = "CALL sp_GestionProducto('V', 
        NULL,
        $id,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL);";
        $query = $this->connect()->query($get);
        return $query;
    }

           // QUERY Get Datos de todos los productos aprobados
    function getAllProductosNoAprobadosVendedor($id)
    {
        $get = "CALL sp_GestionProducto('T', 
        NULL,
        $id,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL);";
        $query = $this->connect()->query($get);
        return $query;
    }

     // QUERY Get Dato de producto no Aprobado
    function getProductoNoAprobado($Producto_id)
    {
        $get = "CALL sp_GestionProducto('G', 
        $Producto_id,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL);";
        $query = $this->connect()->query($get);
        return $query;
    }

    // QUERY Get Dato de producto Aprobado
    function getProductoAprobado($Producto_id)
    {
        $get = "CALL sp_GestionProducto('Z', 
        $Producto_id,
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
    function insertarProducto($Usuario_id ,$nombreProducto,$descProducto,$esCotizado,$Precio,$cantidadDisponible)
    {
        $insert = "CALL sp_GestionProducto('I', 
        NULL,
        $Usuario_id,
        '$nombreProducto',
        '$descProducto',
        $esCotizado,
        '$Precio',
        '$cantidadDisponible');";
        $query = $this->connect()->query($insert);
        return $query;
    } 

   // ---------------------------------------ACTUALIZAR INFORMACION------------------------------------------
   // QUERY Actualizar producto
    function actualizarProducto($Producto_id,$Usuario_id ,$nombreProducto,$descProducto,$esCotizado,$Precio,$cantidadDisponible)
    {
        $update =  "CALL sp_GestionProducto('E', 
        $Producto_id,
        $Usuario_id,
        '$nombreProducto',
        '$descProducto',
        $esCotizado,
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
        NULL,
        NULL);";
        $query = $this->connect()->query($delete);
        return $query;
    }
}

?>
