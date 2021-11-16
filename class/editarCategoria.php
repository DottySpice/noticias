<?php
    session_start();

    if(!isset($_SESSION['nombre'])){
      header("location: ../index.php?m=200");
    exit;
    }

    include "../recursos/conexionBD.php";
    $consulta = "SELECT * from Pais";

    $query = mysqli_query($conexion,$consulta);
    
    if (isset($_POST['editar_categoria'])){
      if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM categoria where idCategoria = $id";
            $result = mysqli_query($conexion,$query);
           
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                $categoria = $row['Nombre'];
            }
        }   
    }

    if (isset($_POST['actualizar_categoria'])) {
        $id = $_GET['id'];
        $categoria = $_POST['categoria'];
      
        $query = "UPDATE categoria set Nombre = '$categoria' WHERE IdCategoria=$id";
        //$query = "DELETE FROM pais where idPais = $id";
        
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header('Location: ../admin/categoria.php');
    }
?>

<?php include "../recursos/menuAdmin.php" ?>
<link rel="stylesheet" href="../css/bootstrap.css">
  <div class="m-0 row justify-content-center text-center">
    <h1>Actualizar Categoria</h1>
    <div class="col-4 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">
          <form id="formCategoria" class="text-center aling-items-center" action="editarCategoria.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
              <label for="disabledTextInput">Nombre de la categoria actual</label>
              <input id="categoriaAntes" type="text" class="form-control" value="<?php echo $categoria ; ?>" placeholder="Actualizar Categoria" disabled>
              <label for="disabledTextInput">Nuevo nombre de la categoria</label>
              <input type="text" id="categoriaDespues" name="categoria"  class="form-control" placeholder="Actualiza el nombre del Pais">
            </div>
            <button onclick="return editarCategoria()" class="btn btn-success btn-block" name="actualizar_categoria">Actualizar Categoria</button>
          </form>
          <script src="javaScript/validacion.js" ></script>
    </div>
  </div>