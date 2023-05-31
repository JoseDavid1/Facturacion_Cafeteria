<?php 
//session_start();
require_once "conexion.php";


 if(isset($_SESSION["idBackend"])){

     $admin=ctrUsuarios::ctrMostrarUsuarios1("id", $_SESSION["idBackend"]);

 }


class mdlPlatillos{


    static public function mdlMostrarPlatillosl($tabla , $item , $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

       $stmt-> close();

        $stmt = null;

}

    static public function mdlMostrarPlatillos($tabla){

	        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

            $stmt-> close();

	    	$stmt = null;

    }


    static public function MdlMostrarPlatillos1($tabla,$item ,$valor){


        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");


        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

        $stmt -> close();

		$stmt = null;

    }



	static public function mdlguardarPlatillos($tabla, $datos){

        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(nombrePlatillo , descripcionPlatillo , ingredientesPlatillo , precio_costoPlatillo , precio_ventaPlatillo, fotoPlatillo) VALUES (:NOMBRE_p , :DESC_p , :INGRED_p , :PRECIO_p , :VENTA_p, :FOTO_p )");


        $stmt->bindParam(":NOMBRE_p", $datos["nom_platillo"], PDO::PARAM_STR);
        $stmt->bindParam(":DESC_p", $datos["desc_platillo"], PDO::PARAM_STR);
        $stmt->bindParam(":INGRED_p", $datos["ingred_platillo"], PDO::PARAM_STR);
        $stmt->bindParam(":PRECIO_p", $datos["costo_platillo"], PDO::PARAM_STR);
		$stmt->bindParam(":VENTA_p", $datos["venta_platillo"], PDO::PARAM_STR);
        $stmt->bindParam(":FOTO_p", $datos["foto"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{

            echo "error";
        }

        $stmt->close();
		$stmt = null;		

	}




    static public function mdlEditarPlatillos($tabla , $datos){


        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET nombrePlatillo=:NOM_E , descripcionPlatillo=:DESC_E , ingredientesPlatillo=:INGRED_E, precio_costoPlatillo=:COSTO_E , precio_ventaPlatillo=:VENTA_E , fotoPlatillo=:IMG_E  WHERE idPlatillo=:IDE");


         $stmt->bindParam(":IDE", $datos["id_platilloE"], PDO::PARAM_INT);
         $stmt->bindParam(":NOM_E", $datos["nom_platilloE"], PDO::PARAM_STR);
         $stmt->bindParam(":DESC_E", $datos["desc_platilloE"], PDO::PARAM_STR);
         $stmt->bindParam(":INGRED_E", $datos["ingred_platilloE"], PDO::PARAM_STR);
         $stmt->bindParam(":COSTO_E", $datos["costo_platilloE"], PDO::PARAM_STR);
         $stmt->bindParam(":VENTA_E", $datos["venta_platilloE"], PDO::PARAM_STR);
         $stmt->bindParam(":IMG_E", $datos["foto_platilloE"], PDO::PARAM_STR);


        if($stmt -> execute()){

			return "ok";

		}else{

			echo "error";

		}

		$stmt-> close();

		$stmt = null;

    }
    
    

    static public function mdlEliminarPlatillos($tabla , $id){


        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPlatillo =:id");

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