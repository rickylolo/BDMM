USE BDMM_PROYECTO;

DROP FUNCTION IF EXISTS contarImagenes;
DELIMITER //
CREATE FUNCTION contarImagenes (idProducto INT )
RETURNS INT

BEGIN
   DECLARE miCantidad INT;
   SELECT @cantidadImagenes := COUNT(Multimedia)  FROM ProductoMultimedia WHERE Producto_id = 1 AND esVideo = 0;
   SET miCantidad = @cantidadImagenes;
   RETURN miCantidad;
END; //
DELIMITER ;

DROP FUNCTION IF EXISTS contarVideos;
DELIMITER //
CREATE FUNCTION contarVideos (idProducto INT )
RETURNS INT

BEGIN

   DECLARE cantidadVideos INT;
   SET cantidadVideos = (SELECT COUNT(Multimedia) FROM ProductoMultimedia WHERE Producto_id = idProducto AND esVideo = 1);

   RETURN cantidadVideos;
END; //

DELIMITER ;