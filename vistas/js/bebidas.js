/*=============================================
Subir imagen temporal bebidas
=============================================*/

$("input[name='subirImgbebidas']").change(function () {
  var imagen = this.files[0];

  //VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $("input[name='subirImgbebidas']").val("");

    new swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $("input[name='subirImgbebidas']").val("");

    new swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizarImgbebida").attr("src", rutaImagen);
    });
  }
});

/*=============================================
Subir imagen temporal editar bebidas
=============================================*/

$("input[name='subirImgbebidaE']").change(function () {
  var imagen = this.files[0];

  //VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $("input[name='subirImgbebidaE']").val("");

    new swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $("input[name='subirImgbebidaE']").val("");

    new swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizarImgbebida").attr("src", rutaImagen);
    });
  }
});

/*=============================================
Editar Bebida
=============================================*/

$(".tablaBebidas").on("click", ".btnEditarBebida", function () {
  var idBebida = $(this).attr("idBebida");

  //console.log(idUsuario);

  var datos = new FormData();

  datos.append("idBebida", idBebida);

  $.ajax({
    url: "ajax/bebidas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idBebidaE").val(respuesta["idBebida"]);
      $("#nom_bebidaE").val(respuesta["nombreBebida"]);
      $("#desc_bebidaE").val(respuesta["descripcionBebida"]);
      $("#ingred_bebidaE").val(respuesta["ingredientesBebida"]);
      $("#costo_bebidaE").val(respuesta["precio_costoBebida"]);
      $("#venta_bebidaE").val(respuesta["precio_ventaBebida"]);
      $("#fotoActualBE").val(respuesta["fotoBebida"]);
      $(".previsualizarImgbebida").attr("src", respuesta["fotoBebida"]);
      $('input[name="subirImgbebidaE"]').val(respuesta["fotoBebida"]);
    },
  });
});

/*=============================================
Eliminar Bebida
=============================================*/

$(document).on("click", ".eliminarBebida", function () {
  var idBebida = $(this).attr("idBebidaE");
  var rutaFoto = $(this).attr("rutaFoto");

  new swal({
    title: "¿Está seguro de eliminar esta bebida?",
    text: "¡Si no lo está puede cancelar la acción!",
    //type: "warning",
    icon: "error",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar bebida!",
  }).then(function (result) {
    if (result.value) {
      var datos = new FormData();
      datos.append("idBebidaE", idBebida);
      datos.append("rutaFoto", rutaFoto);

      $.ajax({
        url: "ajax/bebidas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
          console.log(respuesta);

          if (respuesta == "ok") {
            new swal({
              //type: "success",
              icon: "success",
              title: "¡CORRECTO!",
              text: "La bebida ha sido borrada correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            }).then(function (result) {
              if (result.value) {
                window.location = "bebidas";
              }
            });
          }
        },
      });
    }
  });
});
