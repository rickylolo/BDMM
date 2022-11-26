<?php
include_once 'producto_Queries.php';





class ProductoAPI
{
    function getProductos()
    {
        $producto = new producto();
        $arrProductos = array();
        $arrProductos["Datos"] = array();
        $res = $producto->getAllProductos();
        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "Producto_id" => $row['Producto_id'],
                    "Usuario_id" => $row['Usuario_id'],
                    "nombreProducto" => $row['nombreProducto'],
                    "descripcionProducto" => $row['descripcionProducto'],
                    "esCotizado" => $row['esCotizado'],
                    "Precio" => $row['Precio'],
                    "cantidadDisponible" => $row['cantidadDisponible']
                   
                );
                array_push($arrProductos["Datos"], $obj);
            }
            echo json_encode($arrProductos["Datos"]);
        } else {
            header("Location:../paginaVendedor.php");
            exit();
        }
    }

    function insertarProducto($Usuario_id,$nombreProducto,$descProducto,$esCotizado,$Precio,$cantidadDisponible)
    {
        $producto = new producto();
        $arrProductos = array();
        $arrProductos["Datos"] = array();
        $res =  $producto->insertarProducto($Usuario_id,$nombreProducto,$descProducto,$esCotizado,$Precio,$cantidadDisponible);
        if ($res) { // Entra si hay información
    
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $obj = array(
                    "Producto_id" => $row['Producto_id']
                   
                );
                array_push($arrProductos["Datos"], $obj);
            }
            echo json_encode($arrProductos["Datos"]);
        } else {
            header("Location:../paginaVendedor.php");
            exit();
        }
    }

    function actualizarProducto($Producto_id,$Usuario_id,$nombreProducto,$descProducto,$esCotizado,$Precio,$cantidadDisponible)
    {
        $producto = new producto();
        $producto->actualizarProducto($Producto_id,$Usuario_id,$nombreProducto,$descProducto,$esCotizado,$Precio,$cantidadDisponible);
    }
 
    function eliminarProducto($Producto_id)
    {
        $producto = new producto();
        $producto->eliminarProducto($Producto_id);
    }


}

//AJAX
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) {
        case "insertarProducto":
            session_start();
            $id = $_SESSION['id'];
            $var = new ProductoAPI();
            $var->insertarProducto($id,$_POST['nombreProducto'],$_POST['descProducto'],$_POST['esCotizado'],$_POST['Precio'],$_POST['cantidadDisponible']);
            break;
        case "actualizarProducto":
            $id = $_SESSION['id'];
            $var = new ProductoAPI();
            $var->actualizarProducto($_POST['Producto_id'],$id,$_POST['nombreProducto'],$_POST['descProducto'],$_POST['esCotizado'],$_POST['Precio'],$_POST['cantidadDisponible']);
            break;
        case "eliminarProducto":
            $var = new ProductoAPI();
            $var->eliminarProducto($_POST['producto_id']);
            break;
        case "getProductos":
            $var = new ProductoAPI();
            $var->getProductos();
            break;
    }
}

