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
            session_start();
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

    function insertarCategoria($Usuario_id, $nombreCategoria, $colorCategoria, $descripcionCategoria)
    {
        $categoria = new categoria();
        $categoria->insertarCategoria($Usuario_id, $nombreCategoria, $colorCategoria, $descripcionCategoria);
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
    }
}

