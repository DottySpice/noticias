<?php 
    include "../recursos/conexionBD.php";
    $consulta = "SELECT IdOpinion, Titulo, Comentario , O.Censurado as Censurado from Opinion O join Noticia N on O.IdNoticia = N.IdNoticia;";

    //$consulta = "SELECT IdOpinion, N.Titulo as titulo, O.opinion as oponion, O.Censurado as censurado
    //from Opinion O join Noticia N on O.IdNoticia = N.IdNoticia";

    //$consulta = "SELECT * from Noticia N join Usuario U on N.IdReportero = U.IdUsuario
    //order by Fecha";

    $query = mysqli_query($conexion,$consulta);
    /*
    if (isset($_POST['save_pais'])){
        $pais = $_POST['pais'];

        $query = "INSERT INTO pais(Nombre) values ('$pais')";
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header("Location: ../admin/pais.php");
    }*/

    if (isset($_POST['censurar_comentario'])) {
        $id = $_GET['id'];
      
        $query = "UPDATE opinion set Censurado = 1 WHERE IdOpinion=$id";
        //$query = "DELETE FROM pais where idPais = $id";
        
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header('Location: ../admin/opinion.php');
    }

    if (isset($_POST['descensurar_comentario'])) {
        $id = $_GET['id'];
      
        $query = "UPDATE opinion set Censurado = ' ' WHERE IdOpinion=$id";
        //$query = "DELETE FROM pais where idPais = $id";
        
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header('Location: ../admin/opinion.php');
    }

    /*
    if (isset($_POST['ver_datos'])){
        $id = $_GET['id'];
        
        $query = ("SELECT Comentario, O.Fecha as Fecha, concat(nombre,' ', apellidos,' ',Email) 
        User,Titulo from Opinion O join Usuario U on O.IdUsuario=U.IdUsuario join Noticia
        N on N.IdNoticia=O.IdNoticia where O.IdOpinion = $id");
        
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header("Location: classShowOpinion.php?$result"); 
    }  
    */
?>