let vista_preliminar2 = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img-foto2");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  };

  leer_img.readAsDataURL(event.target.files[0]);
};

$(document).ready(function () {
  // Funciones para cargar datos
  cargarDatosUser();
  cargarCategorias();

  //Prevenir que este evento cierre mi modal
  $(".CategoriaProducto").on("click", function (event) {
    event.preventDefault();

    $("#product-category").val($(this).text());
  });
  //Cargar mis datos
  // USUARIO
  function cargarDatosUser() {
    $.ajax({
      type: "POST",
      data: { funcion: "obtenerDataUsuario" },
      url: "php/user_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        // Datos de mi navbar
        document.getElementById("pfp").src =
          "data:image/jpeg;base64," + items[0].PFP;
        $("#miNombre").text(items[0].username);

        //Datos para editar mi perfil
        document.getElementById("img-foto").src =
          "data:image/jpeg;base64," + items[0].PFP;
        $("#E_email").val(items[0].email);
        $("#E_usuario").val(items[0].username);
        $("#E_names").val(items[0].nombreUsuario);
        $("#E_lastNameP").val(items[0].apellidoPaterno);
        $("#E_lastNameM").val(items[0].apellidoMaterno);
        $("#E_FechaNacimiento").val(items[0].fecha);
      })
      .fail(function (data) {
        console.error(data);
      });
  }
  // CATEGORIAS
  function cargarCategorias() {
    $.ajax({
      type: "POST",
      data: { funcion: "getCategorias" },
      url: "php/categoria_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        $("#misCategorias").empty();
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
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  //Editar Usuario
  //-------------------------CUALQUIER ROL----------------------------
  $("#ButtonActualizarPerfil").click(funcActualizarDatosPerfil);
  function funcActualizarDatosPerfil() {
    var form_data = new FormData();
    var file_data = $("#E_userIMG").prop("files")[0];
    var email = $("#E_email").val();
    var usuario = $("#E_usuario").val();
    var names = $("#E_names").val();
    var contrasenia = $("#E_contrasenia").val();
    var lastNameP = $("#E_lastNameP").val();
    var lastNameM = $("#E_lastNameM").val();
    var fechaNacimiento = $("#E_FechaNacimiento").val();

    form_data.append("file", file_data);
    form_data.append("funcion", "actualizarUser");
    form_data.append("email", email);
    form_data.append("usuario", usuario);
    form_data.append("contrasenia", contrasenia);
    form_data.append("names", names);
    form_data.append("lastNameP", lastNameP);
    form_data.append("lastNameM", lastNameM);
    form_data.append("fechaNacimiento", fechaNacimiento);
    $.ajax({
      url: "php/user_API.php",
      type: "POST",
      cache: false,
      contentType: false,
      data: form_data,
      dataType: "JSON",
      enctype: "multipart/form-data",
      processData: false,
    })
      .done(function (data) {
        console.log(data);
      })
      .fail(function (data) {
        // MANEJO DE ERRORES DEL SERVIDOR
        if (data.statusText == "OK" && data.status == 200) {
          alert("Perfil Actualizado Correctamente");
          $("#E_userIMG").val("");
          $("#E_email").val("");
          $("#E_usuario").val("");
          $("#E_names").val("");
          $("#E_lastNameP").val("");
          $("#E_lastNameM").val("");
          $("#E_Birthday").val("");
          $("#E_contrasenia").val("");
          cargarDatosUser();
        } else {
          alert("Algo ocurrió mal");
        }
      });
  }
});

//Vista previa editar perfil
let vista_preliminarEditarPerfil = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img-foto");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  };

  leer_img.readAsDataURL(event.target.files[0]);
};
