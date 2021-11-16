<?php
    session_start();

    if(!isset($_SESSION['nombre'])){
        header("location: ../index.php?m=200");
        exit;
    }

	include "../recursos/conexionBD.php";


    $id = $_GET['id'];
    $consulta = ("SELECT Comentario, O.Fecha as Fecha, concat(nombre,' ', apellidos,' ',Email) 
    User,Titulo from Opinion O join Usuario U on O.IdUsuario=U.IdUsuario join Noticia
    N on N.IdNoticia=O.IdNoticia where O.IdOpinion = $id");

	

	//$consulta = "SELECT * from Noticia N join Usuario U on N.IdReportero = U.IdUsuario
	//order by Fecha";

    $query = mysqli_query($conexion,$consulta);
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
	<div style="padding: 15px;">
		<h1>Informacion de Opinion</h1>
		<div class="text-center aling-items-center" style="padding:15px">	
			<table class="table table-secondary table-striped">
				<thead>
					<tr >
						<th scope="col">Comentario</th>
						<th scope="col">Fecha</th>
						<th scope="col">Usuario</th>
                        <th scope="col">Titulo</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($query as $renglon) {	
					?>
					<tr>
						<td scope="col"><?php echo $renglon['Comentario']; ?></td>
						<td scope="col"><?php echo $renglon['Fecha']; ?></td>
                        <td scope="col"><?php echo $renglon['User']; ?></td>
                        <td scope="col"><?php echo $renglon['Titulo']; ?></td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>