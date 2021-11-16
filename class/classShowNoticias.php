<?php
    session_start();

    if(!isset($_SESSION['nombre'])){
        header("location: ../index.php?m=200");
        exit;
    }

    include "../recursos/conexionBD.php";


    $id = $_GET['id'];
    /*
    $consulta = ("SELECT C.Nombre,Titulo, N.Fecha as Fecha, concat(Nombre,' ', Apellidos,' ',Email) 
    User,Descripcion from Noticia N join Usuario U on N.IdReportero=U.IdUsuario join Categoria
    C on N.IdCategoria=C.IdCategoria where N.IdNoticia = $id");*/

    $consulta = ("SELECT Titulo, Descripcion, Fecha, C.Nombre as Categoria, concat(U.Nombre,' ', U.Apellidos,' ',U.Email) User 
    from Noticia N join Usuario U on N.IdReportero = U.IdUsuario join categoria C on N.IdCategoria = C.IdCategoria 
    where IdNoticia = $id;");

    //consulta = ("SELECT Titulo, Descripcion , Fecha as Fecha, concat(Nombre,' ', Apellidos,' ',Email) 
    //User from Noticia N join Usuario U on IdUsuario=U.IdUsuario where IdNoticia = $id");


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
		<h1>Informacion de Noticia</h1>
		<div class="text-center aling-items-center" style="padding:15px">	
			<table class="table table-secondary table-striped">
				<thead>
					<tr >
						<th scope="col">Titulo</th>
						<th scope="col">Descripcion</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Reportero</th>
                        
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($query as $renglon) {	
					?>
					<tr>
						<td scope="col"><?php echo $renglon['Titulo']; ?></td>
                        <td scope="col"><?php echo $renglon['Descripcion']; ?></td>
						<td scope="col"><?php echo $renglon['Categoria']; ?></td>
                        <td scope="col"><?php echo $renglon['Fecha']; ?></td>
                        <td scope="col"><?php echo $renglon['User']; ?></td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>