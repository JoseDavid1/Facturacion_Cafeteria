<?php

$usuarios = ctrUsuarios::ctrMostrarUsuarios();

$roles = ctrRoles::ctrMostrarRoles2();

$platillos = ctrPlatillos::ctrMostrarPlatillos();

$bebidas = ctrBebidas::ctrMostrarBebidas();

$postres = ctrPostres::ctrMostrarPostres();

//var_dump($usuarios);

//echo "</pre>";  print_r($roles); echo "</pre>";

 if(isset($_SESSION["idBackend"])){

  $admin=ctrUsuarios::ctrMostrarUsuarios1("id", $_SESSION["idBackend"]);

  //var_dump($_SESSION["idBackend"]);
}


?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cafetería Chimazat</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vistas/recursos/plugins/fontawesome-free/css/all.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/recursos/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/recursos/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/recursos/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">    
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/recursos/dist/css/adminlte.min.css" />
    <!-- Login Style -->
    <link href="vistas/recursos/personalizado/login.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <script src="vistas/recursos/plugins/sweetalert2/sweetalert2.all.min.js"></script>

  </head>

  <?php if(!isset($_SESSION["validarSession"])):

include "paginas/login.php";

?>

<?php else: ?>


  <body class="hold-transition sidebar-mini">

    <div class="wrapper">


      <!-- Llamamos al header -->
      <?php include "modulos/header.php"; ?>

      <!-- Left side column sidebar -->
      <?php include "modulos/menu.php"; ?>

      <?php
      if(isset($_GET["pagina"])){
        if($_GET["pagina"] == "carta" || $_GET["pagina"] == "postres" || $_GET["pagina"] == "bebidas" || $_GET["pagina"] == "platillos" || $_GET["pagina"] == "usuarios" || $_GET["pagina"]== "roles" || $_GET["pagina"]== "salir"){
          include "paginas/" . $_GET["pagina"] . ".php";
        }
      }

    ?>




      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      <!-- /.control-sidebar -->

            <!-- Footer -->
            <?php include "modulos/footer.php"; ?>

      </div>
     <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- Io Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- jQuery -->
    <script src="vistas/recursos/plugins/jquery/jquery.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="vistas/recursos/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- Filterizr-->
    <script src="vistas/recursos/plugins/filterizr/jquery.filterizr.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="vistas/recursos/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="vistas/recursos/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/recursos/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vistas/recursos/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="vistas/recursos/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vistas/recursos/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="vistas/recursos/plugins/jszip/jszip.min.js"></script>
    <script src="vistas/recursos/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="vistas/recursos/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="vistas/recursos/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="vistas/recursos/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="vistas/recursos/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/recursos/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/recursos/dist/js/adminlte.min.js"></script>
    <!-- Sweet Alert -->
    <script src="vistas/recursos/plugins/sweetalert2/sweetalert2.all.min.js"></script>
     <!-- Sweet Alert -->
     <script src="vistas/recursos/personalizado/filtros.js"></script>
     <!-- DataTable -->
     <script src="vistas/recursos/personalizado/tables.js"></script>     
    <!-- JS personalizados -->
    <script src="vistas/js/usuarios.js"></script>
    <script src="vistas/js/roles.js"></script>
    <script src="vistas/js/platillos.js"></script>
    <script src="vistas/js/bebidas.js"></script>
    <script src="vistas/js/postres.js"></script>

  </body>
  <?php endif ?>
</html>
     