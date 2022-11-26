<?php
session_start(); // Inicio mi sesion PHP

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JYP | Tienda de kpop y artículos</title>
    <link rel="shortcut icon" href="img\jyp-logo.jpg">
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/main.js"></script>
    <script src="js/vendedorMainScript.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainPage.css" rel="stylesheet">
    <link href="css/pedidoPage.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <!--                 HEADER                 -->
    <div class="container">
         <header class="miHeader">
            <div class="row">
                <div class="col-6 ">
                    <a class="navbar-brand" href="mainPage.php"><img src="img/jyp-logo.jpg" id="jypLogo"></a>
                </div>
                <div class="col-4">
                </div>
                <div class="col-2">
                    <div class="d-flex flex-column dropstart misDatosUsuario">
                        <div class="miImagen dropdown p-2 mx-auto" id="DatosUser" data-bs-toggle="dropdown"
                            aria-expanded="false"><img src="" id="pfp" class="rounded-circle"></div>
                        <a class="fs-4 fw-bold mb-3 mx-auto miImgCarrito" href="carrito.php"><i
                                class="bi bi-cart"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="DatosUser">
                            <li class="mx-auto">
                                <p class="fs-5 p-1 mx-auto" id="miNombre"></p>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="" id="EditarPerfil" data-bs-toggle="modal" data-bs-target="#miModalEditUser">Editar Perfil</a></li>
                            <?php 
                            if($_SESSION["rol"] == 1){
                            echo' <li><a class="dropdown-item" href="paginaAdmin.php">Página Admin</a></li>';
                            }
                             if($_SESSION["rol"] == 2){
                             echo' <li><a class="dropdown-item" href="paginaAdmin.php">Página Admin</a></li>';
                            }
                             if($_SESSION["rol"] == 3){
                             echo'<li><a class="dropdown-item" href="paginaVendedor.php">Página Vendedor</a></li>';
                            }
                             if($_SESSION["rol"] == 4){
                             echo'<li><a class="dropdown-item" href="">Hacer perfil público/privado</a></li>';
                             echo' <li><a class="dropdown-item" href="pedidos.php">Mis pedidos</a></li>';
                             echo'<li><a class="dropdown-item" href="listas.php">Mis listas</a></li>';
                             
                            
                            }
                            ?>
                           
                           
                      
                          
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="index.php">Salir</a></li>
                        </ul>
                    </div>
                </div>

        </header>

    </div>
        <!--                 NAVBAR                 -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light miNav">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-list"></i>CATEGORÍAS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="misCategorias">
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <!-- AQUI BUSCARE MIS PRODUCTOS METHOD POST-->
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <i class="bi bi-search fs-5" type="submit"></i>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
          <input type="text" id="idProductoSeleccionado">
        <div class="separador"></div>
        <div class="col-12 fs-2 fw-bolder d-flex justify-content-end">
            <div class="btn btn-sm bg-primary" data-bs-toggle="modal" data-bs-target="#miModalReporte">Consulta de
                Ventas</div>
            <div class="btn btn-sm bg-success" data-bs-toggle="modal" data-bs-target="#miModalAltaProducto">Agregar
                productos</div>
        </div>
        <!-- PRODUCTOS -->
        <table class="table">
            <div class="row">
                <div class="col-6 fs-2 fw-bolder d-flex justify-content-start">
                    Pendientes por aprobar:
                </div>


            </div>
            <hr class="bg-danger border-2 border-top border-dark">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unitario</th>
                    <th scope="col">Precio Total</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td class="productoImagen">
                        <img src="img/celebrate.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                    </td>
                    <td class="productoNombre">
                        Álbum Twice Celebrate
                    </td>
                    <td class="productodesc">
                        Celebrate - Version A - incl. DVD
                    </td>
                    <td class="productoStock">
                        1
                    </td>
                    <td class="productoPrecio">
                        $1,352.56
                    </td>
                    <td class="productoPrecioTotal">
                        $1,352.56
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary">Detalles</div>
                    </td>
                </tr>

                <tr>
                    <td class="productoImagen">
                        <img src="img/tasteOfLove.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                    </td>
                    <td class="productoNombre">
                        Álbum Twice Taste of love
                    </td>
                    <td class="productodesc">
                        Taste Of Love - Fallen Version Photocards Included
                    </td>
                    <td class="productoStock">
                        2
                    </td>
                    <td class="productoPrecio">
                        $899.00
                    </td>
                    <td class="productoPrecioTotal">
                        $1,798.00
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary">Detalles</div>
                    </td>
                </tr>

                <tr>
                    <td class="productoImagen">
                        <img src="img/nmixxAlbum.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                    </td>
                    <td class="productoNombre">
                        Álbum NMIXX AD MARE
                    </td>
                    <td class="productodesc">
                        NMIXX 1st Single - incl. DVD
                    </td>
                    <td class="productoStock">
                        1
                    </td>
                    <td class="productoPrecio">
                        $673.00
                    </td>
                    <td class="productoPrecioTotal">
                        $673.00
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary">Detalles</div>
                    </td>
                </tr>

            </tbody>

        </table>

        <div class="separador"></div>
        <table class="table">
            <div class="row">
                <div class="col-6 fs-2 fw-bolder d-flex justify-content-start">
                    Productos aprobados:
                </div>


            </div>
            <hr class="bg-danger border-2 border-top border-dark">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unitario</th>
                    <th scope="col">Precio Total</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td class="productoImagen">
                        <img src="img/celebrate.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                    </td>
                    <td class="productoNombre">
                        Álbum Twice Celebrate
                    </td>
                    <td class="productodesc">
                        Celebrate - Version A - incl. DVD
                    </td>
                    <td class="productoStock">
                        1
                    </td>
                    <td class="productoPrecio">
                        $1,352.56
                    </td>
                    <td class="productoPrecioTotal">
                        $1,352.56
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary">Detalles</div>

                    </td>
                </tr>

                <tr>
                    <td class="productoImagen">
                        <img src="img/tasteOfLove.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                    </td>
                    <td class="productoNombre">
                        Álbum Twice Taste of love
                    </td>
                    <td class="productodesc">
                        Taste Of Love - Fallen Version Photocards Included
                    </td>
                    <td class="productoStock">
                        2
                    </td>
                    <td class="productoPrecio">
                        $899.00
                    </td>
                    <td class="productoPrecioTotal">
                        $1,798.00
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary">Detalles</div>

                    </td>
                </tr>

                <tr>
                    <td class="productoImagen">
                        <img src="img/nmixxAlbum.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                    </td>
                    <td class="productoNombre">
                        Álbum NMIXX AD MARE
                    </td>
                    <td class="productodesc">
                        NMIXX 1st Single - incl. DVD
                    </td>
                    <td class="productoStock">
                        1
                    </td>
                    <td class="productoPrecio">
                        $673.00
                    </td>
                    <td class="productoPrecioTotal">
                        $673.00
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary">Detalles</div>
                    </td>
                </tr>

            </tbody>

        </table>


    </div>

    <!--                MODALS                 -->

    <!--  >MODAL EDIT USER<-->
    <div class="modal fade" id="miModalEditUser" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle">Edita tus datos</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">

                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <h5>Ingresa los siguientes datos:</h5>
                            </div>
                        </div>
                        <div class="row modalTexto">
                            Correo Electrónico
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>

                            <input type="text" class="form-control" id="E_email" name="E_email"
                                placeholder="Correo Electrónico" aria-label="Username" aria-describedby="basic-addon1"
                                value="">

                        </div>

                        <div class="row modalTexto">
                            Nombre de usuario
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-person"></i></span>

                            <input type="text" class="form-control" id="E_usuario" name="E_usuario"
                                placeholder="Nombre de usuario" aria-label="Username" aria-describedby="basic-addon1"
                                value="">

                        </div>

                        <div class="row modalTexto">
                            Nombre(s)
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-person"></i></span>
                            <input type="text" class="form-control" id="E_names" name="E_names" placeholder="Nombre(s)"
                                aria-label="Username" aria-describedby="basic-addon1" value="">

                        </div>


                        <div class="row modalTexto">
                            Apellido Paterno
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i
                                    class="bi bi-file-person-fill"></i></span>

                            <input type="text" class="form-control" id="E_lastNameP" name="E_lastName"
                                placeholder="Apellido(s)" aria-label="Username" aria-describedby="basic-addon1"
                                value="">

                        </div>

                        <div class="row modalTexto">
                            Apellido Materno
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i
                                    class="bi bi-file-person-fill"></i></span>

                            <input type="text" class="form-control" id="E_lastNameM" name="E_lastName"
                                placeholder="Apellido Materno" aria-label="Apellido Materno"
                                aria-describedby="basic-addon1" value="">

                        </div>

                        <div class="row modalTexto">
                            Contraseña
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-key"></i></span>
                            <input type="password" class="form-control" id="E_contrasenia" name="E_contrasenia"
                                placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" value="">

                        </div>
                        <p style="font-size: small;">Contraseña con un mínimo de 8 caracteres, una
                            mayúscula, una minúscula, un número y un carácter
                            especial.
                        <p>


                        <div class="row modalTexto">
                            Fecha de nacimiento
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i
                                    class="bi bi-file-person-fill"></i></span>

                            <input type="date" class="form-control" id="E_FechaNacimiento" name="E_FechaNacimiento"
                                placeholder="Fecha de Nacimiento" aria-label="Fecha Nacimiento"
                                aria-describedby="basic-addon1" value="">

                        </div>

                        <div class="row modalTexto">
                            Foto de perfil
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-camera"> </i></span>
                            <input type="file" onchange="vista_preliminarEditarPerfil(event)" class="form-control"
                                id="E_userIMG" name="E_userIMG" placeholder="Foto de perfil" aria-label="Username"
                                aria-describedby="basic-addon1">


                        </div>
                        <div class="d-flex justify-content-center"><img src="" alt="" id="img-foto" width="250px"
                                height="250px"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="ButtonActualizarPerfil" name="EditUser"
                            data-bs-dismiss="modal">Actualizar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--  >MODAL ALTA PRODUCTO<-->
    <div class="modal fade" id="miModalAltaProducto" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="divAltaProducto">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Ingresa los siguientes datos:</h4>
                                </div>
                            </div>
                            <div class="row modalTexto">
                                Nombre:
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="bi bi-chat-left-text"></i></span>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="Nombre del producto" aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>

                            <div class="row modalTexto">
                                Cantidad producto:
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-archive"></i></span>
                                <input type="text" class="form-control" id="product_qty" name="product_qty"
                                    placeholder="Cantidad de producto" aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>

                            <div class="row modalTexto">
                                Descripción:
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-list"></i></span>
                                <input type="text" class="form-control" id="product_desc" name="product_desc"
                                    placeholder="Descripción" aria-label="Username" aria-describedby="basic-addon1"
                                    required>
                            </div>

                            <div class="row modalTexto">
                                Precio:
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-cash"></i></span>
                                <input type="text" class="form-control" id="product_price" name="product_price"
                                    placeholder="Precio" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="row modalTexto">
                                Selecciona:
                            </div>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="radio" name="product_cotizado" id="product_cotizado" value="1"
                                        aria-label="Radio button for following text input">
                                </div>
                                <input type="text" class="form-control" placeholder="El producto es cotizado"
                                    aria-label="Text input with radio button" onlyread>

                            </div>
                        <input type="hidden" id="product_cot" value="0">
                            <button type="button" class="btn btn-success" id="ButtonRegistrarProducto">Crear
                                Producto</button>
                        </div>

                        <div id="añadirCategorias">
                            <div class="row modalTexto">
                                Categoria:
                            </div>
                            <div class="input-group mb-3">

                                <div class="dropdown input-group-text" id="basic-addon1">
                                    <button class="btn dropdown-toggle text-black-50" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Selecciona aquí:
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                        id="misCategoriasDropdown">


                                    </ul>
                                </div>
                                <input type="text" class="form-control" name="product-category" id="product-category"
                                    placeholder="Categoría" aria-label="Username" aria-describedby="basic-addon1"
                                    readonly required>

                            </div>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Añadir</button>
                        </div>
                        <div id="añadirImagenes">
                            <div class="row modalTexto">
                                Imagen del producto(mín 3):
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="bi bi-camera"> </i></span>
                                <input type="file" onchange="vista_preliminarProducto(event)" class="form-control"
                                    id="producto_IMG" name="producto_IMG" placeholder="Foto del producto"
                                    aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                              <div id="miCarruselImagenes">
                                <div id="carouselExampleDark" class="carousel carousel-dark slide"
                                    data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-bs-interval="10000">
                                            <img src="..." class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>First slide label</h5>
                                                <p>Some representative placeholder content for the first slide.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item" data-bs-interval="2000">
                                            <img src="..." class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Second slide label</h5>
                                                <p>Some representative placeholder content for the second slide.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="..." class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Third slide label</h5>
                                                <p>Some representative placeholder content for the third slide.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Añadir</button>
                        </div>
                        <div id="añadirVideos">
                            <div class="row modalTexto">
                                Video del producto(mín 1):
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="bi bi-camera"> </i></span>
                                <input type="file" onchange="vista_preliminarProductoVideo(event)" class="form-control"
                                    id="producto_IMG_Video" name="producto_IMG" placeholder="Foto del producto"
                                    aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div id="miCarruselVideos">
                                <div id="carouselExampleDark" class="carousel carousel-dark slide"
                                    data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-bs-interval="10000">
                                            <img src="..." class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>First slide label</h5>
                                                <p>Some representative placeholder content for the first slide.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item" data-bs-interval="2000">
                                            <img src="..." class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Second slide label</h5>
                                                <p>Some representative placeholder content for the second slide.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="..." class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Third slide label</h5>
                                                <p>Some representative placeholder content for the third slide.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Añadir</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  >MODAL REPORTE COMPRAS<-->
    <div class="modal fade" id="miModalReporte" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle">Consulta de ventas</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha y hora de la venta</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Calificación</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    15/02/2022 23:54
                                </td>
                                <td>
                                    Photocards
                                </td>
                                <td>
                                    PC de Nayeon Cry For Me
                                </td>
                                <td>
                                    4.8
                                </td>
                                <td>
                                    $50.24
                                </td>
                                <td>
                                    500
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    20/12/2022 20:54
                                </td>
                                <td>
                                    Photobooks
                                </td>
                                <td>
                                    PB de Sana I'm Sana
                                </td>
                                <td>
                                    4.2
                                </td>
                                <td>
                                    $507.24
                                </td>
                                <td>
                                    250
                                </td>
                            </tr>
                            <tr>


                                <td>
                                    10/09/2022 07:12
                                </td>
                                <td>
                                    Póster Stray kids
                                </td>
                                <td>
                                    Póster de stray kids
                                </td>
                                <td>
                                    4.0
                                </td>
                                <td>
                                    $200.54
                                </td>
                                <td>
                                    190
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!--FOOTER<-->
    <footer class="w-100 d-flex align-items justify-content-center flex-wrap">
        <p class="fs-5 px-3 pt-3 PCELText"><img src="img/jyp-logo.jpg" class="" width="80" height="40">
        <p class="fs-5 px-3 pt-3">&copy; Todos los derechos reservados</p>
        </p>
        <div id="iconos">
            <a href="" data-bs-toggle="modal" data-bs-target="#miModalContacto"><i class="bi bi-shop"></i></a>
            <a href="https://www.facebook.com/RicardoGrimaldo29/"><i class="bi bi-facebook"></i></a>
            <a href="https://twitter.com/rickylolo29"><i class="bi bi-twitter"></i></a>
            <a href="https://www.instagram.com/rickylolo29/"><i class="bi bi-instagram"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>