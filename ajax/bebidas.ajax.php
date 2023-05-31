<?php 

require_once "../controlador/bebidas.controlador.php";
require_once "../modelo/bebidas.modelo.php";




class AjaxBebidas{

    public $idBebida;

    public function ajaxEditarBebidas(){

        $item = "idBebida";
        $valor = $this->idBebida;

        $respuesta = ctrBebidas::ctrMostrarBebidas1($item,$valor);

        echo json_encode($respuesta);

    }



    public $idEliminar;
    public $rutaFoto;

     public function ajaxEliminarBebidas(){

        $respuesta = ctrBebidas::ctrEliminarBebidas($this->idEliminar , $this->rutaFoto);

       echo $respuesta;
     

    }


}





//editar usuario

if(isset($_POST["idBebida"])){

$editar = new AjaxBebidas();
$editar->idBebida = $_POST["idBebida"];
$editar->ajaxEditarBebidas();


}




//eliminar usuario

if(isset($_POST["idBebidaE"])){

$eliminar = new AjaxBebidas();
$eliminar->idEliminar = $_POST["idBebidaE"];
$eliminar->rutaFoto = $_POST["rutaFoto"];
$eliminar->ajaxEliminarBebidas();

}



?>