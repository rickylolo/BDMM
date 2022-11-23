
<?php
include_once 'db.php';

class pedido extends DB
{
    // ---------------------------------------CONSULTA DE INFORMACION------------------------------------------
     // QUERY Get Datos Todos los Pedidos
    function getAllPedido()
    {
        $get = "CALL sp_GestionPedido('G', 
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL);";
        $query = $this->connect()->query($get);
        return $query;
    }

         // QUERY Get Datos Pedidos Usuario
    function getAllPedidosUser($Usuario_id)
    {
        $get = "CALL sp_GestionPedido('U', 
        NULL,
        NULL,
        NULL,
        $Usuario_id,
        NULL,
        NULL);";
        $query = $this->connect()->query($get);
        return $query;
    }


    // ---------------------------------------INSERTAR INFORMACION------------------------------------------
    // QUERY Insertar Pedido

    function insertarPedido($Lista_id ,$MetodoPago_id,$Usuario_id,$estadoPedido)
    {
        $insert = "CALL sp_GestionPedido('I', 
        NULL,
        $Lista_id,
        $MetodoPago_id,
        $Usuario_id,
        '$estadoPedido',
        NULL);";
        $query = $this->connect()->query($insert);
        return $query;
    } 

   // ---------------------------------------ACTUALIZAR INFORMACION------------------------------------------
   // QUERY Actualizar Pedido
    function actualizarPedido($Pedido_id,$Lista_id ,$MetodoPago_id,$Usuario_id,$estadoPedido,$fechaEntrega)
    {
        $update =  "CALL sp_GestionPedido('E', 
        $Pedido_id,
        $Lista_id,
        $MetodoPago_id,
        $Usuario_id,
        '$estadoPedido',
        '$fechaEntrega');";
        $query = $this->connect()->query($update);
        return $query;
    }
     // ---------------------------------------ELIMINAR INFORMACION------------------------------------------
    // QUERY Eliminar Pedido
    function eliminarPedido($Pedido_id)
    {
        $delete = "CALL sp_GestionPedido('D', 
        $Pedido_id,
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
