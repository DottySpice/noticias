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
	<title>Bienvenido</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<?php include "../recursos/iconos.php" ?>

</head>
<body>
	<?php  
	include "../recursos/menuAdmin.php";
	include "../class/classCategoria.php";
	?>
	<div style="padding: 15px;">
		<h1>Tabla Categoria</h1>
		<a href= "../class/classSaveCategoria.php"><button class="btn btn-success">Agregar Nueva Categoria <i class="fas fa-plus-circle"></i></button></a>
		<div class="text-center aling-items-center" style="padding:15px">	
			<table class="table table-secondary table-striped">
				<thead>
					<tr >
						<th scope="col">Categoria</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($query as $renglon) {	
					?>
					<tr>
						<td scope="col"><?php echo $renglon['Nombre']; ?></td>
						<td>
							<form action="../class/editarCategoria.php?id=<?php echo $renglon['IdCategoria'] ?>" method="POST">
								<button type="submit" class="btn btn-primary btn-block" name="editar_categoria" value="Editar"><i class="fas fa-pencil-alt"></i></button>
							</form>
							<form action="../class/classCategoria.php?id=<?php echo $renglon['IdCategoria'] ?>" method="POST">
								<button onclick="return confirm('¿Estas seguro de borrar la categoria <?php echo $renglon['Nombre']; ?>?')" type="submit" class="btn btn-danger btn-block" name="eliminar_categoria" value="Eliminar"><i class="fas fa-trash-alt"></i></button>
							</form>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>