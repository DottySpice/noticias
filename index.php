<?php
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenido</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/jquery-confirm.css">
  	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="JS/jquery-confirm.js"></script>
	<script src="controllers/acceso.js"></script>
	<script src="controllers/registro.js"></script>
	<script src="controllers/contra.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
</head>
<body>
	<?php include "recursos/menu.php"?>


	<div class="bg-secondary bg-gradient; min-vh-100">
		<div class="p-5 text-center bg-dark bg-gradient; min-vw-100">
			<h1 class="mb-3; text-primary" >¡Bienvenido a nuestro sitio!</h1>
			<h4 class="mb-3"></h4>
			<a class="btn btn-primary" href="registro.php" role="button">Click para iniciar</a>
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

	
	<!--  
	<div style="padding: 15px ;">
		<h1>¡Bienvenido a nuestro sitio web!</h1>

		<div class="text-center aling-items-center" style="border-style: solid; padding: 10px;">
			<h1>Ejemplos de botones con Boostrap</h1>
			<button type="button" class="btn btn-primary">Primary</button>
			<button type="button" class="btn btn-secondary">Secondary</button>
			<button type="button" class="btn btn-success">Success</button>
			<button type="button" class="btn btn-danger">Danger</button>
			<button type="button" class="btn btn-warning">Warning</button>
			<button type="button" class="btn btn-info">Info</button>
			<button type="button" class="btn btn-light">Light</button>
			<button type="button" class="btn btn-dark">Dark</button>
			<button type="button" class="btn btn-link">Link</button>
			<button class="btn btn-mio"> Es mi boton</button>
		</div>
	</div>
	-->


</body>
</html>