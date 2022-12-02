
<?php
include_once 'db.php';

class lista extends DB
{
    // ---------------------------------------CONSULTA DE INFORMACION------------------------------------------
     // QUERY Get Datos Todos los listas
    function getAllListasUser($Usuario_id)
    {
        $get = "CALL sp_GestionLista('G', #Operacion
        NULL,
        $Usuario_id,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
        );";
        $query = $this->connect()->query($get);
        return $query;
    }


    // ---------------------------------------INSERTAR INFORMACION------------------------------------------
    // QUERY Insertar lista

    function insertarLista($Usuario_id ,$UsuarioComprador_id,$nombreLista,$descripcion,$imagenLista)
    {
        $insert = "CALL sp_GestionLista('I', 
        NULL,
        $Usuario_id,
        $UsuarioComprador_id,
        '$nombreLista',
        '$descripcion',
        '$imagenLista',
        NULL,
        NULL
        );";
        $query = $this->connect()->query($insert);
        return $query;
    } 

   // ---------------------------------------ACTUALIZAR INFORMACION------------------------------------------
   // QUERY Actualizar lista
    function actualizarLista($Lista_id,$UsuarioComprador_id,$nombreLista,$descripcion,$imagenLista)
    {
        $update =  "CALL sp_GestionLista('E', 
        $Lista_id,
        NULL,
        $UsuarioComprador_id,
        '$nombreLista',
        '$descripcion',
        '$imagenLista',
        NULL,
        NULL
        );";
        $query = $this->connect()->query($update);
        return $query;
    }
     // ---------------------------------------ELIMINAR INFORMACION------------------------------------------
    // QUERY Eliminar lista
    function eliminarLista($Lista_id)
    {
        $delete = "CALL sp_GestionLista('D', 
        $Lista_id,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
        );";
        $query = $this->connect()->query($delete);
        return $query;
    }
}

?>
