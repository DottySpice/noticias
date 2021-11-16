<?php

session_start();

if(!isset($_SESSION['nombre'])){
    header("location: ../index.php?m=200");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nueva Categoria</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<?php include "../recursos/iconos.php" ?>

</head>
<body>
	<?php  
	include "../recursos/menuAdmin.php";
	include "classCategoria.php";
	?>
    <div class="m-0 row justify-content-center text-center">
        <h1>Agregar Nueva Categoria</h1>
        <div class="col-4 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">
			<form id="formCategoria" action="../class/classCategoria.php" method="POST" style="padding: 5px;">
				<div class="form-group">
					<input type="text" id="categoria" name="categoria" class="form-control" placeholder="Nombre Categoria">
				</div>					
				<button onclick="return enviarCategoria()" type="submit" class="btn btn-success btn-block" name="save_categoria" value="Guardar Categoria"><i class="far fa-save"></i></button>
			</form>
		</div>	
	</div>
	<script src="javaScript/validacion.js" ></script>
</body>
</html>