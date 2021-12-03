<?php

session_start();

if(!isset($_SESSION['nombre'])){
    header("location: ../index.php?m=200");
}
else{
	if($_SESSION['IdTipoUsuario'] != 1){
		header("location: ../index.php?m=200");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenido</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../css/jquery-confirm.css">
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="../JS/jquery-confirm.js"></script>
	<script src="../controllers/usuario.js"></script>

</head>
<body>
	<?php include "../recursos/menuAdmin.php";?>


	<div class="bg-secondary bg-gradient; min-vh-100">
		<div class="p-5 text-center bg-dark bg-gradient; min-vw-100">
			<h1 class="mb-3; text-primary" >¡Bienvenido</h1>
			<h3 class="mb-3; text-warning" ><?php echo $_SESSION['nombre']?>!</h3>
		</div>
		<?php
			if(isset ($_GET['m']))
			switch($_GET['m']){
				case 200: echo'<div class="alert alert-danger" role="alert">
								<h3> No has iniciado sesion porfavor, inicia sesion en <a href="login.php" class="alert-link"> "Acceso" </a></h3>
	 							</div>';
				break;
			}
		?>
	</div>
</body>
</html>