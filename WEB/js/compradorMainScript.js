$(document).ready(function () {
  cargarProductosAprobados();

  //PRODUCTOS VENDEDOR
  function cargarProductosAprobados() {
    $.ajax({
      type: "POST",
      data: { funcion: "getProductos" },
      url: "php/producto_API.php",
    })
      .done(function (data) {
        var items = JSON.parse(data);
        for (let i = 0; i < items.length; i++) {}
      })
      .fail(function (data) {
        console.error(data);
      });
  }
});
