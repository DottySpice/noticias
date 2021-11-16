<?php 
    //session_start();
    /*
    echo $_SESSION['IdUser'];
    echo $_SESSION['nombre'];
    echo $_SESSION['tipoUser'];

    if(!(isset($_SESSION['IdUsuario']) && $_SESSION['IdUsuario'] == 1)){
        //Laas credenciales de admin no existen

    }

    if($_SESSION['IdUsuario'] == 1 || $_SESSION['IdUsuario'] == 3){
        //Ejecuta vista de listado para admin o usuario normal
    }
    else{
        //Reportero que le muestran solo sus noticias
        $IdReportero = $_SESSION['IdUsuario'];
        $consulta = "SELECT * from Noticia N join Usuario U on N.IdReportero = U.IdUsuario
        where IdReportero = $IdReportero order by Fecha";
        

    }
    */
    include "../recursos/conexionBD.php";
    //$IdReportero = $_SESSION['IdTipoUsuario'];
    //echo $IdReportero;
    
    if($_SESSION['IdTipoUsuario'] == 1){
        //Ejecuta vista de listado para admin
        $consulta = "SELECT * from Noticia N join Usuario U on N.IdReportero = U.IdUsuario
        order by Fecha";
    }
    else{
        if($_SESSION['IdTipoUsuario'] == 3){
            $consulta = "SELECT  C.Nombre as nombreCategoria, P.Nombre as nombrePais, CONCAT(U.Nombre,' ',U.Apellidos) nombreReportero ,N.* 
			from Noticia N join Usuario U on N.IdReportero = U.IdUsuario
            join Categoria C on N.IdCategoria = C.IdCategoria
            join Pais P on N.IdPais = P.IdPais 
            where Censurado = '' order by Fecha ";
        }
        else{
            //Reportero que le muestran solo sus noticias
            //echo "Eres Reportero";
            $IdReportero = $_SESSION['IdUsuario'];

            $consulta = "SELECT * from Noticia N join Usuario U on N.IdReportero = U.IdUsuario
            where N.IdReportero = $IdReportero order by Fecha";
        }
    }
    $query = mysqli_query($conexion,$consulta);

    
    if (isset($_POST['save_noticia'])){
        $IdReportero = $_GET['id'];
        $titulo = $_POST['Titulo'];
        $descripcion = $_POST['Descripcion'];
        $fecha = date("Y-m-d H:i:s");
        $categoria = $_POST['select_categoria'];
        $pais = $_POST['select_pais'];
        
        $query = "INSERT INTO noticia (Titulo,Descripcion,Fecha,IdCategoria,IdPais,IdReportero) 
        values ('$titulo','$descripcion','$fecha','$categoria','$pais','$IdReportero')";
        $result = mysqli_query($conexion,$query);
    
        if(!$result){
            die("Query Failed");
        }
        
        header("Location: ../reportero/noticias.php");
    }

    if (isset($_POST['eliminar_noticia'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM noticia where IdNoticia = $id";
           
            $result = mysqli_query($conexion,$query);
            if(!$result){
                die("Query Failed");
            }
            header("Location: ../reportero/noticias.php");
        }   
    }

    if (isset($_POST['censurar_comentario'])) {
        $id = $_GET['id'];
      
        $query = "UPDATE  noticia set Censurado = 1 WHERE IdNoticia=$id";
        //$query = "DELETE FROM pais where idPais = $id";
        
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header('Location: ../admin/noticias.php');
    }

    if (isset($_POST['descensurar_comentario'])) {
        $id = $_GET['id'];
      
        $query = "UPDATE noticia set Censurado = ' ' WHERE IdNoticia=$id";
        //$query = "DELETE FROM pais where idPais = $id";
        
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header('Location: ../admin/noticias.php');
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