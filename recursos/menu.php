<?php include "funciones.php"?>
<?php include "iconos.php"?>
<nav class="d-flex flex-wrap justify-content-left py-3 mb-4 border-bottom; navbar navbar-dark bg-dark"  style="padding: 15px;">
		<ul class="nav nav-pills">
			<li>
				<div class="container-fluid">
					<a class="navbar-brand" href="index.php">
						<button class="btn btn-dark" ><i class="far fa-newspaper"></i></button>
						Noticias
					</a>
				</div>
			</li>
			<li class="nav-item"> 
				<a class="nav-link <?=echoActiveClassIfRequestMatches("index")?>"  aria-current="page" href="index.php">Inicio</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?=echoActiveClassIfRequestMatches("login")?>"  href="javascript:accesos('formLogin')">Acceso</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?=echoActiveClassIfRequestMatches("registro")?>"  href="javascript:registros('formRegistro')">Registro</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?=echoActiveClassIfRequestMatches("contra")?>" href="javascript:contras('formContra')">Recuperar Contraseña</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?=echoActiveClassIfRequestMatches("about")?>" href="about.php">Acerca de...</a>
			</li>
		</ul>

		<ul class="nav justify-content-end">
  			<li class="nav-item">
			  	<a class="nav-link disabled"  href="login.php">User</a>
  			</li>
  			<li class="nav-item">
			  <a class="btn btn-primary" href="javascript:accesos('formLogin')" role="button">Iniciar Sesion</a>
			</li>
		</ul>
</nav>