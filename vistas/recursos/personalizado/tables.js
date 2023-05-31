//DataTable Roles
$(function () {
  $("#tablaRoles")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#tablaRoles_wrapper .col-md-6:eq(0)");
});

//DataTable Usuarios
$(function () {
  $("#tablaUsuarios")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#tablaUsuarios_wrapper .col-md-6:eq(0)");
});

//DataTable Platillos
$(function () {
  $("#tablaPlatillos")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#tablaPlatillos_wrapper .col-md-6:eq(0)");
});

//DataTable Bebidas
$(function () {
  $("#tablaBebidas")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#tablaBebidas_wrapper .col-md-6:eq(0)");
});

//DataTable Postres
$(function () {
  $("#tablaPostres")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#tablaPostres_wrapper .col-md-6:eq(0)");
});
