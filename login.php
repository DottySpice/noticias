<?php 
session_start();

include "class/classBD.php";
	$error = false;

	if(isset($_POST['email']))
	{
		$registros = $oBD -> obtenRegistro("SELECT * from Usuario where Email='".$_POST['email']."' 
		and password = '".$_POST['password']."'");
		// && registro -> Password == $_POST['password]
		if($oBD -> numeRegistros){
			$_SESSION['nombre']=$registros -> Nombre." ".$registros -> Apellidos;
			$_SESSION['IdUsuario']=$registros -> IdUsuario;
			$_SESSION['IdTipoUsuario']=$registros -> IdTipoUsuario;
			$_SESSION['foto']=$registros -> Foto;
			
			if($registros -> IdTipoUsuario == 1){
				header("location: admin/index2.php");
			}
			else{
				if($registros -> IdTipoUsuario == 2){
				header("location: reportero/indexRe.php");
				}
				else{
					header("location: usuario/indexUsuario.php");
				}
			}
		}
		else{
			$error = true;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<?php include "recursos/menu.php"?>


	<div style="padding: 15px;">
		<h1>Login</h1>
		<div class="col-6 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">	
			<h5>Ingresa tus credenciales</h5>
			<form method="post">
				<div class="row">
					<label class="col-md-3 Handlee"> Email </label>
					<div class="col-md-9">
						<input type="text" name="email" placeholder="Ingrese su correo" required class="form-control">
					</div>
				</div>

				<div class="row">
					<label class="col-md-3 Handlee"> Password </label>
					<div class="col-md-9">
						<input type="password" name="password" placeholder="Ingrese su correo" required class="form-control">
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-6">
						<div class="row">
							<div class="col-md-6">
								<small class="text-danger">Ambos campos son obligatorios</small>
							</div>
							<div class="col-md-6">
								<button type="submit" class="btn btn-success">Ingresar</button>
							</div>
						</div>
					</div>
				</div>
			
			</form>
			<?php 
				if($error){
					echo'<div class="alert alert-danger" role="alert">
							<h4>Datos incorrecto, porfavor verifique sus credenciales</h4>
						</div>';
				}
			?>
		</div>
	</div>
</body>
</html>