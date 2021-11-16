<?php include "funciones.php"?>
<?php include "iconos.php"?>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/estilos.css">
<nav class="d-flex flex-wrap justify-content-left py-3 mb-1 border-bottom; navbar navbar-dark bg-dark"  style="padding: 15px;">
		<ul class="nav nav-pills">
			<li>
				<div class="container-fluid">
					<a class="navbar-brand" href="index2.php">
						<button class="btn btn-dark" ><i class="far fa-newspaper"></i></button>
				  		Noticias
					</a>
				</div>
			</li>
			<li class="nav-item"><a class="nav-link <?=echoActiveClassIfRequestMatches("indexUsuario")?>"  aria-current="page" href="../usuario/indexUsuario.php">Inicio</a></li>
			<li class="nav-item"><a class="nav-link <?=echoActiveClassIfRequestMatches("home-noticias")?>"  href="../usuario/home-noticias.php">Noticias</a></li>
		</ul>
		<ul class="nav justify-content-end">
			<li class="nav-item">
			  	<a class="nav-link disabled">Sesion de: </a>
  			</li>
			<li class="nav-item">
			  	<img class="foto-perfil" src="<?php echo $_SESSION['foto']?>"/>		  
  			</li>
  			<li class="nav-item">
				<a class="nav-link"  href="../class/editarPerfil.php?idUsuario="<?php echo $_SESSION['IdUsuario'] ?>> <?php echo $_SESSION['nombre']?></a>
  			</li>
  			<li class="nav-item">
			  <a class="btn btn-danger" href="../index.php" role="button">Cerrar Sesion</a>
			</li>
		</ul>
</nav>