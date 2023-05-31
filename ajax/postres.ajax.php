<?php 

require_once "../controlador/postres.controlador.php";
require_once "../modelo/postres.modelo.php";




class AjaxPostres{

    public $idPostre;

    public function ajaxEditarPostres(){

        $item = "idPostre";
        $valor = $this->idPostre;

        $respuesta = ctrPostres::ctrMostrarPostres1($item,$valor);

        echo json_encode($respuesta);

    }



    public $idEliminar;
    public $rutaFoto;

     public function ajaxEliminarPostres(){

        $respuesta = ctrPostres::ctrEliminarPostres($this->idEliminar , $this->rutaFoto);

       echo $respuesta;
     

    }


}





//editar postre

if(isset($_POST["idPostre"])){

$editar = new AjaxPostres();
$editar->idPostre = $_POST["idPostre"];
$editar->ajaxEditarPostres();

}




//eliminar postre

if(isset($_POST["idPostreE"])){

$eliminar = new AjaxPostres();
$eliminar->idEliminar = $_POST["idPostreE"];
$eliminar->rutaFoto = $_POST["rutaFoto"];
$eliminar->ajaxEliminarPostres();

}



?>