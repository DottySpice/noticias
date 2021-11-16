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
	<title>Paises</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<?php include "../recursos/iconos.php" ?>

</head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

	function confirmarBorrado(){
		var respuesta = confirm("Estas seguro de borrar ");
		if(respuesta){
			return true;
		}
		else{
			return false;
		}
	}

	/*
	function confirmarBorrado()
	{
		Swal.fire({
			title: '¿Estas Seguro?',
			text: "¡No podras recuperar este datos!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Borra el pais!'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire(
				'Borrado!',
				'El pais a sido borrado exitosamente.',
				'success'
				)
				return true;
			}
			else{
				return false;
			}
		})
	}
	*/
	

</script>


<body>
	<?php  
	include "../recursos/menuAdmin.php";
	include "../class/classPais.php";
	?>
	<div style="padding: 15px;">
		<h1>Tabla Paises</h1>
		<a href= "../class/classSavePais.php"><button class="btn btn-success">Agregar Nuevo Pais <i class="fas fa-plus-circle"></i></button></a>
		<div class="text-center aling-items-center" style="padding:15px">	
			<table class="table table-secondary table-striped">
				<thead>
					<tr >
						<th scope="col">Pais</th>
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
							<form action="../class/editarPais.php?id=<?php echo $renglon['IdPais'] ?>" method="POST">
								<button type="submit" class="btn btn-primary btn-block" name="editar_pais" value="Editar"><i class="fas fa-pencil-alt"></i></button>
							</form>
							<form action="../class/classPais.php?id=<?php echo $renglon['IdPais'] ?>" method="POST">
								<button onclick="return confirm('¿Estas seguro de borrar el pais <?php echo $renglon['Nombre']; ?>?')" type="submit" class="btn btn-danger btn-block" name="eliminar_pais" value="Eliminar"><i class="fas fa-trash-alt"></i></button>
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
