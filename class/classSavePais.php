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
	<title>Nuevo Pais</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<?php include "../recursos/iconos.php" ?>

</head>
<body>


	<?php  
	include "../recursos/menuAdmin.php";
	include "classPais.php";
	?>
    <div class="m-0 row justify-content-center text-center">
        <h1>Agregar Nuevo Pais</h1>
        <div class="col-4 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">
            <form id="formPais" action="../class/classPais.php" method="POST" style="padding: 5px;">
                <div class="form-group">
                    <input type="text" id="pais" name="pais" class="form-control" placeholder="Nombre Pais">
                </div>		
                <button onclick="return enviarPais()" type="submit" class="btn btn-success btn-block" name="save_pais" value="Guardar Pais"><i class="far fa-save"></i></button>
            </form>
        </div>	
    </div>
    <script src="javaScript/validacion.js" ></script>
</body>
</html>