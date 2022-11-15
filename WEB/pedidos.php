<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JYP | Tienda de kpop y artículos</title>
    <link rel="shortcut icon" href="img\jyp-logo.jpg">
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/scriptProducto.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainPage.css" rel="stylesheet">
    <link href="css/productoPage.css" rel="stylesheet">
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
                            aria-expanded="false"><img src="img/avatar.jpg" id="pfp" class="rounded-circle"></div>
                        <a class="fs-4 fw-bold mb-3 mx-auto miImgCarrito" href="carrito.php"><i
                                class="bi bi-cart"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="DatosUser">
                            <li class="mx-auto">
                                <p class="fs-5 p-1 mx-auto" id="miNombre">rickylolo</p>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                    data-bs-target="#miModalEditUser">Editar Perfil</a></li>
                            <li><a class="dropdown-item" href="">Hacer perfil público/privado</a></li>
                            <li><a class="dropdown-item" href="pedidos.php">Mis pedidos</a></li>
                            <li><a class="dropdown-item" href="listas.php">Mis listas</a></li>
                            <li><a class="dropdown-item" href="paginaAdmin.php">Página Admin</a></li>
                            <li><a class="dropdown-item" href="paginaVendedor.php">Página Vendedor</a></li>
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
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="search.php">Álbumes</a></li>
                            <li><a class="dropdown-item" href="search.php">Photocards</a></li>
                            <li><a class="dropdown-item" href="search.php">Pósters</a></li>
                            <li><a class="dropdown-item" href="search.php">Photobooks</a></li>
                            <li><a class="dropdown-item" href="search.php">Ropa</a></li>

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