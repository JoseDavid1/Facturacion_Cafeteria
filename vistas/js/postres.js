/*=============================================
Subir imagen temporal postres
=============================================*/

$("input[name='subirImgpostres']").change(function () {
  var imagen = this.files[0];

  //VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $("input[name='subirImgpostres']").val("");

    new swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $("input[name='subirImgpostres']").val("");

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

      $(".previsualizarImgpostres").attr("src", rutaImagen);
    });
  }
});

/*=============================================
Subir imagen temporal editar POSTRES
=============================================*/

$("input[name='subirImgpostresE']").change(function () {
  var imagen = this.files[0];

  //VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $("input[name='subirImgpostresE']").val("");

    new swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $("input[name='subirImgpostresE']").val("");

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

      $(".previsualizarImgpostres").attr("src", rutaImagen);
    });
  }
});

/*=============================================
Editar Platillo
=============================================*/

$(".tablaPostres").on("click", ".btnEditarPostre", function () {
  var idPostre = $(this).attr("idPostre");

  //console.log(idUsuario);

  var datos = new FormData();

  datos.append("idPostre", idPostre);

  $.ajax({
    url: "ajax/postres.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idPostreE").val(respuesta["idPostre"]);
      $("#nom_postresE").val(respuesta["nombrePostre"]);
      $("#desc_postresE").val(respuesta["descripcionPostre"]);
      $("#ingred_postresE").val(respuesta["ingredientesPostre"]);
      $("#costo_postresE").val(respuesta["precio_costoPostre"]);
      $("#venta_postresE").val(respuesta["precio_ventaPostre"]);
      $("#fotoActualPTE").val(respuesta["fotoPostre"]);
      $(".previsualizarImgpostres").attr("src", respuesta["fotoPostre"]);
      $('input[name="subirImgpostresE"]').val(respuesta["fotoPostre"]);
    },
  });
});

/*=============================================
Eliminar Platillo
=============================================*/

$(document).on("click", ".eliminarPostre", function () {
  var idPostre = $(this).attr("idPostreE");
  var rutaFoto = $(this).attr("rutaFoto");

  new swal({
    title: "¿Está seguro de eliminar este postre?",
    text: "¡Si no lo está puede cancelar la acción!",
    //type: "warning",
    icon: "error",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar postre!",
  }).then(function (result) {
    if (result.value) {
      var datos = new FormData();
      datos.append("idPostreE", idPostre);
      datos.append("rutaFoto", rutaFoto);

      $.ajax({
        url: "ajax/postres.ajax.php",
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
              text: "El postre ha sido borrado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            }).then(function (result) {
              if (result.value) {
                window.location = "postres";
              }
            });
          }
        },
      });
    }
  });
});
