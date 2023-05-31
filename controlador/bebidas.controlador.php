<?php 


class ctrBebidas{

	static public function ctrMostrarBebidas(){

			$tabla="bebidas";
			$respuesta=mdlBebidas::mdlMostrarBebidas($tabla);
            return $respuesta;

	}



	static public function ctrMostrarBebidas1($item, $valor){

		$tabla = "bebidas";

		$respuesta = mdlBebidas::MdlMostrarBebidas1($tabla, $item, $valor);

		return $respuesta;
	}


	

	static public function ctrGuardarBebidas(){

		if(isset($_POST["nom_bebidas"])){

			if(isset($_FILES["subirImgbebidas"]["tmp_name"]) && !empty($_FILES["subirImgbebidas"]["tmp_name"])){
				
				list($ancho, $alto) = getimagesize($_FILES["subirImgbebidas"]["tmp_name"]);
				
				$nuevoAncho = 480;
				$nuevoAlto = 382;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "vistas/imagenes/menu";

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["subirImgbebidas"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["subirImgbebidas"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	

				}   
				
				
				else if($_FILES["subirImgbebidas"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["subirImgbebidas"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
		
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

				else{

					echo'<script>

						new swal({
								  icon: "error",
								  type:"error",
								  title: "¡CORREGIR!",
								  text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
									history.back();
								  } 
						});

					</script>';

					return;

				}
				


				$datos =array("nom_bebida"=>$_POST["nom_bebidas"],
					"desc_bebida"=>$_POST["desc_bebidas"],
					"ingred_bebida"=>$_POST["ingred_bebidas"],
					"costo_bebida"=>$_POST["costo_bebidas"],
				 	"venta_bebida"=>$_POST["venta_bebidas"],
				   	"foto_bebida"=>$ruta);

		   			echo "</pre>";  print_r($datos); echo "</pre>";


					$tabla="bebidas";
					$respuesta=mdlBebidas::mdlguardarBebidas($tabla,$datos);


					if($respuesta == "ok"){

						echo'<script>

						new swal({
								icon: "success",
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "La bebida ha sido ingresada correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';

				}else{

                    echo "<div class='alert alert-danger mt-3 small'>registro fallido</div>";
                }

			}
		}
	}




	static public function ctrEditarbebidas(){

		if(isset($_POST["idBebidaE"])){

			if(isset($_FILES["subirImgbebidaE"]["tmp_name"]) && !empty($_FILES["subirImgbebidaE"]["tmp_name"])){

				
				list($ancho, $alto) = getimagesize($_FILES["subirImgbebidaE"]["tmp_name"]);

					$nuevoAncho = 480;
					$nuevoAlto = 382;

				   /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN*/					

					$directorio = "vistas/imagenes/menu";
					
					/*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD*/

                  
                    if(isset($_POST["fotoActualBE"])){
                        
                        unlink($_POST["fotoActualBE"]);

                    }


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP*/

					if($_FILES["subirImgbebidaE"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["subirImgbebidaE"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutas);	

					}

						else if($_FILES["subirImgbebidaE"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgbebidaE"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
			
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutas);

					}else{

						echo'<script>

							new swal({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					}
				}

					if($rutas != ""){

                      $r= $rutas;

					}else{

					  $r = $_POST["fotoActualBE"];

					}


					// if($_POST["pass_userE"] != ""){

					// 	$password = crypt($_POST["pass_userE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 

					// }else{

					// 	$password = $_POST["pass_userActualE"];

					// }



					$datos =array(  "id_bebidaE" => $_POST["idBebidaE"],
									"nom_bebidaE"=>$_POST["nom_bebidaE"],
									"desc_bebidaE"=>$_POST["desc_bebidaE"],
									"ingred_bebidaE"=>$_POST["ingred_bebidaE"],
									"costo_bebidaE"=>$_POST["costo_bebidaE"],
									"venta_bebidaE"=>$_POST["venta_bebidaE"],
									"foto_bebidaE"=> $r);



						$tabla="bebidas";

						$respuesta = mdlBebidas::mdlEditarBebidas($tabla, $datos);

					//	echo "<pre>"; print_r($datos); echo "<pre>";
					
						if($respuesta == "ok"){

						echo'<script>

						new swal({
								icon: "success",
								type: "success",
							  	title: "¡CORRECTO!",
							  	text: "La bebida ha sido editada correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';

					}else{

                    	echo "<div class='alert alert-danger mt-3 small'>Edición fallida</div>";
                	}	
								
			
		}

	}

	

	static public function  ctrEliminarBebidas($id ,$rutafoto){


		unlink("../".$rutafoto);		

		$tabla = "bebidas";

		$respuesta = mdlBebidas::mdlEliminarBebidas($tabla, $id);

		return $respuesta;

	}


}


?>
