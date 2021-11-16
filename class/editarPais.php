<?php
    session_start();

    if(!isset($_SESSION['nombre'])){
      header("location: ../index.php?m=200");
    exit;
    }

    include "../recursos/conexionBD.php";
    $consulta = "SELECT * from Pais";

    $query = mysqli_query($conexion,$consulta);
    
    if (isset($_POST['editar_pais'])){
      if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM pais where idPais = $id";
            $result = mysqli_query($conexion,$query);
           
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                $pais = $row['Nombre'];
            }
        }   
    }

    if (isset($_POST['actualizar_pais'])) {
        $id = $_GET['id'];
        $pais = $_POST['pais'];
      
        $query = "UPDATE pais set Nombre = '$pais' WHERE IdPais=$id";
        //$query = "DELETE FROM pais where idPais = $id";
        
        $result = mysqli_query($conexion,$query);
        if(!$result){
            die("Query Failed");
        }
        header('Location: ../admin/pais.php');
    }
?>

<?php include "../recursos/menuAdmin.php" ?>

<link rel="stylesheet" href="../css/bootstrap.css">

  <div class="m-0 row justify-content-center text-center">
    <h1>Actualizar Pais</h1>
    <div class="col-4 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">
      <form id="formPais" class="text-center aling-items-center" action="editarPais.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <label for="disabledTextInput">Nombre del pais actual</label>
          <input id="paisAntes" type="text" class="form-control" value="<?php echo $pais; ?>" placeholder="Actualizar Pais" disabled>
          <label for="disabledTextInput">Nuevo nombre del pais</label>
          <input type="text" id="paisDespues" name="pais" class="form-control" placeholder="Actualiza el nombre del Pais">
        </div>
        <button onclick="return editarPais()" class="btn btn-success btn-block" name="actualizar_pais">Actualizar Pais</button>
      </form>
      <script src="javaScript/validacion.js" ></script>
    </div>
  </div>