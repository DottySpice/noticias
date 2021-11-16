<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<?php include "recursos/menu.php"?>

	<div style="padding: 15px ;">
		<h1>Registro</h1>
		<div class="col-6 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">

			<h6>Ingresa datos personales</h5>
			<form method="POST" action="recursos/registrarse.php">

				<div class="row">
					<label class="col-md-3 Handlee"> Email </label>
					<div class="col-md-9">
						<input type="text" name="email" placeholder="Ingrese su email" required class="form-control">
					</div>
				</div>

				<div class="row">
					<label class="col-md-3 Handlee"> Nombre(s) </label>
					<div class="col-md-9">
						<input type="text" name="nombre" placeholder="Ingrese su nombre" required class="form-control">
					</div>
				</div>

				<div class="row">
					<label class="col-md-3 Handlee"> Apellidos </label>
					<div class="col-md-9">
						<input type="text" name="apellidos" placeholder="Ingrese su apellido paterno" required class="form-control">
					</div>
				</div>

				<div class="row">
					<label class="col-md-3 Handlee"> Seleccione su sexo </label>
					<div class="col-md-9">
						<input  name="genero" type="radio" value="F">
						<label> Femenino </label>
						<input  name="genero" type="radio" value="M">
						<label> Masculino </label>
						<input  name="genero" type="radio" value="O">
						<label> Otro </label>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-6">
						<div class="row">
							<div class="col-md-6">
								<small class="text-danger">Todos los campos son obligatorios *</small>
							</div>
							<div class="col-md-6">
								<button type="submit" class="btn btn-primary">Registrar nuevo usuario</button>
							</div>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
<?php
	if(isset ($_GET['m']))
		switch($_GET['m']){
		case 1: echo'<div class="alert alert-danger" role="alert">
						<h3> Esta cuenta ya existe, recupera tu contraseña en<a href="contra.php" class="alert-link"> "Recuperar contraseña" </a></h3>
	 				</div>';
		break;
		case 7: echo'<div class="alert alert-success" role="alert">
						<h3>Cuenta registrada con exito, inicia sesion en <a href="login.html" class="alert-link"> "Acceso" </a> y verifica tu contraseña en tu 
						<a class="alert-link" href="https://www.gmail.com" target="_blank"> Correo Electronico</a></h3>
					</div>';
		break;
		}
?>
</body>
</html>