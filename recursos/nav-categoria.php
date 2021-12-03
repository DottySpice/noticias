<?php 

//Select para mostrar las categorias en el header (falta mandar categoria a ver en href)
include "../class/classCategoria.php";
foreach ($query as $renglon) {
?>

<a class="p-2 text-muted" href=""><?php echo $renglon['Nombre']; } ?> </a>
