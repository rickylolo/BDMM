USE BDMM_PROYECTO;

/*--------------------------------------------------------------------------------USUARIOS--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS vUserLoginID;

CREATE VIEW vUserLoginID AS
SELECT Usuario_id AS ID, nickUsuario AS usuario, userPassword AS pass, rolUsuario AS rol
FROM Usuario;


DROP VIEW IF EXISTS vUserData;

CREATE VIEW vUserData AS
SELECT 	Usuario_id AS ID,correo AS email,nickUsuario AS username,rolUsuario AS userRol,fotoPerfil AS PFP,CONCAT(nombreUsuario,' ',apellidoPaterno,' ',apellidoMaterno) AS nombreCompleto,apellidoPaterno,apellidoMaterno,nombreUsuario,fechaNacimiento AS fecha,sexo,esPrivado 
FROM Usuario;
 

/*--------------------------------------------------------------------------------METODOS DE PAGO--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS vMetodoPago;

CREATE VIEW vMetodoPago AS
SELECT  MetodoPago_id, tipoMetodo, nombreMetodo, imagenMetodo
FROM MetodoPago;


DROP VIEW IF EXISTS vUserMetodo;

CREATE VIEW vUserMetodo AS
SELECT Usuario.Usuario_id, MetodoPago.MetodoPago_id, datosPago,tipoMetodo,nombreMetodo,imagenMetodo FROM MetodoUsuario
INNER JOIN Usuario ON MetodoUsuario.Usuario_id = Usuario.Usuario_id
INNER JOIN MetodoPago ON MetodoPago.MetodoPago_id = Usuario.Usuario_id;


/*--------------------------------------------------------------------------------PEDIDO--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS vPedido;

CREATE VIEW vPedido AS
SELECT Pedido.Pedido_id,Pedido.Lista_id,Pedido.MetodoPago_id,Pedido.Usuario_id,estadoPedido,fechaPedido,fechaEntrega,MontoTotal,nombreLista,descripcion,imagenLista,tipoMetodo,nombreMetodo,imagenMetodo,correo,nickUsuario,nombreUsuario,apellidoMaterno,apellidoPaterno FROM Pedido
INNER JOIN Lista ON Lista.Lista_id = Pedido.Lista_id
INNER JOIN MetodoPago ON MetodoPago.MetodoPago_id = Pedido.MetodoPago_id
INNER JOIN Usuario ON Usuario.Usuario_id = Pedido.Usuario_id;

DROP VIEW IF EXISTS vPedidoProductosLista;

CREATE VIEW vPedidoProductosLista AS
SELECT CantidadComprada,PrecioFinal,nombreProducto,descripcionProducto,esCotizado,Precio FROM Pedido
INNER JOIN Lista ON Lista.Lista_id = Pedido.Lista_id
INNER JOIN ListaProducto ON Lista.Lista_id = ListaProducto.Lista_id
INNER JOIN Producto ON ListaProducto.Producto_id = Producto.Producto_id;
# PENDIENTE DE LA IMAGEN DEL PRODUCTO


/*--------------------------------------------------------------------------------PRODUCTO--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS vProducto;

CREATE VIEW vProducto AS
SELECT A.Producto_id, Usuario_id, nombreProducto, descripcionProducto, esCotizado, Precio, cantidadDisponible, Multimedia,esVideo FROM Producto A
LEFT JOIN ProductoMultimedia B
ON A.Producto_id = B.Producto_id
WHERE esAprobado = 1 
GROUP BY A.Producto_id;

DROP VIEW IF EXISTS vProductoNoAprobado;

CREATE VIEW vProductoNoAprobado AS
SELECT A.Producto_id, Usuario_id, nombreProducto, descripcionProducto, esCotizado, Precio, cantidadDisponible, Multimedia,esVideo FROM Producto A
LEFT JOIN ProductoMultimedia B
ON A.Producto_id = B.Producto_id
WHERE esAprobado = 0 
GROUP BY A.Producto_id;


/*--------------------------------------------------------------------------------CATEGORIA--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS vCategoria;

CREATE VIEW vCategoria AS
SELECT Categoria_id, nombreCategoria, colorCategoria, descripcionCategoria FROM Categoria;

DROP VIEW IF EXISTS vCategoriaProducto;

CREATE VIEW vCategoriaProducto AS
SELECT A.Categoria_id, Usuario_id, nombreCategoria, colorCategoria, descripcionCategoria, CategoriaProducto_id, Producto_id FROM Categoria A
INNER JOIN CategoriaProducto B ON A.Categoria_id = B.Categoria_id;

/*--------------------------------------------------------------------------------MULTIMEDIA--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS vMultimedia;

CREATE VIEW vMultimedia AS
SELECT ProductoMultimedia_id, A.Producto_id, Multimedia, esVideo FROM ProductoMultimedia A
INNER JOIN Producto B ON A.Producto_id = B.Producto_id;

/*--------------------------------------------------------------------------------LISTA--------------------------------------------------------------------------*/
DROP VIEW IF EXISTS vLista;

CREATE VIEW vLista AS
SELECT Lista_id, Usuario_id, UsuarioComprador_id, nombreLista, descripcion, imagenLista, esPrivado, esCarrito FROM Lista;




