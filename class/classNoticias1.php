<?php 
    class Noticia {
        function __construct($accion){
            echo $this -> procesa($accion);
        }

        function procesa($accion){
            $resultado = "";
            switch ($accion){
                case 'filtro':

                    if (isset($_POST['IdCategoria'])) {
                        # code...
                    }

                    include "../recursos/conexionBD.php";

                    $consulta = "SELECT  C.Nombre as nombreCategoria, P.Nombre as nombrePais, CONCAT(U.Nombre,' ',U.Apellidos) nombreReportero ,N.* 
                    from Noticia N join Usuario U on N.IdReportero = U.IdUsuario
                    join Categoria C on N.IdCategoria = C.IdCategoria
                    join Pais P on N.IdPais = P.IdPais 
                    where Censurado = '' &&  C.IdCategoria = ".$_POST['IdCategoria']." order by Fecha";

                    $query = mysqli_query($conexion,$consulta);

                    foreach ($query as $renglon) {
                        
                        $resultado .= 
                        '<div class="card flex-md-row mb-4 box-shadow h-md-250" >
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">'.$renglon['nombreCategoria'].'</strong>
                                <h3 class="mb-3">
                                    <a class="text-dark" >'.$renglon['Titulo'].'</a>
                                </h3>
                                <p class="card-text mb-2 badge bg-primary">Reportero: '.$renglon['nombreReportero'].'</p>
                                <div class="mb-2  badge bg-dark">
                                    Fecha de publicacion: '. $renglon['Fecha'].'
                                </div>
                                <p class="card-text mb-auto">Pais: '.$renglon['nombrePais'].'</p>
                                <p class="card-text mb-auto">'.$renglon['Descripcion'].'</p>
                                <p class="card-text mb-auto">Visitas: '.$renglon['Visitas'].'</p>
                                <p class="card-text mb-auto">Likes: '.$renglon['Likes'].'</p>
                                
                            </div>
                            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Imagen de la noticia">
                        </div>';
                    }
                break;

                    default: 
                        $resultado = "Opcion Default";
            }
            return $resultado;
        }
    }
    $oNoticia = new Noticia(isset($_REQUEST['accion'])?$_REQUEST['accion']:'list');
?>
