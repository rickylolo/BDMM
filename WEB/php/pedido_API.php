<?php
include_once 'pedido_Queries.php';





class PedidoAPI
{

    function getPedidos()
    {
        $pedido = new Pedido();
        $arrpedidos = array();
        $arrpedidos["Datos"] = array();
        $res = $pedido->getAllPedido();
        if ($res) { // Entra si hay información
            session_start();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "Pedido_id" => $row['Pedido_id'],
                    "Lista_id" => $row['Lista_id'],
                    "MetodoPago_id" => $row['MetodoPago_id'],
                    "Usuario_id" => $row['Usuario_id'],
                    "estadoPedido" => $row['estadoPedido'],
                    "fechaPedido" => $row['fechaPedido'],
                    "fechaEntrega" => $row['fechaEntrega'],
                    "nombreLista" => $row['nombreLista'],
                    "descripcion" => $row['descripcion'],
                    "imagenLista" => base64_encode(($row['imagenLista'])),
                    "tipoMetodo" => $row['tipoMetodo'],
                    "nombreMetodo" => $row['nombreMetodo'],
                    "imagenMetodo" => base64_encode(($row['imagenMetodo'])),
                    "correo" => $row['correo'],
                    "nickUsuario" => $row['nickUsuario'],
                    "nombreUsuario" => $row['nombreUsuario'],
                    "apellidoMaterno" => $row['apellidoMaterno'],
                    "apellidoPaterno" => $row['apellidoPaterno'],
                );
                array_push($arrpedidos["Datos"], $obj);
            }
            echo json_encode($arrpedidos["Datos"]);
        } else {
            header("Location:../paginaAdmin.php");
            exit();
        }
    }

    function getPedidoUser($Usuario_id)
    {
        $pedido = new Pedido();
        $arrpedidos = array();
        $arrpedidos["Datos"] = array();
        $res = $pedido->getAllPedidosUser($Usuario_id);
        if ($res) { // Entra si hay información
            session_start();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "Pedido_id" => $row['Pedido_id'],
                    "Lista_id" => $row['Lista_id'],
                    "MetodoPago_id" => $row['MetodoPago_id'],
                    "Usuario_id" => $row['Usuario_id'],
                    "estadoPedido" => $row['estadoPedido'],
                    "fechaPedido" => $row['fechaPedido'],
                    "fechaEntrega" => $row['fechaEntrega'],
                    "nombreLista" => $row['nombreLista'],
                    "descripcion" => $row['descripcion'],
                    "imagenLista" => base64_encode(($row['imagenLista'])),
                    "tipoMetodo" => $row['tipoMetodo'],
                    "nombreMetodo" => $row['nombreMetodo'],
                    "imagenMetodo" => base64_encode(($row['imagenMetodo'])),
                    "correo" => $row['correo'],
                    "nickUsuario" => $row['nickUsuario'],
                    "nombreUsuario" => $row['nombreUsuario'],
                    "apellidoMaterno" => $row['apellidoMaterno'],
                    "apellidoPaterno" => $row['apellidoPaterno'],
                );
                array_push($arrpedidos["Datos"], $obj);
            }
            echo json_encode($arrpedidos["Datos"]);
        } else {
            header("Location:../paginaAdmin.php");
            exit();
        }
    }

    function insertarPedido($Lista_id ,$MetodoPago_id,$Usuario_id,$estadoPedido)
    {
        $pedido = new Pedido();
        $pedido->insertarPedido($Lista_id ,$MetodoPago_id,$Usuario_id,$estadoPedido);
    }

    function actualizarPedido($Pedido_id,$Lista_id ,$MetodoPago_id,$Usuario_id,$estadoPedido,$fechaEntrega)
    {
        $pedido = new Pedido();
        $pedido->actualizarPedido($Pedido_id,$Lista_id ,$MetodoPago_id,$Usuario_id,$estadoPedido,$fechaEntrega);
    }
 
    function eliminarPedido($Pedido_id)
    {
        $pedido = new Pedido();
        $pedido->eliminarPedido($Pedido_id);
    }


}

//AJAX
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) {
        case "insertarPedido":
            session_start();
            $id = $_SESSION['id'];
            $var = new PedidoAPI();
            $var->insertarPedido($_POST['Lista_id'],$id,$_POST['Usuario_id'],$_POST['estadoPedido']);
            break;
        case "actualizarPedido":
            $id = $_SESSION['id'];
            $var = new PedidoAPI();
            $var->actualizarPedido($_POST['Pedido_id'],$_POST['Lista_id'],$id,$_POST['Usuario_id'],$_POST['estadoPedido'],$_POST['fechaEntrega']);
            break;
        case "deletePedido":
            $var = new PedidoAPI();
            $var->eliminarPedido($_POST['Pedido_id']);
            break;
        case "getPedidos":
            $var = new PedidoAPI();
            $var->getPedidos();
            break;
        case "getPedidosUsuario":
            $id = $_SESSION['id'];
            $var = new PedidoAPI();
            $var = new PedidoAPI();
            $var->getPedidoUser($id);
            break;
    }
}

