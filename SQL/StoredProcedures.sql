USE BDMM_PROYECTO;
/*--------------------------------------------------------------------------------USUARIOS--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionUsuario;
DELIMITER //
CREATE PROCEDURE sp_GestionUsuario
(
Operacion CHAR(1),
sp_Usuario_id INT,
sp_correo VARCHAR(40),
sp_nickUsuario VARCHAR(30),
sp_userPassword VARCHAR(30),
sp_rolUsuario TINYINT,
sp_fotoPerfil MEDIUMBLOB,
sp_nombreUsuario VARCHAR(30),
sp_apellidoPaterno  VARCHAR(30),
sp_apellidoMaterno  VARCHAR(30),
sp_fechaNacimiento VARCHAR(30),
sp_sexo VARCHAR(10),
sp_esPrivado BIT
)

BEGIN
   IF Operacion = 'I' /*INSERT USUARIO*/
   THEN  
		INSERT INTO Usuario(correo ,nickUsuario ,userPassword ,rolUsuario ,fotoPerfil ,nombreUsuario ,apellidoMaterno ,apellidoPaterno ,fechaNacimiento ,sexo,fechaRegistro) 
			VALUES (sp_correo,sp_nickUsuario,sp_userPassword,sp_rolUsuario,sp_fotoPerfil,sp_nombreUsuario,sp_apellidoMaterno,sp_apellidoPaterno,sp_fechaNacimiento,sp_sexo,now());
   END IF;
	IF Operacion = 'E'  /*EDIT USUARIO*/
    THEN 
    	SET sp_correo=IF(sp_correo='',NULL,sp_correo),
			sp_nickUsuario=IF(sp_nickUsuario='',NULL,sp_nickUsuario),
			sp_userPassword=IF(sp_userPassword='',NULL,sp_userPassword),
			sp_rolUsuario=IF(sp_rolUsuario='',NULL,sp_rolUsuario),
            sp_fotoPerfil=IF(sp_fotoPerfil='',NULL,sp_fotoPerfil),
			sp_nombreUsuario=IF(sp_nombreUsuario='',NULL,sp_nombreUsuario),
			sp_apellidoMaterno=IF(sp_apellidoMaterno='',NULL,sp_apellidoMaterno),
            sp_apellidoPaterno=IF(sp_apellidoPaterno='',NULL,sp_apellidoPaterno),
            sp_fechaNacimiento=IF(sp_fechaNacimiento='',NULL,sp_fechaNacimiento);
		UPDATE Usuario 
			SET correo = IFNULL(sp_correo,correo), 
			nickUsuario=  IFNULL(sp_nickUsuario,nickUsuario), 
			userPassword= IFNULL(sp_userPassword,userPassword), 
			rolUsuario= IFNULL(sp_rolUsuario,rolUsuario), 
			fotoPerfil= IFNULL(sp_fotoPerfil,fotoPerfil), 
			nombreUsuario= IFNULL(sp_nombreUsuario,nombreUsuario), 
			apellidoMaterno= IFNULL(sp_apellidoMaterno,apellidoMaterno),
            apellidoPaterno= IFNULL(sp_apellidoPaterno,apellidoPaterno),
            fechaNacimiento= IFNULL(sp_fechaNacimiento,fechaNacimiento)
     
		WHERE Usuario_id=sp_Usuario_id;
   END IF;
    IF Operacion = 'D' THEN /*DELETE USUARIO*/
          DELETE FROM Usuario WHERE  Usuario_id = sp_Usuario_id;
   END IF;
      IF Operacion = 'P' THEN /*UPDATE PRIVACIDAD*/
          UPDATE Usuario SET esPrivado = sp_esPrivado WHERE Usuario_id = sp_Usuario_id;
   END IF;
    IF Operacion = 'L' THEN /*LOG IN USUARIO*/
		SELECT ID,rol 
        FROM vUserLoginID 
        WHERE 1=1 
			AND usuario = sp_nickUsuario
            AND pass = sp_userPassword;
   END IF;
      IF Operacion = 'A' THEN /*GET DATOS ALL USUARIOS*/
		SELECT ID,email,username,userRol,PFP,nombreCompleto,fecha,sexo,fecha,sexo,esPrivado 
		FROM vUserData;
   END IF;
     IF Operacion = 'G' THEN /*GET DATOS USUARIO*/
	SELECT ID, email, username, userRol, PFP, nombreCompleto, apellidoPaterno, apellidoMaterno, nombreUsuario, fecha, sexo, esPrivado
		FROM vUserData WHERE ID = sp_Usuario_id;
   END IF;
END //

/*--------------------------------------------------------------------------------METODOS DE PAGO--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionMetodoDePago;
DELIMITER //
CREATE PROCEDURE sp_GestionMetodoDePago
(
Operacion CHAR(1),
sp_MetodoPago_id INT,
sp_Usuario_id_Registro INT,
sp_Usuario_id INT,
sp_tipoMetodo VARCHAR(30),
sp_nombreMetodo VARCHAR(30),
sp_datosPago VARCHAR(30),
sp_imagenMetodo MEDIUMBLOB
)

BEGIN
   IF Operacion = 'I' /*INSERT METODO DE PAGO*/
   THEN  
		INSERT INTO MetodoPago(Usuario_id_Registro,tipoMetodo ,nombreMetodo ,imagenMetodo) 
			VALUES (sp_Usuario_id_Registro,sp_tipoMetodo,sp_nombreMetodo,sp_imagenMetodo);
   END IF;
      IF Operacion = 'U' /*INSERT METODO DE PAGO DE USUARIO*/
   THEN  
		INSERT INTO MetodoUsuario(Usuario_id ,MetodoPago_id ,datosPago) 
			VALUES (sp_Usuario_id,sp_MetodoPago_id,sp_datosPago);
   END IF;
   IF Operacion = 'E'  /*EDIT METODO DE PAGO*/
    THEN 
    	SET sp_tipoMetodo=IF(sp_tipoMetodo='',NULL,sp_tipoMetodo),
			sp_nombreMetodo=IF(sp_nombreMetodo='',NULL,sp_nombreMetodo),
            sp_imagenMetodo=IF(sp_imagenMetodo='',NULL,sp_imagenMetodo);
		UPDATE MetodoPago 
			SET tipoMetodo = IFNULL(sp_tipoMetodo,tipoMetodo), 
			nombreMetodo=  IFNULL(sp_nombreMetodo,nombreMetodo), 
			imagenMetodo= IFNULL(sp_imagenMetodo,imagenMetodo)
		WHERE MetodoPago_id=sp_MetodoPago_id;
   END IF;
   
   IF Operacion = 'D' THEN /*DELETE METODO DE PAGO*/
          DELETE FROM MetodoPago WHERE  MetodoPago_id=sp_MetodoPago_id;
   END IF;
  
   IF Operacion = 'G' THEN /*GET DATOS METODOS DE PAGO*/
		SELECT MetodoPago_id,tipoMetodo,nombreMetodo,imagenMetodo
		FROM vMetodoPago; 
   END IF;
   IF Operacion = 'M' THEN /*GET DATOS METODOS DE PAGO DE USUARIO*/
		SELECT Usuario_id,MetodoPago_id,datosPago,tipoMetodo,nombreMetodo,imagenMetodo
		FROM vUserMetodo; 
   END IF;
END //


/*--------------------------------------------------------------------------------PEDIDO--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionPedido;
DELIMITER //
CREATE PROCEDURE sp_GestionPedido
(
Operacion CHAR(1),
sp_Pedido_id INT,
sp_Lista_id INT,
sp_MetodoPago_id INT,
sp_Usuario_id INT,
sp_estadoPedido VARCHAR(30),
sp_fechaEntrega DATE
)
BEGIN
   IF Operacion = 'I' /*INSERT PEDIDO*/
   THEN  
		INSERT INTO Pedido(Lista_id ,MetodoPago_id,Usuario_id,estadoPedido) 
			VALUES (sp_Lista_id,sp_MetodoPago_id,sp_Usuario_id,sp_estadoPedido);
            #AFTER INSERT PEDIDO CREATE TRIGGER SUM COSTO ELEMENTOS LISTA
   END IF;
   IF Operacion = 'E'  /*EDIT PEDIDO*/
    THEN 
    	SET sp_Lista_id=IF(sp_Lista_id='',NULL,sp_Lista_id),
			sp_MetodoPago_id=IF(sp_MetodoPago_id='',NULL,sp_MetodoPago_id),
            sp_estadoPedido=IF(sp_estadoPedido='',NULL,sp_estadoPedido),
            sp_fechaEntrega=IF(sp_fechaEntrega='',NULL,sp_fechaEntrega),
            sp_Usuario_id=IF(sp_Usuario_id='',NULL,sp_Usuario_id);
		UPDATE Pedido 
			SET Lista_id = IFNULL(sp_Lista_id,Lista_id), 
			MetodoPago_id=  IFNULL(sp_MetodoPago_id,MetodoPago_id), 
			fechaEntrega=  IFNULL(sp_fechaEntrega,fechaEntrega), 
			Usuario_id=  IFNULL(sp_Usuario_id,Usuario_id), 
			estadoPedido= IFNULL(sp_estadoPedido,estadoPedido)
		WHERE Pedido_id=sp_Pedido_id;
   END IF;
   
   IF Operacion = 'D' THEN /*DELETE PEDIDO*/
          DELETE FROM Pedido WHERE  Pedido_id=sp_Pedido_id;
   END IF;
  
   IF Operacion = 'G' THEN /*GET DATOS PEDIDO*/
		SELECT Pedido_id,Lista_id,MetodoPago_id,Usuario_id,estadoPedido,fechaPedido,fechaEntrega,MontoTotal,nombreLista,descripcion,imagenLista,tipoMetodo,nombreMetodo,imagenMetodo,correo,nickUsuario,nombreUsuario,apellidoMaterno,apellidoPaterno
		FROM vPedido; 
   END IF;
   
   IF Operacion = 'U' THEN /*GET DATOS PEDIDO DE USUARIO*/
		SELECT Pedido_id,Lista_id,MetodoPago_id,Usuario_id,estadoPedido,fechaPedido,fechaEntrega,MontoTotal,nombreLista,descripcion,imagenLista,tipoMetodo,nombreMetodo,imagenMetodo,correo,nickUsuario,nombreUsuario,apellidoMaterno,apellidoPaterno
		FROM vPedido
        WHERE Usuario_id = sp_Usuario_id; 
   END IF;
   IF Operacion = 'M' THEN /*GET DATOS PRODUCTOS DE LA LISTA DEL PEDIDO*/
		SELECT CantidadComprada,PrecioFinal,nombreProducto,descripcionProducto,esCotizado,Precio
		FROM vPedidoProductosLista; 
   END IF;
END //


/*--------------------------------------------------------------------------------PRODUCTO--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionProducto;
DELIMITER //
CREATE PROCEDURE sp_GestionProducto
(
Operacion CHAR(1),
sp_Producto_id INT(6),
sp_Usuario_id INT(6),
sp_nombreProducto VARCHAR(30),
sp_descripcionProducto VARCHAR(30),
sp_esCotizado BIT,
sp_Precio DECIMAL(9,2),
sp_cantidadDisponible INT(6)
)
BEGIN
   DECLARE u_id INT; 
   IF Operacion = 'I' /*INSERT PRODUCTO*/
   THEN  
		INSERT INTO Producto(Usuario_id ,nombreProducto,descripcionProducto,esCotizado,Precio,cantidadDisponible) 
			VALUES (sp_Usuario_id,sp_nombreProducto,sp_descripcionProducto,sp_esCotizado,sp_Precio,sp_cantidadDisponible);
		SET u_id = last_insert_id();
        SELECT Producto_id, Usuario_id, nombreProducto, descripcionProducto, esCotizado, Precio, cantidadDisponible
		FROM vProducto WHERE Producto_id = u_id;

   END IF;
   IF Operacion = 'E'  /*EDIT PRODUCTO*/
    THEN 
    	SET sp_Usuario_id=IF(sp_Usuario_id='',NULL,sp_Usuario_id),
			sp_nombreProducto=IF(sp_nombreProducto='',NULL,sp_nombreProducto),
            sp_descripcionProducto=IF(sp_descripcionProducto='',NULL,sp_descripcionProducto),
            sp_esCotizado=IF(sp_esCotizado='',NULL,sp_esCotizado),
            sp_Precio=IF(sp_Precio='',NULL,sp_Precio),
            sp_cantidadDisponible=IF(sp_cantidadDisponible='',NULL,sp_cantidadDisponible);
		UPDATE Producto 
			SET Usuario_id = IFNULL(sp_Usuario_id,Usuario_id), 
			nombreProducto=  IFNULL(sp_nombreProducto,nombreProducto), 
            descripcionProducto=  IFNULL(sp_descripcionProducto,descripcionProducto), 
			esCotizado=  IFNULL(sp_esCotizado,esCotizado), 
			Precio=  IFNULL(sp_Precio,Precio), 
			cantidadDisponible= IFNULL(sp_cantidadDisponible,cantidadDisponible)
		WHERE Producto_id=sp_Producto_id;
   END IF;
   
   IF Operacion = 'D' THEN /*DELETE PRODUCTO*/
          DELETE FROM Producto WHERE  Producto_id=sp_Producto_id;
   END IF;
  
   IF Operacion = 'A' THEN /*GET DATOS PRODUCTOS*/
		SELECT Producto_id, Usuario_id, nombreProducto, descripcionProducto, esCotizado, Precio, cantidadDisponible
		FROM vProducto; 
   END IF;

END //

/*--------------------------------------------------------------------------------CATEGORIA--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionCategoria;
SELECT * FROM Categoria;
DELIMITER //
CREATE PROCEDURE sp_GestionCategoria
(
Operacion CHAR(1),
sp_Categoria_id INT,
sp_Usuario_id INT,
sp_nombreCategoria VARCHAR(30),
sp_colorCategoria VARCHAR(10),
sp_descripcionCategoria VARCHAR(30) 
)
BEGIN
   IF Operacion = 'I' /*INSERT CATEGORIA*/
   THEN  
		INSERT INTO Categoria(Usuario_id, nombreCategoria, colorCategoria, descripcionCategoria) 
			VALUES (sp_Usuario_id, sp_nombreCategoria, sp_colorCategoria, sp_descripcionCategoria);

   END IF;
   IF Operacion = 'E'  /*EDIT CATEGORIA*/
    THEN 
    	SET sp_Usuario_id=IF(sp_Usuario_id='',NULL,sp_Usuario_id),
			sp_nombreCategoria=IF(sp_nombreCategoria='',NULL,sp_nombreCategoria),
            sp_colorCategoria=IF(sp_colorCategoria='',NULL,sp_colorCategoria),
            sp_descripcionCategoria=IF(sp_descripcionCategoria='',NULL,sp_descripcionCategoria);
		UPDATE Categoria 
			SET Usuario_id = IFNULL(sp_Usuario_id,Usuario_id), 
			nombreCategoria=  IFNULL(sp_nombreCategoria,nombreCategoria), 
			colorCategoria=  IFNULL(sp_colorCategoria,colorCategoria), 
			descripcionCategoria=  IFNULL(sp_descripcionCategoria,descripcionCategoria)
		WHERE Categoria_id=sp_Categoria_id;
   END IF;
   
   IF Operacion = 'D' THEN /*DELETE CATEGORIA*/
          DELETE FROM Categoria WHERE  Categoria_id=sp_Categoria_id;
   END IF;
  
   IF Operacion = 'G' THEN /*GET DATOS CATEGORIA*/
		SELECT Categoria_id, nombreCategoria, colorCategoria, descripcionCategoria
		FROM vCategoria; 
   END IF;

END //