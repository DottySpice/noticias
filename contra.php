<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contraseña</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	<?php include "recursos/menu.php"?>

	<div style="padding: 15px ;">
		<h1>Recuperar</h1>
		<div class="col-6 rounded-3; text-center aling-items-center;" 
		style="border-style: solid !important; padding:15px">
		<h5>Ingresa tu email asociado a tu cuenta</h5>
		<form method = "POST" action="">
			<div class="row">
				<label class="col-md-3 Handlee"> Ingrese su email</label>
				<div class="col-md-9"><input type="text" name="email" placeholder="Ingrese su email"
					required class="form-control">
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
							<button type="submit" class="btn btn-dark">Recuperar contraseña</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>

<?php
	include "class/classBD.php";

	if(!empty($_POST)){
		$email = $_POST['email'];
		$captcha = $_POST['g-recaptcha-response'];
		//Codigo porpocionado por Google
		$secret = '6LeL6Z4cAAAAAJhH-1kCxIPlKYip7MFy0nSk05-_';
		/*En la URL, se agrgan los valores(PARAMETROS) que se desean enviar */
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		//var_dump($response);

		//Para leer la respuesta de google y poder se interpretada
		$arr = json_decode($response, TRUE);
		//Condicion para comprobar si se valido o no se valido el captcha
		if($arr['success']){
			
			$bloqueRegistros = $oBD -> consulta("SELECT * from usuario where Email = '".$_POST['email']."'");

			 if($oBD -> numeRegistros == 1){
				$cadena="abcdhjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ2345678923456789";
				$numeC=strlen($cadena);
				$nuevPWD="";
				for ($i=0; $i<10; $i++){
				   $nuevPWD.=$cadena[rand()%$numeC];
				}
	
				$oBD -> consulta("UPDATE Usuario set Password = '".$nuevPWD."' where Email='".$_POST['email']."'");
				
				//Para enviar el correo de conformacion
				include("recursos/class.phpmailer.php");
				include("recursos/class.smtp.php");
				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->Host="smtp.gmail.com"; //mail.google
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
				$mail->Port = 465;     // set the SMTP port for the GMAIL server
				$mail->SMTPDebug  = 0;  // enables SMTP debug information (for testing)
				$mail->SMTPAuth = true;   //enable SMTP authentication
				$mail->Username = "18031006@itcelaya.edu.mx"; // SMTP account username
				$mail->Password = "Quierosermejorqueayer12";  // SMTP account password
				$mail->From="";
				$mail->FromName="";
				$mail->Subject = "Nueva Clave";
				$mail->MsgHTML("<h2> Tu clave Nueva clave de acceso es : ".$nuevPWD."</h2>");
				$mail->AddAddress($_POST['email']);
				$mail->Send();

				echo'<div class="alert alert-success" role="alert">
						<h4>Si tu correo esta registado en nuestro dominio se te sera enviado un correo, verifica tu nueva contraseña en tu 
						<a class="alert-link" href="https://www.gmail.com" target="_blank"> Correo Electronico</a></h4>
					</div>';
			}
			else{
				echo'<div class="alert alert-danger" role="alert">
						<h4>Tu correo no estra registrado, por favor registrare en 
						<a class="alert-link" href="registro.php">"Registro""</a></h4>
					</div>';
			}
		}
		else{
			echo '<div class="alert alert-danger" role="alert">
					<h3> Captcha no verificado, porfavor verifique el Captcha</h3>
		 		</div>';
		}
	}
?>
</body>
</html>
