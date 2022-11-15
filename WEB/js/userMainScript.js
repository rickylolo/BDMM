$(document).ready(function () {
  // Registro de usuarios con dataform
  //-------------------------COMPRADOR----------------------------
  $("#ButtonRegistro").click(funcRegistrarUsuarioComprador);
  function funcRegistrarUsuarioComprador() {
    var form_data = new FormData();
    var file_data = $("#userIMG").prop("files")[0];
    var email = $("#email").val();
    var usuario = $("#usuario").val();
    var contrasenia = $("#contrasenia").val();
    var names = $("#names").val();
    var lastNameP = $("#lastNameP").val();
    var lastNameM = $("#lastNameM").val();
    var fechaNacimiento = $("#Birthday").val();
    var genero = $("#genero").val();
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
      data: form_data,
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
        console.error(data);
      });
    alert("Comprador Registrado Correctamente");
  }

  //-------------------------VENDEDOR----------------------------
  $("#ButtonRegistroVendedor").click(funcRegistrarUsuarioVendedor);
  function funcRegistrarUsuarioVendedor() {
    var form_data = new FormData();
    var file_data = $("#userIMG").prop("files")[0];
    var email = $("#email").val();
    var usuario = $("#usuario").val();
    var contrasenia = $("#contrasenia").val();
    var names = $("#names").val();
    var lastNameP = $("#lastNameP").val();
    var lastNameM = $("#lastNameM").val();
    var fechaNacimiento = $("#Birthday").val();
    var genero = $("#genero").val();
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
      data: form_data,
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
        console.error(data);
      });
    alert("Vendedor Registrado Correctamente");
  }
});
