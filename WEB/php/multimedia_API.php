<?php
include_once 'multimedia_Queries.php';



/*
Usuario_id, nombremultimedia, colormultimedia, descripcionmultimedia
*/

class MultimediaAPI
{
    function getMultimediaProductoImagen($Producto_id)
    {
        $multimedia = new multimedia();
        $arrMultimedias = array();
        $arrMultimedias["Datos"] = array();
        $res = $multimedia->getAllMultimediaProductoImagen($Producto_id);
        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "ProductoMultimedia_id" => $row['ProductoMultimedia_id'],
                    "Producto_id" => $row['Producto_id'],
                    "Multimedia" => base64_encode(($row['Multimedia'])),
                    "esVideo" => $row['esVideo']
                );
                array_push($arrMultimedias["Datos"], $obj);
            }
            echo json_encode($arrMultimedias["Datos"]);
        } else {
            header("Location:../index.php");
            exit();
        }
    }

    function getMultimediaProductoVideo($Producto_id)
    {
        $multimedia = new multimedia();
        $arrMultimedias = array();
        $arrMultimedias["Datos"] = array();
        $res = $multimedia->getAllMultimediaProductoVideo($Producto_id);
        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "ProductoMultimedia_id" => $row['ProductoMultimedia_id'],
                    "Producto_id" => $row['Producto_id'],
                    "Multimedia" => base64_encode(($row['Multimedia'])),
                    "esVideo" => $row['esVideo']
                );
                array_push($arrMultimedias["Datos"], $obj);
            }
            echo json_encode($arrMultimedias["Datos"]);
        } else {
            header("Location:../index.php");
            exit();
        }
    }

    function insertarMultimedia($Producto_id, $Multimedia, $esVideo)
    {
        $multimedia = new multimedia();
        $multimedia->insertarMultimedia($Producto_id, $Multimedia, $esVideo);
    }
    function actualizarMultimedia($ProductoMultimedia_id,$Producto_id, $Multimedia, $esVideo)
    {
        $multimedia = new multimedia();
        $multimedia->actualizarMultimedia($ProductoMultimedia_id,$Producto_id, $Multimedia, $esVideo);
    }
    function eliminarMultimedia($ProductoMultimedia_id)
    {
        $multimedia = new multimedia();
        $multimedia->eliminarMultimedia($ProductoMultimedia_id);
    }
}

//AJAX
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) {
        case "insertarMultimedia":
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var = new MultimediaAPI();
            $var->insertarMultimedia($_POST['Producto_id'],$binariosImagen,$_POST['esVideo']);
            break;
        case "actualizarMultimedia":
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var = new MultimediaAPI();
            $var->actualizarMultimedia($_POST['ProductoMultimedia_id'],$_POST['Producto_id'],$binariosImagen,$_POST['esVideo']);
            break;
        case "eliminarMultimedia":
            $var = new MultimediaAPI();
            $var->eliminarMultimedia($_POST['ProductoMultimedia_id']);
            break;
        case "getMultimediaProductoImagen":
            $var = new MultimediaAPI();
            $var->getMultimediaProductoImagen($_POST['Producto_id']);
            break;
        case "getMultimediaProductoVideo":
            $var = new MultimediaAPI();
            $var->getMultimediaProductoVideo($_POST['Producto_id']);
            break;
            
    }
}

