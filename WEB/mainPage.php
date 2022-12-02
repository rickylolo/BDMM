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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainPage.css" rel="stylesheet">
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
        <!--                 CAROUSEL                 -->
        <div class="container">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div id="myCarousel" class="carousel slide carousel-fade " data-bs-ride="carousel">
                        <ol class="carousel-indicators" id="numero-carrusel">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="producto.php">
                                    <img src="img/Stray-Kids-Comeback-2022.jpg" class="mx-auto d-block w-100" alt="...">
                                </a>
                            </div>
                            <div class="carousel-item ">
                                <a href="producto.php">
                                    <img src="img/TwiceTTT.jpg" class="mx-auto d-block w-100" alt="...">
                                </a>
                            </div>
                            <div class="carousel-item ">
                                <a href="producto.php">
                                    <img src="img/itzyCheckmate.jpg" class="mx-auto d-block w-100" alt="...">
                                </a>
                            </div>
                            <div class="carousel-item ">
                                <a href="producto.php">
                                    <img src="img/nmixxOO.jpg" class="mx-auto d-block w-100" alt="...">
                                </a>
                            </div>
                        </div>
                        <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
                            <span class="sr-only"></span>
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
                            <span class="sr-only"></span>
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
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
                <div class="content">
                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/celebrate.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Twice Celebrate</b></h4>
                            <p class="descripcion">Celebrate - Version A - incl. DVD</p>
                            <span>1,352<sup>.56</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/tasteOfLove.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Twice Taste of love</b></h4>
                            <p class="descripcion">Taste Of Love - Fallen Version Photocards Included</p>
                            <span>899<sup>.00</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/nmixxAlbum.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum NMIXX AD MARE</b></h4>
                            <p class="descripcion">NMIXX 1st Single</p>
                            <span>673<sup>.00</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/oddinarySK.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Stray Kids Oddinary</b></h4>
                            <p class="descripcion">Oddinary Mask Off & Scanning Version</p>
                            <span>673<sup>.00</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>
                </div>

            </section>
        </div>
        <!--                 SECTION POPULAR PRODUCTS                 -->
        <div class="container">
            <hr class="solid">
            <div class="row fs-4 product-title"><b>PRODUCTOS POPULARES</b></div>
            <hr class="solid">
            <section class="post-list">
                <div class="content">
                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/celebrate.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Twice Celebrate</b></h4>
                            <p class="descripcion">Celebrate - Version A - incl. DVD</p>
                            <span>1,352<sup>.56</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/tasteOfLove.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Twice Taste of love</b></h4>
                            <p class="descripcion">Taste Of Love - Fallen Version Photocards Included</p>
                            <span>899<sup>.00</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/nmixxAlbum.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum NMIXX AD MARE</b></h4>
                            <p class="descripcion">NMIXX 1st Single</p>
                            <span>673<sup>.00</sup></span><br>
                            <div class="btn miCarrito" data-bs-toggle="modal" data-bs-target="#miModalCotizar"><i
                                    class="bi bi-cart-fill"></i>| Cotizar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/oddinarySK.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Stray Kids Oddinary</b></h4>
                            <p class="descripcion">Oddinary Mask Off & Scanning Version</p>
                            <span>673<sup>.00</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>
                </div>

            </section>
        </div>
        <!--                 SECTION BEST SELLED PRODUCTS                 -->
        <div class="container">
            <hr class="solid">
            <div class="row fs-4 product-title"><b>MEJORES PRODUCTOS</b></div>
            <hr class="solid">
            <section class="post-list">
                <div class="content">
                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/celebrate.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Twice Celebrate</b></h4>
                            <p class="descripcion">Celebrate - Version A - incl. DVD</p>
                            <span>1,352<sup>.56</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/tasteOfLove.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Twice Taste of love</b></h4>
                            <p class="descripcion">Taste Of Love - Fallen Version Photocards Included</p>
                            <span>899<sup>.00</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/nmixxAlbum.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum NMIXX AD MARE</b></h4>
                            <p class="descripcion">NMIXX 1st Single</p>
                            <span>673<sup>.00</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>

                    <article class="post">
                        <div class="post-header">
                            <a href="producto.php">
                                <img src="img/oddinarySK.jpg" class="post-img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4><b>Álbum Stray Kids Oddinary</b></h4>
                            <p class="descripcion">Oddinary Mask Off & Scanning Version</p>
                            <span>673<sup>.00</sup></span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
                    </article>
                </div>

            </section>
        </div>

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
                                placeholder="Apellido Materno" aria-label="Apellido Materno" aria-describedby="basic-addon1"
                                value="">

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
                            <input type="file" onchange="vista_preliminarEditarPerfil(event)" class="form-control" id="E_userIMG"
                                name="E_userIMG" placeholder="Foto de perfil" aria-label="Username"
                                aria-describedby="basic-addon1">


                        </div>
                        <div class="d-flex justify-content-center"><img src="" alt="" id="img-foto" width="250px"
                                height="250px"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="ButtonActualizarPerfil" name="EditUser" data-bs-dismiss="modal">Actualizar</button>
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
                            <textarea class="form-control" aria-label="Comement_news"
                                readonly>Buen dia, quisiera una cotización</textarea>
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