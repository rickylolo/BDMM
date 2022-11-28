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
                        <div class="btn bg-danger eliminarProducto"><i class="bi bi-trash"></i></div>
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
  }

  // Prevenir que este evento cierre mi modal
  $(".CategoriaProducto").on("click", function (event) {
    let miNombreCategoria = $(this).attr("name");
    console.log(miNombreCategoria);
    $("#product-category").val(miNombreCategoria);

    event.preventDefault();
  });

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
