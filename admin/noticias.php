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
	include "../class/classNoticias.php";
	?>
	<div style="padding: 15px;">
		<h1>Tabla de Noticias</h1>
		<div class="text-center aling-items-center" style="padding:15px">	
			<table class="table table-secondary table-striped">
				<thead>
					<tr>
						<th scope="col">Fecha</th>
						<th scope="col">Titulo</th>
                        <th scope="col">Reportero</th>
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
                        <td scope="col"><?php echo $renglon['Nombre']." ".$renglon['Apellidos']; ?></td>
						<td>
							<form action="../class/classNoticias.php?id=<?php echo $renglon['IdNoticia'] ?>" method="POST">
								<?php
								if($renglon['Censurado']==""){   
								?>
								<button onclick="return confirm('¿Estas seguro de censurar este Titulo? <?php echo $renglon['Titulo']; ?>')" type="submit" class="btn btn-danger btn-block" name="censurar_comentario" value="censurar"><i class="far fa-eye-slash"></i></button>
								<?php }else{ ?>
								<button onclick="return confirm('¿Estas seguro de descensurar este Titulo? <?php echo $renglon['Titulo']; ?>')" type="submit" class="btn btn-success btn-block" name="descensurar_comentario" value="descensurar"><i class="far fa-eye"></i></button>
								<?php } ?>
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