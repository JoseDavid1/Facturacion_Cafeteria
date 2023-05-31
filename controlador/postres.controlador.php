<?php 


class ctrPostres{



	static public function ctrMostrarPostres(){

			$tabla="postres";
			$respuesta=mdlPostres::mdlMostrarPostres($tabla);
            return $respuesta;

	}



	static public function ctrMostrarPostres1($item, $valor){

		$tabla = "postres";

		$respuesta = mdlPostres::MdlMostrarPostres1($tabla, $item, $valor);

		return $respuesta;
	}

	

	static public function ctrGuardarPostres(){

		if(isset($_POST["nom_postres"])){

			if(isset($_FILES["subirImgpostres"]["tmp_name"]) && !empty($_FILES["subirImgpostres"]["tmp_name"])){
				
				list($ancho, $alto) = getimagesize($_FILES["subirImgpostres"]["tmp_name"]);
				
				$nuevoAncho = 480;
				$nuevoAlto = 382;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "vistas/imagenes/menu";

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["subirImgpostres"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["subirImgpostres"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	

				}   
				
				
				else if($_FILES["subirImgpostres"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["subirImgpostres"]["tmp_name"]);						

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


				$datos =array("nom_postre"=>$_POST["nom_postres"],
					"desc_postre"=>$_POST["desc_postres"],
					"ingred_postre"=>$_POST["ingred_postres"],
					"costo_postre"=>$_POST["costo_postre"],
				 	"venta_postre"=>$_POST["venta_postre"],
				   	"foto_postre"=>$ruta);

		   			echo "</pre>";  print_r($datos); echo "</pre>";


					$tabla="postres";
					$respuesta=mdlPostres::mdlguardarPostres($tabla,$datos);


					if($respuesta == "ok"){

						echo'<script>

						new swal({
								icon: "success",
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El postre ha sido ingresado correctamente",
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




	static public function ctrEditarpostres(){

		if(isset($_POST["idPostreE"])){

			if(isset($_FILES["subirImgpostresE"]["tmp_name"]) && !empty($_FILES["subirImgpostresE"]["tmp_name"])){

				
				list($ancho, $alto) = getimagesize($_FILES["subirImgpostresE"]["tmp_name"]);

					$nuevoAncho = 480;
					$nuevoAlto = 382;

				   /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN*/					

					$directorio = "vistas/imagenes/menu";
					
					/*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD*/

                  
                    if(isset($_POST["fotoActualPTE"])){
                        
                        unlink($_POST["fotoActualPTE"]);

                    }


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP*/

					if($_FILES["subirImgpostresE"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["subirImgpostresE"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutas);	

					}

						else if($_FILES["subirImgpostresE"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);

						$rutas = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgpostresE"]["tmp_name"]);						

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

					  $r = $_POST["fotoActualPTE"];

					}



					$datos =array(  "id_postreE" => $_POST["idPostreE"],
									"nom_postreE"=>$_POST["nom_postresE"],
									"desc_postreE"=>$_POST["desc_postresE"],
									"ingred_postreE"=>$_POST["ingred_postresE"],
									"costo_postreE"=>$_POST["costo_postresE"],
									"venta_postreE"=>$_POST["venta_postresE"],
									"foto_postreE"=> $r);



						$tabla="postres";

						$respuesta = mdlPostres::mdlEditarPostres($tabla, $datos);

					//	echo "<pre>"; print_r($datos); echo "<pre>";
					
						if($respuesta == "ok"){

						echo'<script>

						new swal({
								icon: "success",
								type: "success",
							  	title: "¡CORRECTO!",
							  	text: "El postre ha sido editado correctamente",
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

	

	static public function  ctrEliminarPostres($id ,$rutafoto){


		unlink("../".$rutafoto);		

		$tabla = "postres";

		$respuesta = mdlPostres::mdlEliminarPostres($tabla, $id);

		return $respuesta;

	}


}


?>
