<?php

session_start();

if(!isset($_SESSION['nombre'])){
    header("location: ../index.php?m=200");
    exit;
}

include "../recursos/conexionBD.php";
$consulta = "SELECT * from Pais";

$query = mysqli_query($conexion,$consulta);
    
if (isset($_POST['editar_noticia'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM noticia where IdNoticia = $id";
        $result = mysqli_query($conexion,$query);
        
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $titulo = $row['Titulo'];
            $descripcion = $row['Descripcion'];
            //$titulo = $row['Titulo'];
            //$titulo = $row['Titulo'];
            //$titulo = $row['Titulo'];
        }
    }   
}

if (isset($_POST['actualizar_noticia'])) {
    $id = $_GET['id'];
    $titulo = $_POST['Titulo'];
    $descripcion = $_POST['Descripcion'];
    $categoria = $_POST['select_categoria'];
    $pais = $_POST['select_pais'];
    
    $query = "UPDATE noticia set Titulo = '$titulo', Descripcion = '$descripcion',IdCategoria = '$categoria',IdPais = '$pais' 
    WHERE IdNoticia=$id";
    //$query = "DELETE FROM pais where idPais = $id";
    
    $result = mysqli_query($conexion,$query);
    if(!$result){
        die("Query Failed");
    }
    header('Location: ../reportero/noticias.php');
}
?>

<?php include "../recursos/menuReportero.php" ?>
<link rel="stylesheet" href="../css/bootstrap.css">
<div class="m-0 row justify-content-center text-center">
        <h1>Editar Noticia</h1>
		<div class="col-4 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">
                <form  class="text-center aling-items-center" action="editarNoticia.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="Titulo" type="text" class="form-control" value="<?php echo $titulo; ?>" placeholder="Actualizar Titulo">
                        <textarea name="Descripcion" type="text" class="form-control" placeholder="Actualizar descripcion"> <?php echo $descripcion; ?></textarea>
                        <select type="text" name="select_pais" class="form-control">
                            <option value= "0" >Pais: </option>
                            <?php 
                            $consulta = "SELECT * FROM pais";
                            $result = mysqli_query($conexion,$consulta);
                                
                            while ($valores = mysqli_fetch_array($result)) {
                                echo '<option value= "'.$valores['IdPais'].'" >'.$valores['Nombre'].'</option>';
                            }
                            ?>
                        </select>
                        
                        <select type="text" name="select_categoria" class="form-control">
                            <option value= "0" >Categoria: </option>
                            <?php 
                            $consulta = "SELECT * FROM categoria";
                            $result = mysqli_query($conexion,$consulta);
                                
                            while ($valores = mysqli_fetch_array($result)) {
                                echo '<option value= "'.$valores['IdCategoria'].'" >'.$valores['Nombre'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-success btn-block" name="actualizar_noticia">Actualizar Pais</button>
                </form>
            </div>
        </div>
    </div>
</div>