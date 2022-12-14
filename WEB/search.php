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
    <div class="container myPage mx-auto">
        <!--  >SIDEBAR<-->
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white w-25" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light fs-5 fw-bolder"></i>FILTROS</div>
                <div class="list-group list-group-flush">

                    <a class="list-group-item list-group-item-action list-group-item-light p-1" href="#">
                        <div class="container-fluid sideBarItems">
                            <div class="d-flex flex-column">
                                <label><b>Grupo</b></label>
                                <label><input type="checkbox" class="sideBarOption"> Twice</label>
                                <label><input type="checkbox" class="sideBarOption"> Stray Kids</label>
                                <label><input type="checkbox" class="sideBarOption"> NMIXX</label>
                                <label><input type="checkbox" class="sideBarOption"> Day6</label>
                                <label><input type="checkbox" class="sideBarOption"> 2pm</label>
                                <label><input type="checkbox" class="sideBarOption"> Xdinary Heroes</label>
                                <label><input type="checkbox" class="sideBarOption"> Blackpink</label>
                                <label><input type="checkbox" class="sideBarOption"> Red Velvet</label>
                                <label><input type="checkbox" class="sideBarOption"> G-idle</label>
                                <label><input type="checkbox" class="sideBarOption"> Everglow</label>
                            </div>
                        </div>
                    </a>


                    <a class="list-group-item list-group-item-action list-group-item-light p-1" href="#">
                        <div class="container-fluid sideBarItems">
                            <div class="d-flex flex-column">
                                <label><b>Tipo de busqueda</b></label>
                                <label><input type="checkbox" class="sideBarOption"> Álbumes</label>
                                <label><input type="checkbox" class="sideBarOption"> Photocards</label>
                                <label><input type="checkbox" class="sideBarOption"> Photobooks</label>
                                <label><input type="checkbox" class="sideBarOption"> Ropa</label>
                                <label><input type="checkbox" class="sideBarOption"> Pósters</label>


                            </div>
                        </div>
                    </a>

                    <a class="list-group-item list-group-item-action list-group-item-light p-1" href="#">
                        <div class="container-fluid sideBarItems">

                            <label><b>FILTRAR PRECIO</b></label>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="text" id="range-1" class="form-control" placeholder="Username"
                                            aria-label="Username" aria-describedby="basic-addon1" placeholder="desde"
                                            min="0" max="99999" name="range-1" value="1">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="text" id="range-1" class="form-control" placeholder="Username"
                                            aria-label="Username" aria-describedby="basic-addon1" placeholder="desde"
                                            min="0" max="99999" name="range-1" value="99999">
                                    </div>
                                </div>


                            </div>
                            <div class="btn text-light bg-secondary">Filtrar</div>
                        </div>
                    </a>

                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper" class="w-100">
                <!-- Page content-->
                <div class="container">
                    <div class="separador"></div>
                    <div class="col-12 d-flex justify-content-end">16 resultados</div>

                    <!--  >Sections<-->
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

        </div>

        <!--                MODALS                 -->


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