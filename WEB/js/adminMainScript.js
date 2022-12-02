$(document).ready(function () {
  // Prevenir que este evento cierre mi modal
  $(".SexoUsuario").on("click", function (event) {
    event.preventDefault();
    $("#gender-user").val($(this).text());
  });

  $(".MetodoPago").on("click", function (event) {
    event.preventDefault();
    $("#tipoMetodo").val($(this).text());
  });

  cargarCategoriasAdmin();
  cargarProductosAprobados();
  cargarProductosNoAprobados();
  // CATEGORIAS
  function cargarCategoriasAdmin() {
    $.ajax({
      type: "POST",
      data: { funcion: "getCategorias" },
      url: "php/categoria_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misCategorias").empty();
        $("#VerMisCategorias").empty();
        for (let i = 0; i < items.length; i++) {
          $("#misCategorias").append(
            `
            <li><a class="dropdown-item miBusquedaCategoria" id="` +
              items[i].Categoria_id +
              `"><i class="bi bi-square-fill" style="color:` +
              items[i].colorCategoria +
              `;"></i>  ` +
              items[i].nombreCategoria +
              `</a></li>
          `
          );

          $("#VerMisCategorias").append(
            `
          <tr>
          <th scope="row">` +
              items[i].Categoria_id +
              `</th>
          <td>` +
              items[i].nombreCategoria +
              `</td>
          <td>` +
              items[i].descripcionCategoria +
              `</td>
              <td><i class="bi bi-square-fill" style="color:` +
              items[i].colorCategoria +
              `;"></i></td>
          <td>
           <div class="btn bg-primary editarCategoria" data-bs-toggle="modal" data-bs-target="#miModalEditarCategoria" id="` +
              items[i].Categoria_id +
              `"><i class="bi bi-pen"></i></div>
                        <div class="btn bg-danger eliminarCategoria" id="` +
              items[i].Categoria_id +
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
  //PRODUCTOS VENDEDOR
  function cargarProductosAprobados() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductos" },
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
  function cargarProductosNoAprobados() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductosNoAprobados" },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        console.log(data);
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
                      <div class="btn btn-sm bg-success AprobarProducto" id="` +
              items[i].Producto_id +
              `"><i class="bi bi-check2"></i></div>
                    </td>
          `
          );
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  // Registro de usuarios administradores con dataform
  //-------------------------SUPER ADMIN----------------------------
  $("#ButtonRegistro").click(funcRegistrarUsuarioAdmin);
  function funcRegistrarUsuarioAdmin() {
    //Verificacion contraseña
    var contrasenia = $("#contrasenia").val();
    var contrasenia_confirmar = $("#confirmar_contrasenia").val();
    if (contrasenia != contrasenia_confirmar) {
      alert("La contraseña no coincide reintenta nuevamente");
      return;
    }
    var form_data = new FormData();
    var file_data = $("#userIMG").prop("files")[0];
    var email = $("#email").val();
    var usuario = $("#usuario").val();
    var names = $("#names").val();
    var lastNameP = $("#lastNameP").val();
    var lastNameM = $("#lastNameM").val();
    var fechaNacimiento = $("#Birthday").val();
    var genero = $("#gender-user").val();
    form_data.append("file", file_data);
    form_data.append("funcion", "registrarUsuarioAdministrador");
    form_data.append("email", email);
    form_data.append("usuario", usuario);
    form_data.append("contrasenia", contrasenia);
    form_data.append("names", names);
    form_data.append("lastNameP", lastNameP);
    form_data.append("lastNameM", lastNameM);
    form_data.append("fechaNacimiento", fechaNacimiento);
    form_data.append("genero", genero);
    $.ajax({
      url: "php/user_API.php",
      type: "POST",
      cache: false,
      contentType: false,
      data: form_data,
      dataType: "JSON",
      enctype: "multipart/form-data",
      processData: false,
    }).fail(function (data) {
      // MANEJO DE ERRORES DEL SERVIDOR
      if (data.statusText == "OK" && data.status == 200) {
        alert("Registro de comprador correctamente");
        $("#userIMG").val("");
        $("#email").val("");
        $("#usuario").val("");
        $("#names").val("");
        $("#lastNameP").val("");
        $("#lastNameM").val("");
        $("#Birthday").val("");
        $("#gender-user").val("");
        $("#contrasenia").val("");
        $("#confirmar_contrasenia").val("");
      } else {
        alert("Algo ocurrió mal");
      }
    });
  }

  //Registro de metodos de pago
  $("#ButtonRegistroMetodoPago").click(funcRegistrarMetodoPago);
  function funcRegistrarMetodoPago() {
    var form_data = new FormData();
    var file_data = $("#metodoIMG").prop("files")[0];
    var tipoMet = $("#tipoMetodo").val();
    var namMet = $("#nameMetodo").val();

    form_data.append("funcion", "insertarMetodoPago");
    form_data.append("file", file_data);
    form_data.append("nombreMetodo", namMet);
    form_data.append("tipoMetodo", tipoMet);

    $.ajax({
      url: "php/metodoPago_API.php",
      type: "POST",
      cache: false,
      contentType: false,
      data: form_data,
      dataType: "JSON",
      enctype: "multipart/form-data",
      processData: false,
    }).fail(function (data) {
      console.log(data);
      // MANEJO DE ERRORES DEL SERVIDOR
      if (data.statusText == "OK" && data.status == 200) {
        alert("Registro de metodo de pago correctamente");
        $("#metodoIMG").val("");
        $("#tipoMetodo").val("");
        $("#nameMetodo").val("");
      } else {
        alert("Algo ocurrió mal");
        console.error(data);
      }
    });
  }

  //-------------------------ADMIN----------------------------
  // Registro de categorias
  $("#ButtonRegistroCategoria").click(funcRegistrarCategoria);
  function funcRegistrarCategoria() {
    var nomCategoria = $("#nameCat").val();
    var colCategoria = $("#colorCat").val();
    var descCategoria = $("#descCat").val();
    $.ajax({
      url: "php/categoria_API.php",
      type: "POST",
      data: {
        funcion: "insertarCategoria",
        nombreCategoria: nomCategoria,
        colorCategoria: colCategoria,
        descripcionCategoria: descCategoria,
      },
    })
      .done(function (data) {
        console.log(data);
        $("#nameCat").val("");
        $("#colorCat").val("");
        $("#descCat").val("");
        cargarCategoriasAdmin();
        alert("Categoria insertada correctamente");
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  // Actualizar categorias
  $("#ButtonActualizarCategoria").click(funcActualizarCategoria);
  function funcActualizarCategoria() {
    var idCategoria = $("#miCategoriaSeleccionada").val();
    var nomCategoria = $("#E_nameCat").val();
    var colCategoria = $("#E_colorCat").val();
    var descCategoria = $("#E_descCat").val();
    $.ajax({
      url: "php/categoria_API.php",
      type: "POST",
      data: {
        funcion: "actualizarCategoria",
        Categoria_id: idCategoria,
        nombreCategoria: nomCategoria,
        colorCategoria: colCategoria,
        descripcionCategoria: descCategoria,
      },
    })
      .done(function (data) {
        console.log(data);
        $("#E_nameCat").val("");
        $("#E_colorCat").val("");
        $("#E_descCat").val("");
        cargarCategoriasAdmin();
        alert("Categoria actualizada correctamente");
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  //Pasar Id Categoria
  $("#VerMisCategorias").on("click", ".editarCategoria", funcGetMiIDCategoria);
  function funcGetMiIDCategoria() {
    let miIdCategoria = $(this).attr("id");
    $("#miCategoriaSeleccionada").val(miIdCategoria);

    $.ajax({
      type: "POST",
      data: { funcion: "getCategoria", Categoria_id: miIdCategoria },
      url: "php/categoria_API.php",
    })
      .done(function (data) {
        console.log(data);
        if (data.length != 0) {
          var items = JSON.parse(data);

          $("#E_nameCat").val(items[0].nombreCategoria);
          $("#E_colorCat").val(items[0].colorCategoria);
          $("#E_descCat").val(items[0].descripcionCategoria);
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  //Eliminar Categoria
  $("#VerMisCategorias").on(
    "click",
    ".eliminarCategoria",
    funcEliminarCategoria
  );
  function funcEliminarCategoria() {
    let miIdCategoria = $(this).attr("id");
    if (confirm("¿Seguro deseas eliminar esta categoria?")) {
      $.ajax({
        type: "POST",
        data: { funcion: "eliminarCategoria", Categoria_id: miIdCategoria },
        url: "php/categoria_API.php",
      })
        .done(function (data) {
          cargarCategoriasAdmin();
          alert("Categoria eliminada correctamente");
        })
        .fail(function (data) {
          console.error(data);
        });
    }
  }

  //Eliminar Producto
  $("#misProductosNoAprobados").on(
    "click",
    ".AprobarProducto",
    funcAprobarProducto
  );
  function funcAprobarProducto() {
    let miIdProducto = $(this).attr("id");
    if (confirm("¿Seguro deseas aprobar este producto?")) {
      $.ajax({
        type: "POST",
        data: { funcion: "aprobarProducto", Producto_id: miIdProducto },
        url: "php/producto_API.php",
      })
        .done(function (data) {
          cargarProductosAprobados();
          cargarProductosNoAprobados();
          alert("Producto Aprobado");
        })
        .fail(function (data) {
          console.error(data);
        });
    }
  }
  //TOGGLE PARA MOSTRAR PRODUCTOS
  $("#mostrarMasPendientes").click(function () {
    $("#ProductosPendientes").toggle();
  });
  $("#mostrarMasAprobados").click(function () {
    $("#ProductosAprobados").toggle();
  });
});
let vista_preliminarMetPago = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img-foto-metodo");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  };

  leer_img.readAsDataURL(event.target.files[0]);
};
