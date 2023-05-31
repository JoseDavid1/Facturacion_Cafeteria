<?php 
//session_start();
require_once "conexion.php";


 if(isset($_SESSION["idBackend"])){

     $admin=ctrUsuarios::ctrMostrarUsuarios1("id", $_SESSION["idBackend"]);

 }


class mdlBebidas{


    static public function mdlMostrarBebidasl($tabla , $item , $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

       $stmt-> close();

        $stmt = null;

}

    static public function mdlMostrarBebidas($tabla){

	        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

            $stmt-> close();

	    	$stmt = null;

    }


    static public function MdlMostrarBebidas1($tabla,$item ,$valor){


        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");


        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

        $stmt -> close();

		$stmt = null;

    }


    // static public function MdlMostrarPlatillos2($tabla){


	//         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

	// 		$stmt -> execute();

    //         $result = $stmt->fetch_assoc();

    //         return $result;	

    //         $stmt-> close();

	//     	$stmt = null;

    // }

	static public function mdlguardarBebidas($tabla, $datos){

        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(nombreBebida , descripcionBebida , ingredientesBebida , precio_costoBebida , precio_ventaBebida, fotoBebida) VALUES (:NOMBRE_b , :DESC_b , :INGRED_b , :PRECIO_b , :VENTA_b, :FOTO_b )");


        $stmt->bindParam(":NOMBRE_b", $datos["nom_bebida"], PDO::PARAM_STR);
        $stmt->bindParam(":DESC_b", $datos["desc_bebida"], PDO::PARAM_STR);
        $stmt->bindParam(":INGRED_b", $datos["ingred_bebida"], PDO::PARAM_STR);
        $stmt->bindParam(":PRECIO_b", $datos["costo_bebida"], PDO::PARAM_STR);
		$stmt->bindParam(":VENTA_b", $datos["venta_bebida"], PDO::PARAM_STR);
        $stmt->bindParam(":FOTO_b", $datos["foto_bebida"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{

            echo "error";
        }

        $stmt->close();
		$stmt = null;		

	}




    static public function mdlEditarBebidas($tabla , $datos){


        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET nombreBebida=:NOM_E , descripcionBebida=:DESC_E , ingredientesBebida=:INGRED_E, precio_costoBebida=:COSTO_E , precio_ventaBebida=:VENTA_E , fotoBebida=:IMG_E  WHERE idBebida=:IDE");


         $stmt->bindParam(":IDE", $datos["id_bebidaE"], PDO::PARAM_INT);
         $stmt->bindParam(":NOM_E", $datos["nom_bebidaE"], PDO::PARAM_STR);
         $stmt->bindParam(":DESC_E", $datos["desc_bebidaE"], PDO::PARAM_STR);
         $stmt->bindParam(":INGRED_E", $datos["ingred_bebidaE"], PDO::PARAM_STR);
         $stmt->bindParam(":COSTO_E", $datos["costo_bebidaE"], PDO::PARAM_STR);
         $stmt->bindParam(":VENTA_E", $datos["venta_bebidaE"], PDO::PARAM_STR);
         $stmt->bindParam(":IMG_E", $datos["foto_bebidaE"], PDO::PARAM_STR);


        if($stmt -> execute()){

			return "ok";

		}else{

			echo "error";

		}

		$stmt-> close();

		$stmt = null;

    }
    
    

    static public function mdlEliminarBebidas($tabla , $id){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idBebida =:id");

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