<?php
    include "controlador/plantilla.controlador.php";
    include "controlador/usuarios.controlador.php";
    include "controlador/roles.controlador.php";
    include "controlador/platillos.controlador.php";
    include "controlador/bebidas.controlador.php";
    include "controlador/postres.controlador.php";

    include "modelo/usuarios.modelo.php";
    include "modelo/roles.modelo.php";
    include "modelo/platillos.modelo.php";
    include "modelo/bebidas.modelo.php";
    include "modelo/postres.modelo.php";

    $plantilla = new controladorPlantilla();
    $plantilla->ctrPlantilla();
?>

