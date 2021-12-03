<?php 
    class Acceso {
        function __construct($accion){
            echo $this -> procesa($accion);
        }

        function procesa($accion){
            $resultado = "";
            switch ($accion){
                case 'formLogin':
                    $resultado = 
                    '<div class="container">
                        <div style="padding: 15px;">
                            <h1>Login</h1>
                            <div class="row-6 rounded-3; text-center aling-items-center" style="border-style: solid !important; padding:15px">	
                                <h5>Ingresa tus credenciales</h5>
                                <form method="post" id="formLogin">
                                    <div class="row">
                                        <label class="col-md-3 Handlee"> Email </label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" placeholder="Ingrese su correo" required class="form-control">
                                        </div>
                                    </div>
                
                                    <div class="row">
                                        <label class="col-md-3 Handlee"> Password </label>
                                        <div class="col-md-9">
                                            <input type="password" name="password" placeholder="Ingrese su correo" required class="form-control">
                                        </div>
                                    </div>
                
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <small class="text-danger">Ambos campos son obligatorios</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <button onclick="accesos(\'valiAcceso\')" type="button" class="btn btn-success">Ingresar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>   
                        </div>
                        <div id="mensaje"></div>
                    </div>';
                break;
                    case 'valiAcceso':
                        include "classBD.php";
                        if(isset($_POST['email']))
                        {
                            session_start();
                            $registros = $oBD -> obtenRegistro("SELECT * from Usuario where Email='".$_POST['email']."' 
                            and password = '".$_POST['password']."'");
                            // && registro -> Password == $_POST['password]
                            if($oBD -> numeRegistros){
                                $_SESSION['nombre']=$registros -> Nombre." ".$registros -> Apellidos;
                                $_SESSION['IdUsuario']=$registros -> IdUsuario;
                                $_SESSION['IdTipoUsuario']=$registros -> IdTipoUsuario;
                                $_SESSION['foto']=$registros -> Foto;
                                if($registros -> IdTipoUsuario == 1){
                                    $resultado = "location ='admin/index2.php'";
                                    //header("location: admin/index2.php");
                                }
                                else{
                                    if($registros -> IdTipoUsuario == 2){
                                        $resultado = "location ='reportero/indexRe.php'";
                                        //header("location: reportero/indexRe.php");
                                    }
                                    else{
                                        $resultado = "location ='usuario/indexUsuario.php'";
                                        //header("location: usuario/indexUsuario.php");
                                    }
                                }
                            }
                            else{
                                $resultado = "$.alert({title: 'Warning', content:'Datos Incorrectos', type:'red'})";
                            }
                        }
                    break;

                    default: 
                        $resultado = "Opcion Default";
            }
            return $resultado;
        }
    }
    $oAcceso = new Acceso(isset($_REQUEST['accion'])?$_REQUEST['accion']:'list');
?>