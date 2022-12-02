DROP DATABASE BDMM_PROYECTO;
CREATE DATABASE BDMM_PROYECTO;








USE BDMM_PROYECTO;

-- 												TABLA DE USUARIOS										 --
DROP TABLE IF EXISTS Usuario;
CREATE TABLE Usuario(
	Usuario_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria Tabla Usuario',
	correo VARCHAR(40) NOT NULL  COMMENT'Correo electrónico del usuario',
	nickUsuario VARCHAR(30) NOT NULL COMMENT'Nombre de usuario',
	userPassword VARCHAR(30) NOT NULL COMMENT'Contraseña del usuario',
	rolUsuario TINYINT NOT NULL COMMENT'No. que identifica el rol del usuario 1:SuperAdmin, 2:Admin, 3:Vendedor, 4:Comprador',
	fotoPerfil MEDIUMBLOB COMMENT'Foto de perfil tipo avatar',
	nombreUsuario VARCHAR(30) NOT NULL COMMENT'Nombre completo del usuario',
	apellidoMaterno VARCHAR(30) NOT NULL COMMENT'Apellido materno del usuario',
	apellidoPaterno VARCHAR(30) NOT NULL COMMENT'Apellido paterno del usuario',
	fechaNacimiento DATE NOT NULL COMMENT'Fecha de nacimiento del usuario',
	sexo VARCHAR(10) NOT NULL COMMENT'Género del usuario',
	fechaRegistro DATETIME NOT NULL COMMENT'Fecha en la que se dio de alta el usuario',
	esPrivado BIT DEFAULT 1 COMMENT'Bandera que indica la privacidad del perfil',
 CONSTRAINT PK_Usuario
	PRIMARY KEY (Usuario_id)
);


-- 												TABLA DE METODOS DE PAGO --
DROP TABLE IF EXISTS MetodoPago;
CREATE TABLE MetodoPago(
	MetodoPago_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de los Metodos de pago',
    Usuario_id_Registro INT NOT NULL COMMENT'Clave Foránea del usuario que registro el metodo',
    tipoMetodo VARCHAR(30) NOT NULL COMMENT'Tipo del metodo de pago',
	nombreMetodo  VARCHAR(30) NOT NULL COMMENT'Nombre del metodo de pago',
    imagenMetodo MEDIUMBLOB NOT NULL COMMENT'Imagen del metodo de pago',
 CONSTRAINT PK_MetodoPago
	PRIMARY KEY (MetodoPago_id)
);

-- 												TABLA DE METODO DE PAGO DE LOS USUARIOS								 --
DROP TABLE IF EXISTS MetodoUsuario;
CREATE TABLE MetodoUsuario(
	MetodoUsuario_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de los Metodos de pago del usuario',
    Usuario_id INT NOT NULL COMMENT'Clave Foránea del usuario',
	MetodoPago_id INT(6)  NOT NULL COMMENT'Clave Foránea del método de pago',
    datosPago VARCHAR(30) NOT NULL COMMENT'Datos del método de pago',
 CONSTRAINT PK_MetodoUsuario
	PRIMARY KEY (MetodoUsuario_id),
  CONSTRAINT FK_MetodoUsuario_Usuario
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id),
  CONSTRAINT FK_MetodoUsuario_Metodo
	FOREIGN KEY (MetodoPago_id) REFERENCES MetodoPago(MetodoPago_id)
);


-- 												TABLA DE LISTA										--
DROP TABLE IF EXISTS Lista;
CREATE TABLE Lista(
	Lista_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de las listas',
    Usuario_id  INT NOT NULL COMMENT'Clave Foránea del el cliente que realizo la lista',
    UsuarioComprador_id  INT NOT NULL COMMENT'Clave Foránea del cliente que pago la lista',
    nombreLista VARCHAR(30) NOT NULL COMMENT'Nombre de la lista',
	descripcion TINYTEXT COMMENT'Breve descripcion de la lista',
    imagenLista BLOB COMMENT'Imagen ilustrativa de la lista',
    esPrivado BIT DEFAULT 1 COMMENT'Bandera que indica la privacidad de la lista 1:Privada 2:Wishlist',
    esCarrito BIT DEFAULT 0 COMMENT'Bandera que indica si la lista es el carrito',
 CONSTRAINT PK_Lista
	PRIMARY KEY (Lista_id),
 CONSTRAINT FK_Usuario_Lista
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id),
 CONSTRAINT FK_UsuarioComprador_Lista
	FOREIGN KEY (UsuarioComprador_id) REFERENCES Usuario(Usuario_id)
); 

-- 												TABLA DE PEDIDOS									--
DROP TABLE IF EXISTS Pedido;
CREATE TABLE Pedido(
	Pedido_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de los pedidos',
    Lista_id  INT NOT NULL COMMENT'Clave Foránea de la lista que engloba el pedido',
    MetodoPago_id  INT NOT NULL COMMENT'Clave Foránea de el metodo de pago del pedido',
	Usuario_id  INT NOT NULL COMMENT'Clave Foránea de el cliente que realizó el pedido',
    estadoPedido VARCHAR(30) NOT NULL COMMENT'Estado del pedido',
	fechaPedido TIMESTAMP NOT NULL COMMENT'Fecha y Hora de pedido',
    fechaEntrega DATE NOT NULL COMMENT'fecha de entrega del pedido',
    MontoTotal DECIMAL(9,2) NOT NULL COMMENT'Monto total del pedido',
    
 CONSTRAINT PK_Pedido
	PRIMARY KEY (Pedido_id),
 CONSTRAINT FK_Pedido_Lista
	FOREIGN KEY (Lista_id) REFERENCES Lista(Lista_id),
 CONSTRAINT FK_Pedido_MetodoPago
	FOREIGN KEY (MetodoPago_id) REFERENCES MetodoPago(MetodoPago_id),
 CONSTRAINT FK_Pedido_Usuario
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id)
);


-- 												TABLA DE PRODUCTOS--
DROP TABLE IF EXISTS Producto;
CREATE TABLE Producto(
	Producto_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de los productos',
    Usuario_id  INT NOT NULL COMMENT'Clave Foránea de el usuario que registro el producto',
    nombreProducto VARCHAR(30) NOT NULL COMMENT'Nombre de el producto',
    descripcionProducto VARCHAR(30) NOT NULL COMMENT'Descripcion del producto',
	esCotizado BIT DEFAULT 0 COMMENT'Bandera que indica si el producto es cotizado',
	Precio DECIMAL(9,2) UNSIGNED COMMENT'Precio final del producto',
    cantidadDisponible INT(6) NOT NULL COMMENT'Cantidad disponible de producto',
    esAprobado BIT DEFAULT 0 COMMENT'Bandera que indica si el producto fue aprobado',
    Usuario_id_aprobado  INT COMMENT'Clave Foránea de el usuario que aprobo el producto',
 CONSTRAINT PK_Producto
	PRIMARY KEY (Producto_id),
 CONSTRAINT FK_Producto_usuario
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id),
 CONSTRAINT FK_Producto_usuario_aprobado
	FOREIGN KEY (Usuario_id_aprobado) REFERENCES Usuario(Usuario_id)
);



-- 												TABLA DE PRODUCTOS DE LA LISTA--
DROP TABLE IF EXISTS ListaProducto;
CREATE TABLE ListaProducto(
	ListaProducto_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de los productos de la lista',
    Producto_id  INT NOT NULL COMMENT'Clave Foránea de el producto',
    Lista_id  INT NOT NULL COMMENT'Clave Foránea de la lista',
    CantidadComprada INT NOT NULL COMMENT'Cantidad de unidades compradas',
	PrecioFinal DECIMAL(9,2) UNSIGNED COMMENT'Precio final del producto',
    
 CONSTRAINT PK_ListaProducto
	PRIMARY KEY (ListaProducto_id),
 CONSTRAINT FK_ListaProducto_Producto
	FOREIGN KEY (Producto_id) REFERENCES Producto(Producto_id),
 CONSTRAINT FK_ListaProducto_Lista
	FOREIGN KEY (Lista_id) REFERENCES Lista(Lista_id)
);

-- 												TABLA DE CATEGORIA--
DROP TABLE IF EXISTS Categoria;
CREATE TABLE Categoria(
	Categoria_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de las categorias',
    Usuario_id  INT NOT NULL COMMENT'Clave Foránea de el usuario que registro la categoria',
    nombreCategoria VARCHAR(30) NOT NULL COMMENT'Nombre de la categoria',
    colorCategoria VARCHAR(10) NOT NULL COMMENT'Codigo de color',
    descripcionCategoria VARCHAR(200) NOT NULL COMMENT'Descripcion de la categoria',
    
 CONSTRAINT PK_Categoria
	PRIMARY KEY (Categoria_id),
 CONSTRAINT FK_Categoria_Usuario
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id)
);


-- 												TABLA DE CATEGORIA DE LOS PRODUCTOS--
DROP TABLE IF EXISTS CategoriaProducto;
CREATE TABLE CategoriaProducto(
	CategoriaProducto_id INT(6) AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de las categorias en los productos',
    Producto_id  INT  NOT NULL COMMENT'Clave Foránea de el producto',
    Categoria_id  INT  NOT NULL COMMENT'Clave Foránea de la categoria',

    
 CONSTRAINT PK_CategoriaProducto
	PRIMARY KEY (CategoriaProducto_id),
 CONSTRAINT FK_CategoriaProducto_Producto
	FOREIGN KEY (Producto_id) REFERENCES Producto(Producto_id),
 CONSTRAINT FK_CategoriaProducto_Categoria
	FOREIGN KEY (Categoria_id) REFERENCES Categoria(Categoria_id)
);


-- 												TABLA DE MULTIMEDIA DE LOS PRODUCTOS--
DROP TABLE IF EXISTS ProductoMultimedia;
CREATE TABLE ProductoMultimedia(
	ProductoMultimedia_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de la multimedia en los productos',
    Producto_id  INT NOT NULL COMMENT'Clave Foránea de el producto',
    Multimedia  LONGBLOB NOT NULL COMMENT'Imagen o video',
	esVideo BIT NOT NULL COMMENT'Bandera que indica si el producto es un video',
    
 CONSTRAINT PK_ProductoMultimedia
	PRIMARY KEY (ProductoMultimedia_id),
 CONSTRAINT FK_ProductoMultimedia_Producto
	FOREIGN KEY (Producto_id) REFERENCES Producto(Producto_id)
);


-- 											TABLA DE VALORACION DE USUARIOS--
DROP TABLE IF EXISTS UsuarioValoracion;
CREATE TABLE UsuarioValoracion(
	UsuarioValoracion_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de la valoracion de los productos',
    Usuario_id  INT NOT NULL COMMENT'Clave Foránea de el usuario',
    Producto_id  INT NOT NULL COMMENT'Clave Foránea de el producto',
	valoracion TINYINT NOT NULL COMMENT'Valor de la valoracion va de 1 a 5 estrellas',
    comentario TINYTEXT COMMENT'Comentario de la valoracion',
    
 CONSTRAINT PK_UsuarioValoracion
	PRIMARY KEY (UsuarioValoracion_id),
 CONSTRAINT FK_UsuarioValoracion_Usuario
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id),
 CONSTRAINT FK_UsuarioValoracion_Producto
	FOREIGN KEY (Producto_id) REFERENCES Producto(Producto_id)
);

-- 								TABLA DE COMENTARIOS DE LOS PRODUCTOS --
DROP TABLE IF EXISTS ComentarioProducto;
CREATE TABLE ComentarioProducto(
	ComentarioProducto_id INT AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria de comentarios de los productos',
    Usuario_id  INT NOT NULL COMMENT'Clave Foránea de el usuario',
    Producto_id  INT NOT NULL COMMENT'Clave Foránea de el producto',
    comentario TINYTEXT COMMENT'Comentario de la valoracion',
    
 CONSTRAINT PK_ComentarioProducto
	PRIMARY KEY (ComentarioProducto_id),
 CONSTRAINT FK_ComentarioProducto_Usuario
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id),
 CONSTRAINT FK_ComentarioProducto_Producto
	FOREIGN KEY (Producto_id) REFERENCES Producto(Producto_id)
);

-- 								TABLA DE COTIZACION --
DROP TABLE IF EXISTS UsuarioCotizacion;
CREATE TABLE UsuarioCotizacion(
	UsuarioCotizacion_id INT(6) AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria la cotizacion de los productos',
    Usuario_id  INT NOT NULL COMMENT'Clave Foránea de el usuario comprador',
    Vendedor_id  INT NOT NULL COMMENT'Clave Foránea de el usuario vendedor',
    ListaProducto_id  INT NOT NULL COMMENT'Clave Foránea de el usuario comprador',
    Comentario TINYTEXT NOT NULL COMMENT'Comentarios de la cotizacion',
    PrecioSugerido  DECIMAL(9,2) UNSIGNED COMMENT'Precio sugerido del producto',
    esConfirmado BIT NOT NULL COMMENT'Bandera que indica si se confirma la cotizacion del producto',
    
 CONSTRAINT PK_UsuarioCotizacion
	PRIMARY KEY (UsuarioCotizacion_id),
 CONSTRAINT FK_UsuarioCotizacion_Usuario
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id),
 CONSTRAINT FK_UsuarioCotizacion_Vendedor
	FOREIGN KEY (Vendedor_id) REFERENCES Usuario(Usuario_id),
 CONSTRAINT FK_UsuarioCotizacion_ListaProducto
	FOREIGN KEY (ListaProducto_id) REFERENCES ListaProducto(ListaProducto_id)
);







