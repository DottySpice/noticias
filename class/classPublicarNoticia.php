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
	<title>Publicar Nueva noticia</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<?php include "../recursos/iconos.php" ?>

</head>
<body>
	<?php  
	include "../recursos/menuReportero.php";
	include "../class/classNoticias.php";
	include "../recursos/conexionBD.php";
	?>
	
    <div class="m-0 row justify-content-center text-center">
        <h1>Publicar Nueva Noticia</h1>
		<div class="col-4 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">
			<form action="../class/classNoticias.php?id=<?php echo $_SESSION['IdUsuario'] ?>" method="POST" style="padding: 5px;">
				<div class="form-group">
					<input type="text" name="Titulo" class="form-control" placeholder="Escriba el titulo aqui...">
					<textarea  name="Descripcion" class="form-control" placeholder="Escriba la descripcion aqui..."></textarea>
					<select type="text" name="select_pais" class="form-control">
						<option value= "0" >Pais: </option>
						<?php 
            			$consulta = "SELECT * FROM pais";
           				$result = mysqli_query($conexion,$consulta);
							
						while ($valores = mysqli_fetch_array($result)) {
							echo '<option value= "'.$valores['IdPais'].'" >'.$valores['Nombre'].'</option>';
						}
						?>
					</select>
					<select type="text" name="select_categoria" class="form-control">
						<option value= "0" >Categoria: </option>
						<?php 
            			$consulta = "SELECT * FROM categoria";
           				$result = mysqli_query($conexion,$consulta);
							
						while ($valores = mysqli_fetch_array($result)) {
							echo '<option value= "'.$valores['IdCategoria'].'" >'.$valores['Nombre'].'</option>';
						}
						?>
					</select>
				</div>	
				<button type="submit" class="btn btn-success btn-block" name="save_noticia" value="Agregar Noticia"><i class="fas fa-save"></i></button>
			</form>
		</div>
	</div>
</body>
</html>