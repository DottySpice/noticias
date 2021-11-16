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
	include "../recursos/menuReportero.php";
	include "../class/classNoticias.php";
	include "../recursos/conexionBD.php";
	?>
	<div style="padding: 15px;">
		<h1>Tabla de Noticias Publicadas</h1>
		<a href= "../class/classPublicarNoticia.php"><button class="btn btn-success">Publicar Nueva Noticia <i class="fas fa-plus-circle"></i></button></a>
		<div class="text-center aling-items-center" style="padding:15px">	
			<table class="table table-secondary table-striped">
				<thead>
					<tr>
						<th scope="col">Fecha</th>
						<th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Visitas</th>
                        <th scope="col">Likes</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($query as $renglon) {	
					?>
					<tr>
						<td scope="col"><?php echo $renglon['Fecha']; ?></td>
						<td scope="col"><?php echo $renglon['Titulo']; ?></td>
                        <td scope="col"><?php echo $renglon['Descripcion']; ?></td>
                        <td scope="col"><?php echo $renglon['Visitas']; ?></td>
                        <td scope="col"><?php echo $renglon['Likes']; ?></td>
						<td>
							<form action="../class/classNoticias.php?id=<?php echo $renglon['IdNoticia'] ?>" method="POST">
								<button type="submit" class="btn btn-danger btn-block" name="eliminar_noticia" value="Eliminar"><i class="fas fa-trash-alt"></i></button>
							</form>
							<form action="../class/editarNoticia.php?id=<?php echo $renglon['IdNoticia'] ?>" method="POST">
								<button type="submit" class="btn btn-primary btn-block" name="editar_noticia" value="Editar"><i class="fas fa-pencil-alt"></i></button>
							</form>
							<form action="../class/classShowNoticias.php?id=<?php echo $renglon['IdNoticia'] ?>" method="POST">
								<button type="submit" class="btn btn-info btn-block" name="ver_datos" value="ver"><i class="far fa-list-alt"></i></button>
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