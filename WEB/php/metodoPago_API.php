<?php
include_once 'metodoPago_Queries.php';





class MetodoPagoAPI
{

    function getMetodoPago()
    {
        $metodo = new MetodoPago();
        $arrMetodos = array();
        $arrMetodos["Datos"] = array();
        $res = $metodo->getAllMetodoPago();
        if ($res) { // Entra si hay información
            session_start();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "MetodoPago_id" => $row['MetodoPago_id'],
                    "tipoMetodo" => $row['tipoMetodo'],
                    "nombreMetodo" => $row['nombreMetodo'],
                    "imagenMetodo" => base64_encode(($row['imagenMetodo']))
                );
                array_push($arrMetodos["Datos"], $obj);
            }
            echo json_encode($arrMetodos["Datos"]);
        } else {
            header("Location:../paginaAdmin.php");
            exit();
        }
    }

    function insertarMetodoPago($Usuario_id,$tipoMetodo ,$nombreMetodo ,$imagenMetodo)
    {
        $metodo = new MetodoPago();
        $metodo->insertarMetodoPago($Usuario_id,$tipoMetodo ,$nombreMetodo ,$imagenMetodo);
    }

    function actualizarMetodoPago($MetodoPago_id,$tipoMetodo ,$nombreMetodo ,$imagenMetodo)
    {
        $metodo = new MetodoPago();
        $metodo->actualizarMetodoPago($MetodoPago_id,$tipoMetodo ,$nombreMetodo ,$imagenMetodo);
    }
 
    function eliminarMetodoPago($MetodoPago_id)
    {
        $metodo = new MetodoPago();
        $metodo->eliminarMetodoPago($MetodoPago_id);
    }


}

//AJAX
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) {
        case "insertarMetodoPago":
            $var = new MetodoPagoAPI();
            $var->insertarMetodoPago($_POST['Usuario_id'],$_POST['tipoMetodo'],$_POST['nombreMetodo'],$_POST['imagenMetodo']);
            break;

        case "actualizarMetodoPago":
            $var = new MetodoPagoAPI();
            $var->actualizarMetodoPago($_POST['MetodoPago_id'],$_POST['tipoMetodo'],$_POST['nombreMetodo'],$_POST['imagenMetodo']);
            break;
        case "deleteMetodoPago":
            $var = new MetodoPagoAPI();
            $var->eliminarMetodoPago($_POST['MetodoPago_id']);
            break;
    }
}

