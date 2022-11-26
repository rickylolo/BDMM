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
  // Registro de categorias
  //-------------------------ADMIN----------------------------
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
        alert("Categoria insertada correctamente");
      })
      .fail(function (data) {
        console.error(data);
      });
  }
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
