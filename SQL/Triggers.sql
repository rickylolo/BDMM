USE BDMM_PROYECTO;

DROP TRIGGER IF EXISTS trigger_DeleteProducto
DELIMITER //

CREATE TRIGGER trigger_DeleteProducto
    BEFORE DELETE
    ON Producto FOR EACH ROW
BEGIN
   DELETE FROM ListaProducto
    WHERE ListaProducto.Producto_id = OLD.Producto_id;
   DELETE FROM CategoriaProducto
    WHERE CategoriaProducto.Producto_id = OLD.Producto_id;
   DELETE FROM ProductoMultimedia
    WHERE ProductoMultimedia.Producto_id = OLD.Producto_id;
   DELETE FROM UsuarioValoracion
    WHERE UsuarioValoracion.Producto_id = OLD.Producto_id;
   DELETE FROM ComentarioProducto
    WHERE ComentarioProducto.Producto_id = OLD.Producto_id;
END//    

DELIMITER ;


DROP TRIGGER IF EXISTS trigger_DeleteCategoria
DELIMITER //

CREATE TRIGGER trigger_DeleteCategoria
    BEFORE DELETE
    ON Categoria FOR EACH ROW
BEGIN
   DELETE FROM CategoriaProducto
    WHERE CategoriaProducto.Categoria_id= OLD.Categoria_id;

END//    

DELIMITER ;