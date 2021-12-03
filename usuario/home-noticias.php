<?php

session_start();

if(!isset($_SESSION['nombre'])){
    header("location: ../index.php?m=200");
	exit;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta charset="utf-8">
        <title>Menu Noticias</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="../css/jquery-confirm.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="../JS/jquery-confirm.js"></script>
        <script src="../controllers/usuario.js"></script>
        <script src="../controllers/categoria.js"></script>
    </head>

    <body>
        <?php include "../recursos/menuUsuario.php"; ?>
        
        <!-- container para la seccion principal -->
        <div class="container">
            <!-- header para categorias -->
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between" id="capaCategorias">
                    <script>
                        categorias("list","capaCategorias");
                    </script>
                    <!-- se llama el codigo .php que trae las categorias de la BD -->
                    <?php //include "../recursos/nav-categoria.php"; ?>
                </nav>
            </div>

            <!-- Contenedor para noticia destacada -->
            <div class="jumbotron p-3 mb-4 p-md-5 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic">Titulo para noticia destacada</h1>
                    <p class="lead my-3">Texto de descripcion de noticia destacada noticia destacada</p>
                    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continuar leyendo...</a></p>
                </div>
            </div>

            <?php include "../class/classNoticias.php"; ?>
            <!-- Contenedor de fila para la seccion de noticias -->
            <div class="row mb-2">
                <!-- Contenedor de columna para la seccion de noticias -->
                <div class="col-md-6" id="Noticias">
                    <?php 
						foreach ($query as $renglon) {	
					?>
                    <div class="card flex-md-row mb-4 box-shadow h-md-250" >
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary"><?php echo $renglon['nombreCategoria']; ?></strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#"><?php echo $renglon['Titulo']; ?></a>
                            </h3>
                            <div class="mb-1 text-muted">
                                Fecha de publicacion: <?php echo $renglon['Fecha']; ?>
                            </div>
                            <p class="card-text mb-auto">Pais: <?php echo $renglon['nombrePais'];?></p>
                            <p class="card-text mb-auto">Reportero: <?php echo $renglon['nombreReportero'];?></p>
                            <p class="card-text mb-auto">Visitas: <?php echo $renglon['Visitas']; ?></p>
                            <p class="card-text mb-auto">Likes: <?php echo $renglon['Likes']; ?></p>
                            <a href="#">Ver noticia...</a>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Imagen de la noticia">
                    </div>
                    <?php } ?>
                </div>
            </div>                
        </div>
    </body>
</html>