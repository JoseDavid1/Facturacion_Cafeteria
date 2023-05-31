/*=============================================
Subir imagen temporal platillos
=============================================*/

$("input[name='subirImgplatillo']").change(function () {
  var imagen = this.files[0];

  //VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $("input[name='subirImgplatillo']").val("");

    new swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $("input[name='subirImgplatillo']").val("");

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

      $(".previsualizarImgplatillos").attr("src", rutaImagen);
    });
  }
});

/*=============================================
Subir imagen temporal editar platillos
=============================================*/

$("input[name='subirImgplatillosE']").change(function () {
  var imagen = this.files[0];

  //VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $("input[name='subirImgplatillosE']").val("");

    new swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $("input[name='subirImgplatillosE']").val("");

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

      $(".previsualizarImgplatillos").attr("src", rutaImagen);
    });
  }
});

/*=============================================
Editar Platillo
=============================================*/

$(".tablaPlatillos").on("click", ".btnEditarPlatillo", function () {
  var idPlatillo = $(this).attr("idPlatillo");

  //console.log(idUsuario);

  var datos = new FormData();

  datos.append("idPlatillo", idPlatillo);

  $.ajax({
    url: "ajax/platillos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idPlatilloE").val(respuesta["idPlatillo"]);
      $("#nom_platillosE").val(respuesta["nombrePlatillo"]);
      $("#desc_platillosE").val(respuesta["descripcionPlatillo"]);
      $("#ingred_platillosE").val(respuesta["ingredientesPlatillo"]);
      $("#costo_platilloE").val(respuesta["precio_costoPlatillo"]);
      $("#venta_platilloE").val(respuesta["precio_ventaPlatillo"]);
      $("#fotoActualPE").val(respuesta["fotoPlatillo"]);
      $(".previsualizarImgplatillos").attr("src", respuesta["fotoPlatillo"]);
      $('input[name="subirImgplatilloE"]').val(respuesta["fotoPlatillo"]);
    },
  });
});

/*=============================================
Eliminar Platillo
=============================================*/

$(document).on("click", ".eliminarPlatillo", function () {
  var idPlatillo = $(this).attr("idPlatilloE");
  var rutaFoto = $(this).attr("rutaFoto");

  new swal({
    title: "¿Está seguro de eliminar este platillo?",
    text: "¡Si no lo está puede cancelar la acción!",
    //type: "warning",
    icon: "error",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar platillo!",
  }).then(function (result) {
    if (result.value) {
      var datos = new FormData();
      datos.append("idPlatilloE", idPlatillo);
      datos.append("rutaFoto", rutaFoto);

      $.ajax({
        url: "ajax/platillos.ajax.php",
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
              text: "El platillo ha sido borrado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            }).then(function (result) {
              if (result.value) {
                window.location = "platillos";
              }
            });
          }
        },
      });
    }
  });
});
