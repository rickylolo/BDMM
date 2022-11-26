$(document).ready(function () {
  //Oculto y muestro divs
  $("#divAltaProducto").show();
  $("#añadirCategorias").hide();
  $("#añadirImagenes").hide();
  $("#añadirVideos").hide();

  cargarCategorias();

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

  // Prevenir que este evento cierre mi modal
  $(".CategoriaProducto").on("click", function (event) {
    let miNombreCategoria = $(this).attr("name");
    console.log(miNombreCategoria);
    $("#product-category").val(miNombreCategoria);

    event.preventDefault();
  });
});
