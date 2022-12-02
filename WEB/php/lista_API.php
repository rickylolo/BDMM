<?php
include_once 'lista_Queries.php';





class ListaAPI
{

    function getListasUser($Usuario_id)
    {
        $lista = new lista();
        $arrListas = array();
        $arrListas["Datos"] = array();
        $res = $lista->getAllListasUser($Usuario_id);
        if ($res) { // Entra si hay información
            session_start();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $obj = array(
                    "Lista_id" => $row['Lista_id'],
                    "Usuario_id" => $row['Usuario_id'],
                    "UsuarioComprador_id" => $row['UsuarioComprador_id'],
                    "nombreLista" => $row['nombreLista'],
                    "descripcion" => $row['descripcion'],
                    "imagenLista" => base64_encode(($row['imagenLista'])),
                    "esPrivado" => $row['esPrivado'],
                    "esCarrito" => $row['esCarrito']
                  
                );
                array_push($arrListas["Datos"], $obj);
            }
            echo json_encode($arrListas["Datos"]);
        } else {
            header("Location:../paginaAdmin.php");
            exit();
        }
    }

    function insertarLista($Usuario_id,$UsuarioComprador_id,$nombreLista,$descripcion,$imagenLista)
    {
        $lista = new lista();
        $lista->insertarLista($Usuario_id,$UsuarioComprador_id,$nombreLista,$descripcion,$imagenLista);
    }

    function actualizarLista($Lista_id,$UsuarioComprador_id,$nombreLista,$descripcion,$imagenLista)
    {
        $lista = new lista();
        $lista->actualizarLista($Lista_id,$UsuarioComprador_id,$nombreLista,$descripcion,$imagenLista);
    }
 
    function eliminarLista($Lista_id)
    {
        $lista = new lista();
        $lista->eliminarLista($Lista_id);
    }


}

//AJAX
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) {
        case "insertarLista":
            session_start();
            $id = $_SESSION['id'];
            $var = new ListaAPI();
             $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var->insertarLista($id,$_POST['UsuarioComprador_id'],$_POST['nombreLista'],$_POST['descripcion'],$binariosImagen);
            break;
        case "actualizarLista":
            session_start();
            $id = $_SESSION['id'];
            $var = new ListaAPI();
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            $var->actualizarLista($_POST['Lista_id'],$_POST['UsuarioComprador_id'],$_POST['nombreLista'],$_POST['descripcion'],$binariosImagen);
            break;
        case "deleteLista":
            $var = new ListaAPI();
            $var->eliminarLista($_POST['Lista_id']);
            break;
        case "getListasUsuario":
            session_start();
            $id = $_SESSION['id'];
            $var = new ListaAPI();
            $var->getListasUser($id);
            break;
    }
}

