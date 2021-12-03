<?php 
    class Contra {
        function __construct($accion){
            echo $this -> procesa($accion);
        }

        function procesa($accion){
            $resultado = "";
            switch ($accion){
                case 'formContra':
                    $resultado = 
                    '<div style="padding: 15px ;">
                        <h1>Recuperar</h1>
                        <div class="row-6 rounded-3; text-center aling-items-center;" style="border-style: solid !important; padding:15px">
                            <h5>Ingresa tu email asociado a tu cuenta</h5>
                            <form method="POST" action="" id="formContra">
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Ingrese su email</label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" placeholder="Ingrese su email" required class="form-control">
                                    </div>
                                </div>
        
                                <div class="row">
                                    <label class="col-md-3 Handlee"> Verifica el Catcha </label>
                                    <div class = "col-md-9">
                                        <div class="g-recaptcha" data-sitekey="6LeL6Z4cAAAAAPhUJLh6cpJvvl828yqFRm45qBmF"></div>
                                    </div>
                                </div>
        
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="text-danger">Debes de ingresar un email registrado</small>
                                            </div>
                                            <div class="col-md-6">
                                                <button onclick="contras(\'valiContra\')" type="button" class="btn btn-success">Ingresar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="mensaje"></div>
                    </div>';
                break;
                    case 'valiContra':
                        include "classBD.php";
                        if(!empty($_POST)){
                            $email = $_POST['email'];

                            /*$captcha = $_POST['g-recaptcha-response'];
                            //Codigo porpocionado por Google
                            $secret = '6LeL6Z4cAAAAAJhH-1kCxIPlKYip7MFy0nSk05-_';
                            /*En la URL, se agrgan los valores(PARAMETROS) que se desean enviar 
                            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
                            
                            //Para leer la respuesta de google y poder se interpretada
                            $arr = json_decode($response, TRUE);
                            Condicion para comprobar si se valido o no se valido el captcha */

                            //if($arr['success']){
                                $bloqueRegistros = $oBD -> consulta("SELECT * from usuario where Email = '".$_POST['email']."'");
                                if($oBD -> numeRegistros == 1){
                                    $cadena="abcdhjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ2345678923456789";
                                    $numeC=strlen($cadena);
                                    $nuevPWD="";
                                    for ($i=0; $i<10; $i++){
                                       $nuevPWD.=$cadena[rand()%$numeC];
                                    }
                                    $oBD -> consulta("UPDATE Usuario set Password = '".$nuevPWD."' where Email='".$_POST['email']."'");
                                    $resultado = "$.alert({title: 'Warning', content:'Nueva Password Enviada', type:'green'})";
                                }
                                else{
                                    $resultado = "$.alert({title: 'Warning', content:'Correo Electronico No Registrado', type:'red'})";
                                }
                            //}
                            //else{
                            //    $resultado = "$.alert({title: 'Warning', content:'Captcha No verificado, Por Favor, Verifique el Captcha', type:'red'})";
                            //}
                        }
                    break;
                    default: 
                        $resultado = "Opcion Default";
            }
            return $resultado;
        }
    }
    $oContra = new Contra(isset($_REQUEST['accion'])?$_REQUEST['accion']:'list');
?>