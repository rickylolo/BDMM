let vista_preliminar = (event) => {
  let leer_img = new FileReader();
  let id_img = document.getElementById("img-foto");

  leer_img.onload = () => {
    if (leer_img.readyState == 2) {
      id_img.src = leer_img.result;
    }
  };

  leer_img.readAsDataURL(event.target.files[0]);
};

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
  $(".CategoriaProducto").on("click", function (event) {
    event.preventDefault();

    $("#product-category").val($(this).text());
  });
  //Cargar mis datos
});
