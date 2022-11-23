
<?php
include_once 'db.php';

class categoria extends DB
{
    // ---------------------------------------CONSULTA DE INFORMACION------------------------------------------
     // QUERY Get Datos de todos los categorias
    function getAllCategorias()
    {
        $get = "CALL sp_GestionCategoria('A', 
        NULL,
        NULL,
        NULL,
        NULL,
        NULL)";
        $query = $this->connect()->query($get);
        return $query;
    }


    // ---------------------------------------INSERTAR INFORMACION------------------------------------------
    // QUERY Insertar Categoria

    function insertarCategoria($Usuario_id, $nombreCategoria, $colorCategoria, $descripcionCategoria)
    {
        $insert = "CALL sp_GestionCategoria('I', 
        NULL,
        $Usuario_id,
        '$nombreCategoria',
        '$colorCategoria',
        '$descripcionCategoria')";
        $query = $this->connect()->query($insert);
        return $query;
    } 

   // ---------------------------------------ACTUALIZAR INFORMACION------------------------------------------
   // QUERY Actualizar Categoria
    function actualizarCategoria($Categoria_id,$Usuario_id, $nombreCategoria, $colorCategoria, $descripcionCategoria)
    {
        $update =  "CALL sp_GestionCategoria('E', 
        $Categoria_id,
        $Usuario_id,
        '$nombreCategoria',
        '$colorCategoria',
        '$descripcionCategoria')";
        $query = $this->connect()->query($update);
        return $query;
    }
     // ---------------------------------------ELIMINAR INFORMACION------------------------------------------
    // QUERY Eliminar categoria
    function eliminarCategoria($Categoria_id)
    {
        $delete = "CALL sp_GestionCategoria('D', 
        $Categoria_id,
        NULL,
        NULL,
        NULL,
        NULL)";
        $query = $this->connect()->query($delete);
        return $query;
    }
}

?>
