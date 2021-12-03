<?php 
    class Registro {
        function __construct($accion){
            echo $this -> procesa($accion);
        }

        function procesa($accion){
            $resultado = "";
            switch ($accion){
                case 'formRegistro':
                    $resultado = 
                    '<div style="padding: 15px ;">
                        <h1>Registro</h1>
                        <div class="row-6 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">
                            <h6>Ingresa datos personales</h5>
                            <form method="POST" id="formRegistro" action="recursos/registrarse.php">
            
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Email </label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" placeholder="Ingrese su email" required class="form-control">
                                    </div>
                                </div>
                
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Nombre(s) </label>
                                    <div class="col-md-9">
                                        <input type="text" name="nombre" placeholder="Ingrese su nombre" required class="form-control">
                                    </div>
                                </div>
                
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Apellidos </label>
                                    <div class="col-md-9">
                                        <input type="text" name="apellidos" placeholder="Ingrese su apellido paterno" required class="form-control">
                                    </div>
                                </div>
                
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Seleccione su sexo </label>
                                    <div class="col-md-9">
                                        <input  name="genero" type="radio" value="F">
                                        <label> Femenino </label>
                                        <input  name="genero" type="radio" value="M">
                                        <label> Masculino </label>
                                        <input  name="genero" type="radio" value="O">
                                        <label> Otro </label>
                                    </div>
                                </div>
                
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="text-danger">Todos los campos son obligatorios *</small>
                                            </div>
                                            <div class="col-md-6">
                                                <button onclick="registros(\'valiRegistro\')" type="button" class="btn btn-success">Registrar Nuevo Usuario</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="mensaje"></div>
                    </div>';
                break;
                    case 'valiRegistro':
                        include "classBD.php";

                        $numeRegistros = $oBD -> consulta("SELECT * from usuario where Email = '".$_POST['email']."'");
                        //$bloqueRegistros = $oBD -> consulta("SELECT * from usuario where Email = '".$_POST['email']."'");
                        if($oBD -> numeRegistros == 0){;    
                            $cadena="abcdhjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ2345678923456789";
                            //Para obtener la longitud de la cadena
                            $numeC=strlen($cadena);
                            $nuevPWD="";
                            for ($i=0; $i<10; $i++){
                               $nuevPWD.=$cadena[rand()%$numeC];
                            }

                            $email = trim($_POST['email']);
                            $name = trim($_POST['nombre']);
                            $apellidos = trim($_POST['apellidos']);
                            $genero = trim($_POST['genero']);
                            $fechaAccesso = Date("Y-m-d H:i:s");

                            $consulta = "INSERT INTO usuario (Email, Nombre, Apellidos, Genero, Password, FechUltimoAcceso, ContAccesos, Foto, IdTipoUsuario) 
                            VALUES ('$email','$name','$apellidos','$genero','$nuevPWD','$fechaAccesso','0','','3')";

                            $oBD -> consulta($consulta);
                            if($oBD->mensError == ""){
                                    $resultado = "$.alert({title: 'Warning', content:'Usuario Registrado Con Exito', type:'green'})";
                            }
                            else{
                                $resultado = "$.alert({title: 'Warning', content:'Hubo Un Error Intente De Nuevo', type:'yellow'})";
                            }
                        }
                        else{
                            $resultado = "$.alert({title: 'Warning', content:'Usuario Ya Registrado', type:'red'})";
                        }
                    break;

                    default: 
                        $resultado = "Opcion Default";
            }
            return $resultado;
        }
    }
    $oRegistro = new Registro(isset($_REQUEST['accion'])?$_REQUEST['accion']:'list');
?>