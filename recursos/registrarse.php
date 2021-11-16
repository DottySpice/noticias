<?php
   include "../class/classBD.php";
  
   $numeRegistros = $oBD -> consulta("SELECT * from usuario where Email = '".$_POST['email']."'");
   //$bloqueRegistros = $oBD -> consulta("SELECT * from usuario where Email = '".$_POST['email']."'");
   if($oBD -> numeRegistros == 0){
      $cadena="abcdhjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ2345678923456789";
      //Para obtener la longitud de la cadena
      $numeC=strlen($cadena);
      $nuevPWD="";
      for ($i=0; $i<10; $i++){
         $nuevPWD.=$cadena[rand()%$numeC];
      }

      include("class.phpmailer.php");
      include("class.smtp.php");

      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host="smtp.gmail.com"; 
      $mail->SMTPSecure = 'ssl'; 
      $mail->Port = 465;
      $mail->SMTPDebug  = 0;  
      $mail->SMTPAuth = true;     
      $mail->Username = "18031006@itcelaya.edu.mx"; 
      $mail->Password = "Quierosermejorqueayer12";     
      $mail->From="";
      $mail->FromName="";
      $mail->Subject = "Registro completo";
      $mail->MsgHTML("<h1>BIENVENIDO ".$_POST['nombre']." ".$_POST['apellidos']."</h1><h2> tu clave de acceso es : ".$nuevPWD."</h2>");
      $mail->AddAddress($_POST['email']);
   
      if (!$mail->Send()){
         echo  "Error: " . $mail->ErrorInfo;
      }
      else {
         $email = trim($_POST['email']);
         $name = trim($_POST['nombre']);
         $apellidos = trim($_POST['apellidos']);
         $genero = trim($_POST['genero']);
         $fechaAccesso = Date("Y-m-d H:i:s");

         $consulta = "INSERT INTO usuario (Email, Nombre, Apellidos, Genero, Password, FechUltimoAcceso, ContAccesos, Foto, IdTipoUsuario) VALUES 
         ('$email','$name','$apellidos','$genero','$nuevPWD','$fechaAccesso','0','','3')";
        
         $oBD -> consulta($consulta);
   
         if($oBD->mensError == ""){
            header("location: ../registro.php?m=7");
         }
         else{
            echo $consulta;
            echo $mensError;
         }
      }
   }
   else{
      header("location: ../registro.php?m=1&e=".$_POST['Email']);
   }
?>