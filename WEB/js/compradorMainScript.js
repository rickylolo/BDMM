$(document).ready(function () {
  $("#miProducto").hide();
  $("#misListas").hide();
  $("#misPedidos").hide();
  cargarProductosAprobados();
  cargarProductosRecomendados();
  cargarProductosPopulares();
  cargarProductosMejores();
  cargarListas();
  //PRODUCTOS CARRUSEL
  function cargarProductosAprobados() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductos" },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#miCarrusel").empty();
        if (items.length > 0) {
          $("#miCarrusel").append(
            `
                 <div id="` +
              items[0].Producto_id +
              `" class="carousel-item active VerProducto">
                            <div class="d-flex justify-content-center">
                            <img class="misImagenes" src="data:image/jpeg;base64,` +
              items[0].Multimedia +
              `" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>`
          );
          for (let i = 1; i < items.length; i++) {
            if (i < 5) {
              $("#miCarrusel").append(
                `
                 <div id="` +
                  items[i].Producto_id +
                  `" class="carousel-item VerProducto">
                            <div class="d-flex justify-content-center">
                            <img class="misImagenes" src="data:image/jpeg;base64,` +
                  items[i].Multimedia +
                  `" class="d-block w-100" alt="...">
                            </div>
                        </div>                    
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>`
              );
            }
          }
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  //PRODUCTOS RECOMENDADOS
  function cargarProductosRecomendados() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductos" },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misProductosRecomendados").empty();
        if (items.length > 0) {
          for (let i = 0; i < items.length; i++) {
            if (i < 5) {
              $("#misProductosRecomendados").append(
                `
           <article class="post">
                        <div class="post-header">
                            <div id="` +
                  items[i].Producto_id +
                  `" class="VerProducto">
                                <img src="data:image/jpeg;base64,` +
                  items[i].Multimedia +
                  `" class="post-img">
                            </div>
                        </div>
                        <div class="post-body">
                            <h4><b>` +
                  items[i].nombreProducto +
                  `</b></h4>
                            <p class="descripcion">` +
                  items[i].descripcionProducto +
                  `</p>
                            <span>$` +
                  items[i].Precio +
                  `</span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
            </article>
          
          `
              );
            }
          }
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  //PRODUCTOS POPULARES
  function cargarProductosPopulares() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductos" },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misProductosPopulares").empty();
        if (items.length > 0) {
          for (let i = 0; i < items.length; i++) {
            if (i < 5) {
              $("#misProductosPopulares").append(
                `
           <article class="post">
                        <div class="post-header">
                            <div id="` +
                  items[i].Producto_id +
                  `" class="VerProducto">
                                <img src="data:image/jpeg;base64,` +
                  items[i].Multimedia +
                  `" class="post-img">
                            </div>
                        </div>
                        <div class="post-body">
                            <h4><b>` +
                  items[i].nombreProducto +
                  `</b></h4>
                            <p class="descripcion">` +
                  items[i].descripcionProducto +
                  `</p>
                            <span>$` +
                  items[i].Precio +
                  `</span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
            </article>
          
          `
              );
            }
          }
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  //PRODUCTOS CARRUSEL
  function cargarProductosMejores() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductos" },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misProductosMejores").empty();
        if (items.length > 0) {
          for (let i = 0; i < items.length; i++) {
            if (i < 5) {
              $("#misProductosMejores").append(
                `
           <article class="post">
                        <div class="post-header">
                            <div id="` +
                  items[i].Producto_id +
                  `" class="VerProducto">
                                <img src="data:image/jpeg;base64,` +
                  items[i].Multimedia +
                  `" class="post-img">
                            </div>
                        </div>
                        <div class="post-body">
                            <h4><b>` +
                  items[i].nombreProducto +
                  `</b></h4>
                            <p class="descripcion">` +
                  items[i].descripcionProducto +
                  `</p>
                            <span>$` +
                  items[i].Precio +
                  `</span><br>
                            <div class="btn miCarrito"><i class="bi bi-cart-fill"></i>| Agregar</div>
                        </div>
            </article>
          
          `
              );
            }
          }
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  function cargarListas() {}

  $("#miPaginaPrincipal").on("click", ".VerProducto", funcVerProducto);
  function funcVerProducto() {
    let miIdProducto = $(this).attr("id");
    $("#miProductoSeleccionado").val(miIdProducto);
    $("#miPaginaPrincipal").hide();
    $("#miProducto").show();
    $.ajax({
      type: "POST",
      data: { funcion: "getProducto", Producto_id: miIdProducto },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#miProducto").empty();
        if (items.length > 0) {
          $("#miProducto").append(
            `
                <div class="separador"></div>
        <div class="row">
            <div class="product col-6">
                <div class="img-container">
                    <img src="data:image/jpeg;base64,` +
              items[0].Multimedia +
              `" id="imageBox">
                </div>
                <div class="product-small-img">
                    <img src="img/tasteOfLove.jpg" onclick="myFunction(this)">
                    <img src="img/celebrate.jpg" onclick="myFunction(this)">
                    <img src="img/nmixxAlbum.jpg" onclick="myFunction(this)">
                    <img src="img/oddinarySK.jpg" onclick="myFunction(this)">
                </div>

            </div>
            <div class="col-6">
                <div class="fs-2 fw-bold">
                    ` +
              items[0].nombreProducto +
              `
                </div>

                <p class="d-flex justify-content-end text-secondary">
                    <i class="bi bi-star"></i> 4.8
                </p>
                <div class="fs-3">
                       ` +
              items[0].Precio +
              `
                </div>
                <div class="separador"></div>
                <div class="fs-6">
                        ` +
              items[0].descripcionProducto +
              `
                </div>

                <div class="fs-6 d-flex justify-content-start text-success" id="miStock">
                    Stock disponible
                </div>
                <div class="fs-5 d-flex justify-content-start">
                    Cantidad:     ` +
              items[0].cantidadDisponible +
              `
                </div>
                <div class=" d-flex justify-content-end">
                    <div class="btn bg-primary "><i class="bi bi-cart"></i>|Agregar al carrito</div>
                </div>
            </div>

        </div>
        <div class="separador">
        </div>
        <div class="separador">
        </div>
        <div class="row">
            <div class="input-group">
                <img src="img/avatar.jpg" width="65px" />
                <textarea class="form-control" aria-label="Comement_news"
                    readonly>Me llego en perfecto estado</textarea>
                <span class="btn-secondary input-group-text eliminar-comentario">5<i class="bi bi-star"></i></span>
            </div>
        </div>
        <div class="separador"></div>
        <div class="separador"></div>
        <div class="input-group">
            <textarea class="form-control" aria-label="comment" id="comment" name="comment"></textarea>
            <span class="btn-outline-primary input-group-text" id="commentProducto">Preguntar</span>
        </div>
        <div class="separador"></div>
 `
          );
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  $("#MostrarListas").click(funcMostrarListas);
  function funcMostrarListas() {
    $("#misListas").show();
    $("#miProducto").hide();
    $("#misPedidos").hide();
    $("#miPaginaPrincipal").hide();
  }

  $("#MostrarPedidos").click(funcMostrarPedidos);
  function funcMostrarPedidos() {
    $("#misListas").hide();
    $("#miProducto").hide();
    $("#misPedidos").show();
    $("#miPaginaPrincipal").hide();
  }
});
