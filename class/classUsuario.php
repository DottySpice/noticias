<?php 
    session_start();
    class Usuario {
        function __construct($accion){
            echo $this -> procesa($accion);
        }

        function procesa($accion){
            $resultado = "";
            switch ($accion){
                case 'formActualizar':
                    include "../recursos/conexionBD.php";

                    $IdUsuario = $_SESSION['IdUsuario'];
                    $query = "SELECT Email, Nombre, Apellidos, Genero, Password, Foto from usuario where IdUsuario = $IdUsuario";
                    $result = mysqli_query($conexion,$query);
                    $row = mysqli_fetch_array($result);
                    $email = $row['Email'];
                    $nombre = $row['Nombre'];
                    $apellidos = $row['Apellidos'];
                    $genero = $row['Genero'];
                    $password = $row['Password'];
                    $foto = $row['Foto'];

                    if($genero == 'F'){
                        $check = 
                        '<input  name="genero" type="radio" value="F" checked>
                        <label> Femenino </label>
                        <input  name="genero" type="radio" value="M" >
                        <label> Masculino </label>
                        <input  name="genero" type="radio" value="O" >
                        <label> Otro </label>';
                    }

                    if($genero == 'M'){
                        $check = 
                        '<input  name="genero" type="radio" value="F" >
                        <label> Femenino </label>
                        <input  name="genero" type="radio" value="M" checked>
                        <label> Masculino </label>
                        <input  name="genero" type="radio" value="O" >
                        <label> Otro </label>';
                    }

                    if($genero == 'O'){
                        $check = 
                        '<input  name="genero" type="radio" value="F" >
                        <label> Femenino </label>
                        <input  name="genero" type="radio" value="M" >
                        <label> Masculino </label>
                        <input  name="genero" type="radio" value="O" checked>
                        <label> Otro </label>';
                    }

                    $resultado = 
                    '<div style="padding: 15px ;">
                        <h1>Editar Perfil</h1>
                        <div class="row-6 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">
                            <h6>Actualiza tus datos personales</h5>
                            <form method="POST"  id="formActualizar">
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Email </label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" value="'.$email.'" placeholder="Actualiza su email" required class="form-control">
                                    </div>
                                </div>
                
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Contraseña </label>
                                    <div class="col-md-9">
                                        <input type="password" name="password" value="'.$password.'" placeholder="Actualiza su email" required class="form-control">
                                    </div>
                                </div>
                
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Nombre(s) </label>
                                    <div class="col-md-9">
                                        <input type="text" name="nombre" value="'.$nombre.'" placeholder="Actualiza su nombre" required class="form-control">
                                    </div>
                                </div>
                
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Apellidos </label>
                                    <div class="col-md-9">
                                        <input type="text" name="apellidos" value="'.$apellidos.'" placeholder="Actuliza sus apellidos" required class="form-control">
                                    </div>
                                </div>
                
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Seleccione su sexo </label>
                                    <div class="col-md-9">
                                    '.$check.'
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Fotografia </label>
                                    <div class="col-md-9">
                                        <input type="file" name="foto"  class="form-control">
                                    </div>
                                </div>
                
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="text-danger">Todos los campos son obligatorios *</small>
                                            </div>
                                            <div class="col-md-6">
                                                <button onclick="usuarios(\'valiActualizar\')" type="button" class="btn btn-primary">Actualizar Perfil</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="mensaje"></div>
                    </div>';
                break;
                    case 'valiActualizar':
                        include "../recursos/conexionBD.php";
                        $IdUsuario = $_SESSION['IdUsuario'];
                        $tipoUsuario = $_SESSION['IdTipoUsuario'];
                        $email = $_POST['email'];
                        $nombre = $_POST['nombre'];
                        $apellidos = $_POST['apellidos'];
                        $genero = $_POST['genero'];
                        $password = $_POST['password'];

                        $query = "UPDATE usuario set Email = '$email', Nombre = '$nombre', Apellidos = '$apellidos', Genero = '$genero', Password = '$password'
                        WHERE IdUsuario=$IdUsuario";
                    
                        $_SESSION['nombre']=$nombre." ".$apellidos;
                        $result = mysqli_query($conexion,$query);
                        if(!$result){
                            die("Query Failed");
                        }
                        
                        if ($tipoUsuario == 1) {
                            $resultado = "location ='../admin/index2.php'";
                        }
                        else{
                            if ($tipoUsuario == 2) {
                                $resultado = "location ='../reportero/indexRe.php'";
                            }
                            else{
                                $resultado = "location ='../usuario/indexUsuario.php'";
                            }
                        }
                        
                        
                    break;
                    default: 
                        $resultado = "Opcion Default";
            }
            return $resultado;
        }
    }
    $oUsuario = new Usuario(isset($_REQUEST['accion'])?$_REQUEST['accion']:'list');
?>