<?php 
    class Categoria {
        function __construct($accion){
            echo $this -> procesa($accion);
        }

        function procesa($accion){
            $resultado = "";
            switch ($accion){
                case 'list':
                    include "../recursos/conexionBD.php";

                    $consulta = "SELECT * from Categoria ORDER BY Nombre ASC";
                    $query = mysqli_query($conexion,$consulta);

                    foreach ($query as $renglon) {
                    $resultado .= '<a class="p-2 text-muted" href="javascript:categorias(\'filtro\','.$renglon['IdCategoria'].')" >'.$renglon['Nombre'].'</a>';
                    }
                break;
                    case 'valiAcceso':

                    break;

                    default: 
                        $resultado = "Opcion Default";
            }
            return $resultado;
        }
    }
    $oCategoria = new Categoria(isset($_REQUEST['accion'])?$_REQUEST['accion']:'list');
?>