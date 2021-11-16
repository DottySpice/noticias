<?php

session_start();

if(!isset($_SESSION['nombre'])){
    header("location: ../index.php?m=200");
    exit;
}

include "../recursos/conexionBD.php";

$IdUsuario = $_SESSION['IdUsuario'];
$query = "SELECT Email, Nombre, Apellidos, Genero, Password, Foto from usuario where IdUsuario = $IdUsuario";
//$query = "SELECT * from usuario where IdUsuario = $IdUsuario";
$result = mysqli_query($conexion,$query);

$row = mysqli_fetch_array($result);
$email = $row['Email'];
$nombre = $row['Nombre'];
$apellidos = $row['Apellidos'];
$genero = $row['Genero'];
$password = $row['Password'];
$foto = $row['Foto'];


if (isset($_POST['actualizar_perfil'])) {
    $IdUsuario = $_SESSION['IdUsuario'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $genero = $_POST['genero'];
    $password = $_POST['password'];
	
	$ruta = "imagenes/";
	$fichero = $ruta.basename($_FILES['foto']['name']);
	$rut = $ruta.strtolower($nombre).$IdUsuario.".jpg";

	if(move_uploaded_file($_FILES['foto']['tmp_name'], "../recursos/".$rut)){
		$query = "UPDATE usuario set Foto = '$rut'
		WHERE IdUsuario=$IdUsuario";
		$result = mysqli_query($conexion,$query);
	}
	
    $query = "UPDATE usuario set Email = '$email', Nombre = '$nombre', Apellidos = '$apellidos', Genero = '$genero', Password = '$password'
    WHERE IdUsuario=$IdUsuario";

	$_SESSION['nombre']=$nombre." ".$apellidos;
    
    $result = mysqli_query($conexion,$query);
    if(!$result){
        die("Query Failed");
    }
    header("Location: ../reportero/indexRe.php");
}
?>

<?php include "../recursos/menuReportero.php" ?>
<link rel="stylesheet" href="../css/bootstrap.css"> 
<body>
	<div style="padding: 15px ;">
		<h1>Editar Perfil</h1>
		<div class="col-6 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">

			<h6>Actualiza tus datos personales</h5>
			<form method="POST"  enctype="multipart/form-data" action="editarPerfil.php?idUsuario=<?php echo $_SESSION['IdUsuario']; ?>">

				<div class="row">
					<label class="col-md-3 Handlee"> Email </label>
					<div class="col-md-9">
						<input type="text" name="email" value="<?php echo $email ?>" placeholder="Actualiza su email" required class="form-control">
					</div>
				</div>

                <div class="row">
					<label class="col-md-3 Handlee"> Contraseña </label>
					<div class="col-md-9">
						<input type="password" name="password" value="<?php echo $password ?>" placeholder="Actualiza su email" required class="form-control">
					</div>
				</div>

				<div class="row">
					<label class="col-md-3 Handlee"> Nombre(s) </label>
					<div class="col-md-9">
						<input type="text" name="nombre" value="<?php echo $nombre ?>" placeholder="Actualiza su nombre" required class="form-control">
					</div>
				</div>

				<div class="row">
					<label class="col-md-3 Handlee"> Apellidos </label>
					<div class="col-md-9">
						<input type="text" name="apellidos" value="<?php echo $apellidos ?>" placeholder="Actuliza sus apellidos" required class="form-control">
					</div>
				</div>

				<div class="row">
					<label class="col-md-3 Handlee"> Seleccione su sexo </label>
					<div class="col-md-9">
						<input  name="genero" type="radio" value="F" <?php if($genero == 'F') echo 'checked'?> >
						<label> Femenino </label>
						<input  name="genero" type="radio" value="M" <?php if($genero == 'M') echo 'checked'?>>
						<label> Masculino </label>
						<input  name="genero" type="radio" value="O" <?php if($genero == 'O') echo 'checked'?>>
						<label> Otro </label>
					</div>
				</div>
                
                <div class="row">
					<label class="col-md-3 Handlee"> Fotografia </label>
					<div class="col-md-9">
						<input type="file" name="foto"  class="form-control">
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-6">
						<div class="row">
							<div class="col-md-6">
								<small class="text-danger">Todos los campos son obligatorios *</small>
							</div>
							<div class="col-md-6">
								<button type="submit" name="actualizar_perfil" class="btn btn-primary">Actualizar Perfil</button>
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