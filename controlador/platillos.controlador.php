<?php 


class ctrPlatillos{



	// static public function ctrIngresoUsuarios(){

	// 	if(isset($_POST["log_user"])){

	// 		$encriptarPass=crypt($_POST["log_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

	// 		$tabla="usuarios";
	// 		$item="usuario";
	// 		$valor=$_POST["log_user"];

	// 		$respuesta=mdlUsuarios::mdlMostrarUsuariosl($tabla , $item , $valor);

	// 		if($respuesta["usuario"] == $_POST["log_user"]  && $respuesta["pass"] == $encriptarPass){

	// 		$_SESSION["validarSession"] = "ok";
	// 		$_SESSION["idBackend"] = $respuesta["id"];

	// 					echo '<script>

	// 						window.location = "carta";

	// 			 		</script>';

	// 		}else{

	// 			echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";

	// 		}

	// 	}

	// }


	static public function ctrMostrarPlatillos(){

			$tabla="platillos";
			$respuesta=mdlPlatillos::mdlMostrarPlatillos($tabla);
            return $respuesta;

	}



	static public function ctrMostrarPlatillos1($item, $valor){

		$tabla = "platillos";

		$respuesta = mdlPlatillos::MdlMostrarPlatillos1($tabla, $item, $valor);

		return $respuesta;
	}

	
	static public function ctrMostrarPlatillos2(){

		$tabla="platillos";
		$respuesta=mdlPlatillos::MdlMostrarPlatillos2($tabla);
		return $respuesta;

	}

	

	static public function ctrGuardarPlatillos(){

		if(isset($_POST["nom_platillos"])){

			if(isset($_FILES["subirImgplatillo"]["tmp_name"]) && !empty($_FILES["subirImgplatillo"]["tmp_name"])){
				
				list($ancho, $alto) = getimagesize($_FILES["subirImgplatillo"]["tmp_name"]);
				
				$nuevoAncho = 480;
				$nuevoAlto = 382;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "vistas/imagenes/menu";

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["subirImgplatillo"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["subirImgplatillo"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	

				}   
				
				
				else if($_FILES["subirImgplatillo"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["subirImgplatillo"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
		
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

				else{

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



				// $encriptarPassword = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


				$datos =array("nom_platillo"=>$_POST["nom_platillos"],
					"desc_platillo"=>$_POST["desc_platillos"],
					"ingred_platillo"=>$_POST["ingred_platillos"],
					"costo_platillo"=>$_POST["costo_platillo"],
				 	"venta_platillo"=>$_POST["venta_platillo"],
				   	"foto"=>$ruta);

		   			echo "</pre>";  print_r($datos); echo "</pre>";


					$tabla="platillos";
					$respuesta=mdlPlatillos::mdlguardarPlatillos($tabla,$datos);


					if($respuesta == "ok"){

						echo'<script>

						new swal({
								icon: "success",
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El platillo ha sido ingresado correctamente",
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




	static public function ctrEditarplatillos(){

		if(isset($_POST["idPlatilloE"])){

			if(isset($_FILES["subirImgplatilloE"]["tmp_name"]) && !empty($_FILES["subirImgplatilloE"]["tmp_name"])){

				
				list($ancho, $alto) = getimagesize($_FILES["subirImgplatilloE"]["tmp_name"]);

					$nuevoAncho = 480;
					$nuevoAlto = 382;

				   /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN*/					

					$directorio = "vistas/imagenes/menu";
					
					/*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD*/

                  
                    if(isset($_POST["fotoActualPE"])){
                        
                        unlink($_POST["fotoActualPE"]);

                    }


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP*/

					if($_FILES["subirImgplatilloE"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["subirImgplatilloE"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutas);	

					}

						else if($_FILES["subirImgplatilloE"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgplatilloE"]["tmp_name"]);						

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

					  $r = $_POST["fotoActualPE"];

					}


					// if($_POST["pass_userE"] != ""){

					// 	$password = crypt($_POST["pass_userE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 

					// }else{

					// 	$password = $_POST["pass_userActualE"];

					// }



					$datos =array(  "id_platilloE" => $_POST["idPlatilloE"],
									"nom_platilloE"=>$_POST["nom_platillosE"],
									"desc_platilloE"=>$_POST["desc_platillosE"],
									"ingred_platilloE"=>$_POST["ingred_platillosE"],
									"costo_platilloE"=>$_POST["costo_platilloE"],
									"venta_platilloE"=>$_POST["venta_platilloE"],
									"foto_platilloE"=> $r);



						$tabla="platillos";

						$respuesta = mdlPlatillos::mdlEditarPlatillos($tabla, $datos);

					//	echo "<pre>"; print_r($datos); echo "<pre>";
					
						if($respuesta == "ok"){

						echo'<script>

						new swal({
								icon: "success",
								type: "success",
							  	title: "¡CORRECTO!",
							  	text: "El platillo ha sido editado correctamente",
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

	

	static public function  ctrEliminarPlatillos($id ,$rutafoto){


		unlink("../".$rutafoto);		

		$tabla = "platillos";

		$respuesta = mdlPlatillos::mdlEliminarPlatillos($tabla, $id);

		return $respuesta;

	}


}


?>
