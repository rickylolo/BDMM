<?php
include_once 'categoria_Queries.php';



/*
Usuario_id, nombreCategoria, colorCategoria, descripcionCategoria
*/

class CategoriaAPI
{
    function getCategorias()
    {
        $categoria = new categoria();
        $arrCategorias = array();
        $arrCategorias["Datos"] = array();
        $res = $categoria->getAllCategorias();
        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "Categoria_id" => $row['Categoria_id'],
                    "nombreCategoria" => $row['nombreCategoria'],
                    "colorCategoria" => $row['colorCategoria'],
                    "descripcionCategoria" => $row['descripcionCategoria']
                   
                );
                array_push($arrCategorias["Datos"], $obj);
            }
            echo json_encode($arrCategorias["Datos"]);
        } else {
            header("Location:../index.php");
            exit();
        }
    }

        function getCategoria($Categoria_id)
    {
        $categoria = new categoria();
        $arrCategorias = array();
        $arrCategorias["Datos"] = array();
        $res = $categoria->getCategoria($Categoria_id);
        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "Categoria_id" => $row['Categoria_id'],
                    "nombreCategoria" => $row['nombreCategoria'],
                    "colorCategoria" => $row['colorCategoria'],
                    "descripcionCategoria" => $row['descripcionCategoria']
                   
                );
                array_push($arrCategorias["Datos"], $obj);
            }
            echo json_encode($arrCategorias["Datos"]);
        } else {
            header("Location:../index.php");
            exit();
        }
    }


     function getCategoriasProducto($Producto_id)
    {
        $categoria = new categoria();
        $arrCategorias = array();
        $arrCategorias["Datos"] = array();
        $res = $categoria->getAllCategoriasProducto($Producto_id);
        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $obj = array(
                    "CategoriaProducto_id" => $row['CategoriaProducto_id'],
                    "Producto_id" => $row['Producto_id'],
                    "Categoria_id" => $row['Categoria_id'],
                    "nombreCategoria" => $row['nombreCategoria'],
                    "colorCategoria" => $row['colorCategoria'],
                    "descripcionCategoria" => $row['descripcionCategoria']
                   
                );
                array_push($arrCategorias["Datos"], $obj);
            }
            echo json_encode($arrCategorias["Datos"]);
        } else {
            header("Location:../index.php");
            exit();
        }
    }

    function insertarCategoria($Usuario_id, $nombreCategoria, $colorCategoria, $descripcionCategoria)
    {
        $categoria = new categoria();
        $categoria->insertarCategoria($Usuario_id, $nombreCategoria, $colorCategoria, $descripcionCategoria);
    }

    function insertarCategoriaEnProducto($Categoria_id, $Producto_id)
    {
        $categoria = new categoria();
        $categoria->insertarCategoriaEnProducto($Categoria_id, $Producto_id);
    }

    function actualizarCategoria($Categoria_id,$Usuario_id, $nombreCategoria, $colorCategoria, $descripcionCategoria)
    {
        $categoria = new categoria();
        $categoria->actualizarCategoria($Categoria_id,$Usuario_id, $nombreCategoria, $colorCategoria, $descripcionCategoria);
    }
 
    function eliminarCategoria($Categoria_id)
    {
        $categoria = new categoria();
        $categoria->eliminarCategoria($Categoria_id);
    }

      function eliminarCategoriaProducto($CategoriaProducto_id)
    {
        $categoria = new categoria();
        $categoria->eliminarCategoriaProducto($CategoriaProducto_id);
    }


}

//AJAX
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) {
        case "insertarCategoria":
            session_start();
            $id = $_SESSION['id'];
            $var = new CategoriaAPI();
            $var->insertarCategoria($id,$_POST['nombreCategoria'],$_POST['colorCategoria'],$_POST['descripcionCategoria']);
            break;
        case "actualizarCategoria":
            session_start();
            $id = $_SESSION['id'];
            $var = new CategoriaAPI();
            $var->actualizarCategoria($_POST['Categoria_id'],$id,$_POST['nombreCategoria'],$_POST['colorCategoria'],$_POST['descripcionCategoria']);
            break;
        case "eliminarCategoria":
            $var = new CategoriaAPI();
            $var->eliminarCategoria($_POST['Categoria_id']);
            break;
        case "getCategorias":
            $var = new CategoriaAPI();
            $var->getCategorias();
            break;
        case "getCategoria":
            $var = new CategoriaAPI();
            $var->getCategoria($_POST['Categoria_id']);
            break;
        case "getCategoriasProducto":
            $var = new CategoriaAPI();
            $var->getCategoriasProducto($_POST['Producto_id']);
            break;
        case "asignarCategoriaProducto":
            $var = new CategoriaAPI();
            $var->insertarCategoriaEnProducto($_POST['Categoria_id'],$_POST['Producto_id']);
            break;
        case "quitarCategoriaProducto":
            $var = new CategoriaAPI();
            $var->eliminarCategoriaProducto($_POST['CategoriaProducto_id']);
            break;
            
    }
}

