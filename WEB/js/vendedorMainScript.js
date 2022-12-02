$(document).ready(function () {
  //Oculto y muestro divs
  $("#divAltaProducto").show();
  $("#añadirCategorias").hide();
  $("#añadirImagenes").hide();
  $("#añadirVideos").hide();

  // MODAL EDITAR PRODUCTO
  //DIVS
  $("#E_divAltaProducto").show();
  $("#E_añadirCategorias").hide();
  $("#E_añadirImagenes").hide();
  $("#E_añadirVideos").hide();

  //BOTONES
  $("#mostrarCategoriaProductEdit").show();
  $("#mostrarProductoBack").hide();
  $("#mostrarImagenesProductEdit").hide();
  $("#mostrarCategoriaProductEditBack").hide();
  $("#mostrarVideosProductEdit").hide();
  $("#mostrarImagenesProductEditBack").hide();

  cargarCategorias();
  cargarProductosVendedorAprobados();
  cargarProductosVendedorNoAprobados();
  //CARGAR DATOS
  // CATEGORIAS
  function cargarCategorias() {
    $.ajax({
      type: "POST",
      data: { funcion: "getCategorias" },
      url: "php/categoria_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misCategoriasDropdown").empty();
        for (let i = 0; i < items.length; i++) {
          $("#misCategoriasDropdown").append(
            `
            <li><a class="dropdown-item CategoriaProducto" name="` +
              items[i].nombreCategoria +
              `" id="` +
              items[i].Categoria_id +
              `"><i class="bi bi-square-fill" style="color:` +
              items[i].colorCategoria +
              `"></i>` +
              items[i].nombreCategoria +
              `</a></li>
          `
          );

          $("#misCategoriasDropdownEdit").append(
            `
            <li><a class="dropdown-item CategoriaProducto" name="` +
              items[i].nombreCategoria +
              `" id="` +
              items[i].Categoria_id +
              `"><i class="bi bi-square-fill" style="color:` +
              items[i].colorCategoria +
              `"></i>` +
              items[i].nombreCategoria +
              `</a></li>
          `
          );
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  function categoriasProducto(idProducto) {
    $.ajax({
      url: "php/categoria_API.php",
      type: "POST",
      data: {
        funcion: "getCategoriasProducto",
        Producto_id: idProducto,
      },
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#VerMisCategoriasProducto").empty();
        for (let i = 0; i < items.length; i++) {
          $("#VerMisCategoriasProducto").append(
            `
            <tr>
          <th scope="row">` +
              items[i].Categoria_id +
              `</th>
          <td><i class="bi bi-square-fill" style="color:` +
              items[i].colorCategoria +
              `;"></i>` +
              items[i].nombreCategoria +
              `</td>
          <td>` +
              items[i].descripcionCategoria +
              `</td>
          <td>
                        <div class="btn bg-danger eliminarCategoriaProducto" id="` +
              items[i].CategoriaProducto_id +
              `"><i class="bi bi-trash"></i></div>
          </td>
          </tr>
          `
          );
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  function cargarImagenes(idProducto) {
    $.ajax({
      url: "php/multimedia_API.php",
      type: "POST",
      data: {
        funcion: "getMultimediaProductoImagen",
        Producto_id: idProducto,
      },
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misIndicadoresImagenes").empty();
        $("#misItemsCarruselImagenes").empty();
        if (items.length > 0) {
          $("#misIndicadoresImagenes").append(
            `
               <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
          `
          );
          $("#misItemsCarruselImagenes").append(
            `
                                         <div class="carousel-item active" data-bs-interval="10000">
                                            <img src="data:image/jpeg;base64,` +
              items[0].Multimedia +
              `" class="misImagenes">
                                            <div class="carousel-caption d-none d-md-block">
                                                 <p><div class="btn btm-sm btn-danger eliminarImagen" id="` +
              items[0].ProductoMultimedia_id +
              `">Eliminar</div></p>
                                            </div>
                                        </div>
          `
          );
          for (let i = 1; i < items.length; i++) {
            $("#misIndicadoresImagenes").append(
              `
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="` +
                i +
                `"
                                            aria-label="Slide ` +
                i +
                `"></button>
                                     
          `
            );

            $("#misItemsCarruselImagenes").append(
              `
                 <div class="carousel-item">
                                            <img  src="data:image/jpeg;base64,` +
                items[i].Multimedia +
                `" class="misImagenes">
                                            <div class="carousel-caption d-none d-md-block">
                                               
                                                <p><div class="btn btm-sm btn-danger eliminarImagen" id="` +
                items[i].ProductoMultimedia_id +
                `">Eliminar</div></p>
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
                                 
          `
            );
          }
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  function cargarVideos(idProducto) {
    $.ajax({
      url: "php/multimedia_API.php",
      type: "POST",
      data: {
        funcion: "getMultimediaProductoVideo",
        Producto_id: idProducto,
      },
    })
      .done(function (data) {
        var items = JSON.parse(data);
        if (items.length > 0) {
          $("#misIndicadoresVideos").empty();
          $("#itemsCarruselVideo").empty();
          $("#misIndicadoresVideos").append(
            `
               <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
          `
          );
          $("#itemsCarruselVideo").append(
            `
                                         <div class="carousel-item active" data-bs-interval="10000">
                                                   <video controls  class="misVideos mx-auto"> <source class="misVideos" src="data:video/mp4;base64,` +
              items[0].Multimedia +
              `" type="video/mp4"></video>
                                            <div class="carousel-caption d-none d-md-block">
                                              <p><div class="btn btn-danger borrarVideo" id="` +
              items[0].ProductoMultimedia_id +
              `">Borrar Video</div></p>
                                            </div>
                                        </div>
          `
          );
          for (let i = 1; i < items.length; i++) {
            $("#misIndicadoresVideos").append(
              `
                                        <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="` +
                i +
                `"
                                            aria-label="Slide ` +
                i +
                `"></button>
                                     
          `
            );

            $("#itemsCarruselVideo").append(
              `
                 <div class="carousel-item">
                                          <video controls  class="misVideos mx-auto"> <source src="data:video/mp4;base64,` +
                items[i].Multimedia +
                `" type="video/mp4"></video>
                                            <div class="carousel-caption d-none d-md-block">
                                               
                                                <p><div class="btn btn-danger borrarVideo" id="` +
                items[i].ProductoMultimedia_id +
                `">Borrar Video</div></p>
                                            </div>
                                        </div>
                                           <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleDark2" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleDark2" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                 
          `
            );
          }
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  //PRODUCTOS VENDEDOR
  function cargarProductosVendedorAprobados() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductosAprobadosVendedor" },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misProductosAprobados").empty();
        for (let i = 0; i < items.length; i++) {
          $("#misProductosAprobados").append(
            `
                  <tr>
                    <td class="productoImagen">`
          );
          if (items[i].Multimedia == "") {
            $("#misProductosAprobados").append(
              `
                        <img src="img/nophoto.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                            `
            );
          } else {
            $("#misProductosAprobados").append(
              `
                        <img src="data:image/jpeg;base64,` +
                items[i].Multimedia +
                `" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                            `
            );
          }

          $("#misProductosAprobados").append(
            `
                    </td>
                    <td class="productoNombre">
                        ` +
              items[i].nombreProducto +
              `
                    </td>
                    <td class="productodesc">
                         ` +
              items[i].descripcionProducto +
              `
                    </td>
                    <td class="productoStock">
                         ` +
              items[i].cantidadDisponible +
              `
                    </td>
                    <td class="productoPrecio">
                        $` +
              items[i].Precio +
              `
                    </td>
                    `
          );
          if (items[i].esCotizado == "1") {
            $("#misProductosAprobados").append(
              `
                    <td class="productoCotizado">
                       Si
                    </td>
                     `
            );
          } else {
            $("#misProductosAprobados").append(
              `
                    <td class="productoCotizado">
                       No
                    </td>
                     `
            );
          }
          $("#misProductosAprobados").append(
            `
                    <td>
                       <div class="btn btn-primary">Detalles</div> 
                    </td>
                </tr>
          `
          );
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  function cargarProductosVendedorNoAprobados() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductosNoAprobadosVendedor" },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misProductosNoAprobados").empty();
        for (let i = 0; i < items.length; i++) {
          $("#misProductosNoAprobados").append(
            `
                  <tr>
                    <td class="productoImagen">`
          );
          if (items[i].Multimedia == "") {
            $("#misProductosNoAprobados").append(
              `
                        <img src="img/nophoto.jpg" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                            `
            );
          } else {
            $("#misProductosNoAprobados").append(
              `
                        <img src="data:image/jpeg;base64,` +
                items[i].Multimedia +
                `" class="mx-auto d-block rounded border border-4 productoImagenes"
                            alt="...">
                            `
            );
          }

          $("#misProductosNoAprobados").append(
            `
                    </td>
                    <td class="productoNombre">
                        ` +
              items[i].nombreProducto +
              `
                    </td>
                    <td class="productodesc">
                         ` +
              items[i].descripcionProducto +
              `
                    </td>
                    <td class="productoStock">
                         ` +
              items[i].cantidadDisponible +
              `
                    </td>
                    <td class="productoPrecio">
                        $` +
              items[i].Precio +
              `
                    </td>
                    `
          );
          if (items[i].esCotizado == "1") {
            $("#misProductosNoAprobados").append(
              `
                    <td class="productoCotizado">
                       Si
                    </td>
                     `
            );
          } else {
            $("#misProductosNoAprobados").append(
              `
                    <td class="productoCotizado">
                       No
                    </td>
                     `
            );
          }

          $("#misProductosNoAprobados").append(
            `
                    <td>
                        <div class="btn bg-primary editarProducto" data-bs-toggle="modal" data-bs-target="#miModalEditarProducto" id="` +
              items[i].Producto_id +
              `"><i class="bi bi-pen"></i></div>
                        <div class="btn bg-danger eliminarProducto" id="` +
              items[i].Producto_id +
              `"><i class="bi bi-trash"></i></div>
                    </td>
          `
          );
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  // Registro de usuarios con dataform
  //-------------------------VENDEDOR----------------------------
  // Check de mi radio button
  $('input:radio[name="product_cotizado"]').change(function () {
    if ($(this).val() == "1") {
      $("#product_cot").val("1");
    }
  });
  // Registrar productos
  $("#ButtonRegistrarProducto").click(funcRegistrarProducto);
  function funcRegistrarProducto() {
    var nombProducto = $("#product_name").val();
    var desProducto = $("#product_desc").val();
    var precProducto = $("#product_price").val();
    var cantProducto = $("#product_qty").val();
    var Cotizado = $("#product_cot").val();
    $.ajax({
      url: "php/producto_API.php",
      type: "POST",
      data: {
        funcion: "insertarProducto",
        nombreProducto: nombProducto,
        descProducto: desProducto,
        Precio: precProducto,
        cantidadDisponible: cantProducto,
        esCotizado: Cotizado,
      },
    })
      .done(function (data) {
        var items = JSON.parse(data);
        alert("Producto insertado correctamente");

        $("#idProductoSeleccionado").val(items[0].Producto_id);
        $("#divAltaProducto").hide();
        $("#añadirCategorias").show();
        $("#añadirImagenes").hide();
        $("#añadirVideos").hide();
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  // --------------Actualizar Datos Productos-------------
  // Editar productos
  $("#ButtonActualizarProducto").click(funcActualizarProductos);
  function funcActualizarProductos() {
    var miIdProducto = $("#idProductoSeleccionado").val();
    var nombProducto = $("#E_product_name").val();
    var desProducto = $("#E_product_desc").val();
    var precProducto = $("#E_product_price").val();
    var cantProducto = $("#E_product_qty").val();
    var Cotizado = $("#E_product_cot").val();

    $.ajax({
      url: "php/producto_API.php",
      type: "POST",
      data: {
        funcion: "actualizarProducto",
        Producto_id: miIdProducto,
        nombreProducto: nombProducto,
        descProducto: desProducto,
        Precio: precProducto,
        cantidadDisponible: cantProducto,
        esCotizado: Cotizado,
      },
    })
      .done(function (data) {
        console.log(data);
        cargarProductosVendedorNoAprobados();
        alert("Producto actualizado correctamente");
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  // Asignar categorias de productos
  $("#AsignarCategoriaProducto").click(funcAsignarCategorias);
  function funcAsignarCategorias() {
    var miIdProducto = $("#idProductoSeleccionado").val();
    var miIdCategoria = $("#miIdCategoriaSeleccionada").val();

    $.ajax({
      url: "php/categoria_API.php",
      type: "POST",
      data: {
        funcion: "asignarCategoriaProducto",
        Producto_id: miIdProducto,
        Categoria_id: miIdCategoria,
      },
    })
      .done(function () {
        categoriasProducto(miIdProducto);
        alert("Categoria asignada correctamente");
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  // Quitar categorias de productos
  $("#VerMisCategoriasProducto").on(
    "click",
    ".eliminarCategoriaProducto",
    funcQuitarCategoria
  );
  function funcQuitarCategoria() {
    var miIdProducto = $("#idProductoSeleccionado").val();
    var miIdCategoriaProducto = $(this).attr("id");
    if (confirm("¿Seguro deseas eliminar esta categoria de este producto?")) {
      $.ajax({
        url: "php/categoria_API.php",
        type: "POST",
        data: {
          funcion: "quitarCategoriaProducto",
          CategoriaProducto_id: miIdCategoriaProducto,
        },
      })
        .done(function () {
          categoriasProducto(miIdProducto);
          alert("Categoria eliminada correctamente");
        })
        .fail(function (data) {
          console.error(data);
        });
    }
  }

  //Agregar Imagenes
  $("#añadirImagenesProducto").click(AgregarImagenesProducto);
  function AgregarImagenesProducto() {
    var form_data = new FormData();
    var file_data = $("#E_producto_IMG").prop("files")[0];
    if (file_data == null || file_data == "") {
      alert("imagen no cargada");
      return;
    }
    var miIdProducto = $("#idProductoSeleccionado").val();
    form_data.append("file", file_data);
    form_data.append("funcion", "insertarMultimedia");
    form_data.append("Producto_id", miIdProducto);
    form_data.append("esVideo", 0);
    $.ajax({
      url: "php/multimedia_API.php",
      type: "POST",
      cache: false,
      contentType: false,
      data: form_data,
      dataType: "JSON",
      enctype: "multipart/form-data",
      processData: false,
    }).fail(function (data) {
      cargarImagenes(miIdProducto);
      alert("Imagen Agregada Correctamente");
    });
  }

  // Eliminar Imagenes
  $("#misItemsCarruselImagenes").on(
    "click",
    ".eliminarImagen",
    funcEliminarImagen
  );
  function funcEliminarImagen() {
    var miIdMultimediaProducto = $(this).attr("id");
    var miIdProducto = $("#idProductoSeleccionado").val();
    if (confirm("¿Seguro deseas eliminar esta imagen?")) {
      $.ajax({
        url: "php/multimedia_API.php",
        type: "POST",
        data: {
          funcion: "eliminarMultimedia",
          ProductoMultimedia_id: miIdMultimediaProducto,
        },
      })
        .done(function (data) {
          console.log(data);
          cargarImagenes(miIdProducto);
          alert("Imagen Eliminada Correctamente");
        })
        .fail(function (data) {
          console.error(data);
        });
    }
  }
  //Agregar Videos
  $("#añadirVideosProducto").click(AgregarVideosProducto);
  function AgregarVideosProducto() {
    var form_data = new FormData();
    var file_data = $("#E_producto_Video").prop("files")[0];
    if (file_data == null || file_data == "") {
      alert("Video no cargado");
      return;
    }
    var miIdProducto = $("#idProductoSeleccionado").val();
    form_data.append("file", file_data);
    form_data.append("funcion", "insertarMultimedia");
    form_data.append("Producto_id", miIdProducto);
    form_data.append("esVideo", 1);
    $.ajax({
      url: "php/multimedia_API.php",
      type: "POST",
      cache: false,
      contentType: false,
      data: form_data,
      dataType: "JSON",
      enctype: "multipart/form-data",
      processData: false,
    }).fail(function (data) {
      console.log(data);
      cargarVideos(miIdProducto);
      alert("Video Agregado Correctamente");
    });
  }

  // Eliminar Videos
  $("#itemsCarruselVideo").on("click", ".borrarVideo", funcEliminarVideo);
  function funcEliminarVideo() {
    var miIdMultimediaProducto = $(this).attr("id");
    var miIdProducto = $("#idProductoSeleccionado").val();
    if (confirm("¿Seguro deseas eliminar esta imagen?")) {
      $.ajax({
        url: "php/multimedia_API.php",
        type: "POST",
        data: {
          funcion: "eliminarMultimedia",
          ProductoMultimedia_id: miIdMultimediaProducto,
        },
      })
        .done(function (data) {
          console.log(data);
          cargarVideos(miIdProducto);
          alert("Video Eliminado Correctamente");
        })
        .fail(function (data) {
          console.error(data);
        });
    }
  }

  //Pasar Id Para editar mi producto
  $("#misProductosNoAprobados").on("click", ".editarProducto", funcPasarId);
  function funcPasarId() {
    $("#idProductoSeleccionado").val($(this).attr("id"));
    //Ahora traere la informacion del producto
    var miIdProducto = $("#idProductoSeleccionado").val();
    $.ajax({
      url: "php/producto_API.php",
      type: "POST",
      data: {
        funcion: "getProductoNoAprobado",
        Producto_id: miIdProducto,
      },
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#E_product_name").val(items[0].nombreProducto);
        $("#E_product_desc").val(items[0].descripcionProducto);
        $("#E_product_price").val(items[0].Precio);
        $("#E_product_qty").val(items[0].cantidadDisponible);
        $("#E_product_cot").val(items[0].esCotizado);
      })
      .fail(function (data) {
        console.error(data);
      });
    //Ahora traere la informacion de las categorias del producto
    categoriasProducto(miIdProducto);
    //Ahora traere la informacion de las imagenes del producto
    cargarImagenes(miIdProducto);
    //Ahora traere la informacion de los videos del producto
    cargarVideos(miIdProducto);
  }

  //Eliminar mi producto
  $("#misProductosNoAprobados").on(
    "click",
    ".eliminarProducto",
    funcEliminarProducto
  );
  function funcEliminarProducto() {
    var miIdProducto = $(this).attr("id");
    if (confirm("¿Seguro deseas eliminar este producto?")) {
      $.ajax({
        url: "php/producto_API.php",
        type: "POST",
        data: {
          funcion: "eliminarProducto",
          Producto_id: miIdProducto,
        },
      })
        .done(function (data) {
          console.log(data);
          alert("Producto eliminado");
          cargarProductosVendedorNoAprobados();
        })
        .fail(function (data) {
          console.error(data);
        });
    }
  }

  // Prevenir que este evento cierre mi modal
  $(".CategoriaProducto").on("click", function (event) {
    event.preventDefault();
  });

  $("#misCategoriasDropdownEdit").on(
    "click",
    ".CategoriaProducto",
    funcGetMiNombreCategoria
  );
  function funcGetMiNombreCategoria() {
    let miNombreCategoria = $(this).attr("name");
    let miIdCategoria = $(this).attr("id");
    $("#E_product-category").val(miNombreCategoria);
    $("#miIdCategoriaSeleccionada").val(miIdCategoria);
  }

  // BOTONES MI MODAL EDIT
  $("#mostrarCategoriaProductEdit").click(function () {
    //DIVS
    $("#E_divAltaProducto").hide();
    $("#E_añadirCategorias").show();
    $("#E_añadirImagenes").hide();
    $("#E_añadirVideos").hide();

    //BOTONES
    $("#mostrarCategoriaProductEdit").hide();
    $("#mostrarProductoBack").show();
    $("#mostrarImagenesProductEdit").show();
    $("#mostrarCategoriaProductEditBack").hide();
    $("#mostrarVideosProductEdit").hide();
    $("#mostrarImagenesProductEditBack").hide();
  });

  $("#mostrarProductoBack").click(function () {
    //DIVS
    $("#E_divAltaProducto").show();
    $("#E_añadirCategorias").hide();
    $("#E_añadirImagenes").hide();
    $("#E_añadirVideos").hide();

    //BOTONES
    $("#mostrarCategoriaProductEdit").show();
    $("#mostrarProductoBack").hide();
    $("#mostrarImagenesProductEdit").hide();
    $("#mostrarCategoriaProductEditBack").hide();
    $("#mostrarVideosProductEdit").hide();
    $("#mostrarImagenesProductEditBack").hide();
  });

  $("#mostrarImagenesProductEdit").click(function () {
    //DIVS
    $("#E_divAltaProducto").hide();
    $("#E_añadirCategorias").hide();
    $("#E_añadirImagenes").show();
    $("#E_añadirVideos").hide();

    //BOTONES
    $("#mostrarCategoriaProductEdit").hide();
    $("#mostrarProductoBack").hide();
    $("#mostrarImagenesProductEdit").hide();
    $("#mostrarCategoriaProductEditBack").show();
    $("#mostrarVideosProductEdit").show();
    $("#mostrarImagenesProductEditBack").hide();
  });

  $("#mostrarCategoriaProductEditBack").click(function () {
    //DIVS
    $("#E_divAltaProducto").hide();
    $("#E_añadirCategorias").show();
    $("#E_añadirImagenes").hide();
    $("#E_añadirVideos").hide();

    //BOTONES
    $("#mostrarCategoriaProductEdit").hide();
    $("#mostrarProductoBack").show();
    $("#mostrarImagenesProductEdit").show();
    $("#mostrarCategoriaProductEditBack").hide();
    $("#mostrarVideosProductEdit").hide();
    $("#mostrarImagenesProductEditBack").hide();
  });

  $("#mostrarVideosProductEdit").click(function () {
    //DIVS
    $("#E_divAltaProducto").hide();
    $("#E_añadirCategorias").hide();
    $("#E_añadirImagenes").hide();
    $("#E_añadirVideos").show();

    //BOTONES
    $("#mostrarCategoriaProductEdit").hide();
    $("#mostrarProductoBack").hide();
    $("#mostrarImagenesProductEdit").hide();
    $("#mostrarCategoriaProductEditBack").hide();
    $("#mostrarVideosProductEdit").hide();
    $("#mostrarImagenesProductEditBack").show();
  });

  $("#mostrarImagenesProductEditBack").click(function () {
    //DIVS
    $("#E_divAltaProducto").hide();
    $("#E_añadirCategorias").hide();
    $("#E_añadirImagenes").show();
    $("#E_añadirVideos").hide();

    //BOTONES
    $("#mostrarCategoriaProductEdit").hide();
    $("#mostrarProductoBack").hide();
    $("#mostrarImagenesProductEdit").hide();
    $("#mostrarCategoriaProductEditBack").show();
    $("#mostrarVideosProductEdit").show();
    $("#mostrarImagenesProductEditBack").hide();
  });

  //TOGGLE PARA MOSTRAR PRODUCTOS
  $("#mostrarMasPendientes").click(function () {
    $("#ProductosPendientes").toggle();
  });
  $("#mostrarMasAprobados").click(function () {
    $("#ProductosAprobados").toggle();
  });
});
