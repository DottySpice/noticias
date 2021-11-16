<?php 
    include "../recursos/conexionBD.php";
    $consulta = "SELECT * from Pais";

    $query = mysqli_query($conexion,$consulta);

    if (isset($_POST['save_pais'])){
        $pais = $_POST['pais'];

        $query = "INSERT INTO pais(Nombre) values ('$pais')";
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header("Location: ../admin/pais.php");
    }


    if (isset($_POST['eliminar_pais'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM pais where idPais = $id";
           
            $result = mysqli_query($conexion,$query);
            if(!$result){
                die("Query Failed");
            }
            header("Location: ../admin/pais.php");
        }   
    }
?>


