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
    <script src="js/scriptProducto.js"></script>
    <script src="js/compradorMainScript.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainPage.css" rel="stylesheet">
    <link href="css/productoPage.css" rel="stylesheet">
    <link href="css/pedidoPage.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php
  if ($_SESSION != NULL) { // Si mi sesion no es nula significa que un usuario inicio sesion
    echo '<input type="hidden" value="' . $_SESSION['id'] . '" id="miUserIdActual">'; // Valor del id del usuario en un campo invisible
  }
  ?>
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
                            <li><a class="dropdown-item" href="" id="EditarPerfil" data-bs-toggle="modal"
                                    data-bs-target="#miModalEditUser">Editar Perfil</a></li>
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
                             echo' <li><a class="dropdown-item" id="MostrarPedidos">Mis pedidos</a></li>';
                             echo'<li><a class="dropdown-item" id="MostrarListas">Mis listas</a></li>';
                             
                            
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
    <input type="hidden" id="miProductoSeleccionado">
    <div class="container" id="miPaginaPrincipal">
        <!--                 CAROUSEL                 -->
        <div class="container">
            <div class="container">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="miCarrusel">

                    </div>
                </div>
            </div>
        </div>
        <!--                 SECTIONS                 -->
        <!--                 SECTION RECOMMENDED PRODUCTS                 -->
        <div class="container">
            <hr class="solid">
            <div class="row fs-4 product-title"><b>PRODUCTOS RECOMENDADOS</b></div>
            <hr class="solid">
            <section class="post-list">
                <div class="content" id="misProductosRecomendados">


                </div>

            </section>
        </div>
        <!--                 SECTION POPULAR PRODUCTS                 -->
        <div class="container">
            <hr class="solid">
            <div class="row fs-4 product-title"><b>PRODUCTOS POPULARES</b></div>
            <hr class="solid">
            <section class="post-list">
                <div class="content" id="misProductosPopulares">

                </div>

            </section>
        </div>
        <!--                 SECTION BEST SELLED PRODUCTS                 -->
        <div class="container">
            <hr class="solid">
            <div class="row fs-4 product-title"><b>MEJORES PRODUCTOS</b></div>
            <hr class="solid">
            <section class="post-list">
                <div class="content" id="misProductosMejores">

                </div>

            </section>
        </div>

    </div>

    <div class="container" id="miProducto">
    </div>


    <!-- LISTAS -->
    <div class="container" id="misListas">
        <table class="table">
            <div class="row">
                <div class="col-6 fs-2 fw-bolder d-flex justify-content-start">

                    Listas


                </div>



            </div>
            <div class="col-12 fs-2 fw-bolder d-flex justify-content-end">
                <div class="btn btn-sm bg-success" data-bs-toggle="modal" data-bs-target="#miModalAltaListas">Agregar
                    lista</div>
            </div>
            <hr class="bg-danger border-2 border-top border-dark">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad productos</th>
                    <th scope="col">Total</th>
                    <th scope="col">Tipo de lista</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td class="productoImagen">
                        <img src="img/TwiceTTT.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                    </td>
                    <td>
                        Productos Twice
                    </td>
                    <td>
                        8
                    </td>
                    <td>
                        $14,398.58
                    </td>
                    <td>
                        Privada
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="btn btn-sm bg-success">Usar</div>
                        <div class="btn btn-sm bg-danger"><i class="bi bi-trash"></i></div>
                    </td>
                </tr>

                <tr>
                    <td class="productoImagen">
                        <img src="img/Stray-Kids-Comeback-2022.jpg"
                            class="mx-auto d-block rounded border border-4 productoImagenes" alt="...">
                    </td>
                    <td>
                        Productos Stray kids
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        $4,795.48
                    </td>
                    <td>
                        Pública
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="btn btn-sm bg-success">Usar</div>
                        <div class="btn btn-sm bg-danger"><i class="bi bi-trash"></i></div>
                    </td>
                </tr>

                <tr>
                    <td class="productoImagen">
                        <img src="img/itzyCheckmate.jpg"
                            class="mx-auto d-block rounded border border-4 productoImagenes" alt="...">
                    </td>
                    <td>
                        Productos Itzy
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        $4,398.58
                    </td>
                    <td>
                        Privada
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="btn btn-sm bg-success">Usar</div>
                        <div class="btn btn-sm bg-danger"><i class="bi bi-trash"></i></div>
                    </td>
                </tr>

            </tbody>

        </table>

        <div class="separador"></div>
    </div>



     <!-- PEDIDOS -->
    <div class="container" id="misPedidos">
        <table class="table">
            <div class="row">
                <div class="col-6 fs-2 fw-bolder d-flex justify-content-start">
                    Pedidos


                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#miModalConsultaPedidos">
                        Consulta de pedidos</div>
                </div>

            </div>
            <hr class="bg-danger border-2 border-top border-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Pedido</th>
                    <th scope="col">Fecha de entrega</th>
                    <th scope="col">Estado del pedido</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1230165
                    </td>
                    <td>
                        Productos Twice
                    </td>
                    <td>
                        20/02/2022
                    </td>
                    <td>
                        Pendiente de envío
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary Ver-Detalles">Detalles</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        1236546
                    </td>
                    <td>
                        Productos Stray Kids
                    </td>
                    <td>
                        19/01/2022
                    </td>
                    <td>
                        Enviado
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary Ver-Detalles">Detalles</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        254231
                    </td>
                    <td>
                        Productos Itzy
                    </td>
                    <td>
                        15/01/2022
                    </td>
                    <td>
                        Recibido
                    </td>
                    <td>
                        <div class="btn btn-sm bg-primary Ver-Detalles">Detalles</div>
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
    <!--  >MODAL WINDOW COTIZAR<-->
    <div class="modal fade" id="miModalCotizar" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle">Chat</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="input-group">
                            <img src="img/avatar.jpg" width="65px" />
                            <textarea class="form-control" aria-label="Comement_news" readonly>Buen dia, quisiera una
                                cotización</textarea>
                            <span class="btn-secondary input-group-text eliminar-comentario"></span>
                        </div>
                        <div class="separadorCorto"></div>
                        <div class="input-group">
                            <span class="btn-secondary input-group-text eliminar-comentario"></span>
                            <textarea class="form-control" aria-label="Comement_news" readonly>Si buenos dias</textarea>
                            <img src="img/avatar2.jpg" width="65px" />
                        </div>
                    </div>
                    <div class="separador"></div>
                    <div class="separador"></div>
                    <div class="input-group">
                        <textarea class="form-control" aria-label="comment" id="comment" name="comment"></textarea>
                        <span class="btn-outline-primary input-group-text" id="enviarCotizar">Enviar</span>

                        <div class="separador"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="ButtonLogIn">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </div>
    </div>
    <!-- MODAL WINDOW ADD LIST<-->
    <div class="modal fade" id="miModalAltaListas" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle">Alta listas</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="php\user_API.php" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">
                                <h5>Ingresa los siguientes datos:</h5>
                            </div>
                        </div>

                        <div class="row modalTexto">
                            Nombre
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-person"></i></span>
                            <input type="text" class="form-control" name="names" placeholder="Nombre(s)"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>



                        <div class="row modalTexto">
                            Descripción
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-text"></i></span>

                            <input type="text" class="form-control" id="Description" name="Description"
                                placeholder="Descripción" aria-label="Descripción" aria-describedby="basic-addon1"
                                value="" required>

                        </div>


                        <div class="row modalTexto">
                            Foto (opcional)
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="bi bi-camera"> </i></span>
                            <input type="file" onchange="vista_preliminar2(event)" class="form-control" id="userIMG"
                                name="userIMG" placeholder="Foto de perfil" aria-label="Username"
                                aria-describedby="basic-addon1">


                        </div>
                        <div class="d-flex justify-content-center"><img src="" alt="" id="img-foto2" width="250px"
                                height="250px"></div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Añadir Lista</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  >MODAL CONSULTA DE PEDIDOS <-->
    <div class="modal fade" id="miModalConsultaPedidos" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle">Consulta de pedidos</h4>
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