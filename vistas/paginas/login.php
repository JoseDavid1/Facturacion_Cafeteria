<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Cafetería Chimazat</title>
  <link href="../recursos/personalizado/login.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">
</head>


<body class="body-body1">
<!-- partial:index.partial.html -->
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Bienvenidos</h1>
		<p>Sistema de control de inventario y pedidos. Cafetería Chimazat</p>
		<span>
			<p>Iniciar sesión con redes sociales</p>
			<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Iniciar con Twitter</a>
		</span>
		</div>
	</div>
	
	
		<div class="right">
		<br><br>
		<h5>Login</h5><br><br><br><br><br><br><br><br>
		<p>¿No tienes usuario? <a href="#">Crear un usuario</a> toma menos de un minuto</p>
		<br><br>
		<form method="post">
		<div class="inputs">
			<input type="text" name="log_user" placeholder="Usuario">
			<br>
			<input type="password" name="log_pass" placeholder="Password">
		</div>
			
			<br><br>
			
		<div class="remember-me--forget-password">
				<!-- Angular -->
	<label class="cinta">
		<input type="checkbox" name="item" checked/>
		<span class="text-checkbox">Recordarme</span>
	</label>
			<p>¿Olvidó su contraseña?</p>
		</div>
			
			<br>
			<button type="submit">Iniciar sesión</button>
			<?php 


$ingreso=new ctrUsuarios();
$ingreso->ctrIngresoUsuarios();




?>
</form>
	</div>
	
</div>
<!-- partial -->
  
</body>
</html>
