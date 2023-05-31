<?php 

require_once "../controlador/platillos.controlador.php";
require_once "../modelo/platillos.modelo.php";




class AjaxPlatillos{

    public $idPlatillo;

    public function ajaxEditarPlatillos(){

        $item = "idPlatillo";
        $valor = $this->idPlatillo;

        $respuesta = ctrPlatillos::ctrMostrarPlatillos1($item,$valor);

        echo json_encode($respuesta);

    }



    public $idEliminar;
    public $rutaFoto;

     public function ajaxEliminarPlatillos(){

        $respuesta = ctrPlatillos::ctrEliminarPlatillos($this->idEliminar , $this->rutaFoto);

       echo $respuesta;
     

    }


}





//editar usuario

if(isset($_POST["idPlatillo"])){

$editar = new AjaxPlatillos();
$editar->idPlatillo = $_POST["idPlatillo"];
$editar->ajaxEditarPlatillos();


}




//eliminar usuario

if(isset($_POST["idPlatilloE"])){

$eliminar = new AjaxPlatillos();
$eliminar->idEliminar = $_POST["idPlatilloE"];
$eliminar->rutaFoto = $_POST["rutaFoto"];
$eliminar->ajaxEliminarPlatillos();

}



?>