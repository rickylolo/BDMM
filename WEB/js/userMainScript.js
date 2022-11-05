$(document).ready(function () {


    // Registro de usuarios con dataform
    //-------------------------COMPRADOR----------------------------
  $("#ButtonRegistro").click(funcRegistrarUsuarioComprador);
  function funcRegistrarUsuarioComprador()
  {
    var form_data = new FormData();
    var file_data = $("#userIMG").prop("files")[0];
    var usuario =$('#usuario').val();
    var contrasenia=$('#contrasenia').val();
    var names=$('#names').val();
    var lastName=$('#lastName').val();
    var email=$('#email').val();
    var telefono=$('#telefono').val();
    form_data.append("file", file_data);
    form_data.append("funcion", "registrarUsuario");
    form_data.append("usuario", usuario);
    form_data.append("contrasenia", contrasenia);
    form_data.append("names", names);
    form_data.append("lastName", lastName);
    form_data.append("email", email);
    form_data.append("telefono", telefono);
$.ajax({
  url: 'php/user_API.php',
  type: 'POST',
  data:form_data,
    cache: false,
    contentType: false,
    data: form_data,
    dataType: 'JSON',
    enctype: 'multipart/form-data',
    processData: false

})
.done(function (data) {
  console.log(data);
  alert("Registro correcto");
})
.fail(function (data) {
  console.error(data);
}); 
  }


  
});