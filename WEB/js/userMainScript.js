$(document).ready(function () {
  // Inicio de sesión
  $("#ButtonLogIn").click(funcIniciarSesion);
  function funcIniciarSesion() {
    var usuarioCorreo = $("#username").val();
    var pass = $("#password").val();
    $.ajax({
      url: "php/user_API.php",
      type: "POST",
      data: {
        funcion: "iniciarSesion",
        username: usuarioCorreo,
        password: pass,
      },
    })
      .done(function (data) {
        var items = JSON.parse(data);

        if (items.length == 0) {
          alert(
            "No existen usuarios con esas credenciales, intenta nuevamente"
          );
          return;
        }
        switch (items[0].rol) {
          case 1:
            window.location.replace("paginaAdmin.php");
            break;
          case 2:
            window.location.replace("paginaAdmin.php");
            break;
          case 3:
            window.location.replace("paginaVendedor.php");
            break;
          case 4:
            window.location.replace("mainPage.php");
            break;
        }
      })
      .fail(function (data) {
        console.error(data);
      });
  }

  // Registro de usuarios con dataform
  //-------------------------COMPRADOR----------------------------
  $("#ButtonRegistro").click(funcRegistrarUsuarioComprador);
  function funcRegistrarUsuarioComprador() {
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
    form_data.append("funcion", "registrarUsuarioComprador");
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

  //-------------------------VENDEDOR----------------------------
  $("#ButtonRegistroVendedor").click(funcRegistrarUsuarioVendedor);
  function funcRegistrarUsuarioVendedor() {
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
    form_data.append("funcion", "registrarUsuarioVendedor");
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
        alert("Registro de vendedor correctamente");
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
});
