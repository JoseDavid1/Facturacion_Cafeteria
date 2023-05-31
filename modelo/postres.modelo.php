<?php 
//session_start();
require_once "conexion.php";


 if(isset($_SESSION["idBackend"])){

     $admin=ctrUsuarios::ctrMostrarUsuarios1("id", $_SESSION["idBackend"]);

 }


class mdlPostres{


    static public function mdlMostrarPlatillosl($tabla , $item , $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

       $stmt-> close();

        $stmt = null;

}

    static public function mdlMostrarPostres($tabla){

	        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

            $stmt-> close();

	    	$stmt = null;

    }


    static public function mdlMostrarPostres1($tabla,$item ,$valor){


        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");


        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

        $stmt -> close();

		$stmt = null;

    }



	static public function mdlguardarPostres($tabla, $datos){

        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(nombrePostre , descripcionPostre , ingredientesPostre , precio_costoPostre , precio_ventaPostre, fotoPostre) VALUES (:NOMBRE_p , :DESC_p , :INGRED_p , :PRECIO_p , :VENTA_p, :FOTO_p )");


        $stmt->bindParam(":NOMBRE_p", $datos["nom_postre"], PDO::PARAM_STR);
        $stmt->bindParam(":DESC_p", $datos["desc_postre"], PDO::PARAM_STR);
        $stmt->bindParam(":INGRED_p", $datos["ingred_postre"], PDO::PARAM_STR);
        $stmt->bindParam(":PRECIO_p", $datos["costo_postre"], PDO::PARAM_STR);
		$stmt->bindParam(":VENTA_p", $datos["venta_postre"], PDO::PARAM_STR);
        $stmt->bindParam(":FOTO_p", $datos["foto_postre"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{

            echo "error";
        }

        $stmt->close();
		$stmt = null;		

	}




    static public function mdlEditarPostres($tabla , $datos){


        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET nombrePostre=:NOM_PT , descripcionPostre=:DESC_PT , ingredientesPostre=:INGRED_PT, precio_costoPostre=:COSTO_PT , precio_ventaPostre=:VENTA_PT , fotoPostre=:IMG_PT  WHERE idPostre=:IDPT");


         $stmt->bindParam(":IDPT", $datos["id_postreE"], PDO::PARAM_INT);
         $stmt->bindParam(":NOM_PT", $datos["nom_postreE"], PDO::PARAM_STR);
         $stmt->bindParam(":DESC_PT", $datos["desc_postreE"], PDO::PARAM_STR);
         $stmt->bindParam(":INGRED_PT", $datos["ingred_postreE"], PDO::PARAM_STR);
         $stmt->bindParam(":COSTO_PT", $datos["costo_postreE"], PDO::PARAM_STR);
         $stmt->bindParam(":VENTA_PT", $datos["venta_postreE"], PDO::PARAM_STR);
         $stmt->bindParam(":IMG_PT", $datos["foto_postreE"], PDO::PARAM_STR);


        if($stmt -> execute()){

			return "ok";

		}else{

			echo "error";

		}

		$stmt-> close();

		$stmt = null;

    }
    
    

    static public function mdlEliminarPostres($tabla , $id){


        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPostre =:id");

        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);


        if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;


    }



}

?>