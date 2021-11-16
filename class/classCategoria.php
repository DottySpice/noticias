<?php 
    include "../recursos/conexionBD.php";
    $consulta = "SELECT * from Categoria ORDER BY Nombre ASC";

    $query = mysqli_query($conexion,$consulta);

    if (isset($_POST['save_categoria'])){
        $categoria = $_POST['categoria'];

        $query = "INSERT INTO categoria(Nombre) values ('$categoria')";
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header("Location: ../admin/categoria.php");
    }


    if (isset($_POST['eliminar_categoria'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM categoria where idCategoria = $id";
           
            $result = mysqli_query($conexion,$query);
            if(!$result){
                die("Query Failed");
            }
            header("Location: ../admin/categoria.php");
        }   
    }
?>
