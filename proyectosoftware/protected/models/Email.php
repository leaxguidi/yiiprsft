<?php

Yii::import('application.extensions.phpmailer.JPhpMailer');

/**
 * 
 */
Class EnviadorDeMails {
		
		public function __construct($subject,$message){
			$mail = new JPhpMailer;
			//Definir que vamos a usar SMTP
			$mail->IsSMTP();
			//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
			// 0 = off (producción)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
			//Ahora definimos gmail como servidor que aloja nuestro SMTP
			$mail->Host = 'mx1.hostinger.com.ar';
			//El puerto
			$mail->Port = 2525;
			//Definmos la seguridad como TLS
			//~ $mail->SMTPSecure = 'tls';
			//Tenemos que usar gmail autenticados, así que esto a TRUE
			$mail->SMTPAuth = true;
			//Definimos la cuenta que vamos a usar. Dirección completa de la misma
			$mail->Username = "contacto@unaj-informatica.com.ar";
			//Introducimos nuestra contraseña
			$mail->Password = "user--EMAIL999";
			$mail->Subject = $subject;
			$mail->MsgHTML($message);
			//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
			$mail->AltBody = $message;
		}

		public function enviar($emailRem,$nombreRem,$emailTo,$nombreTo){
			$mail->SetFrom($emailRem, $nombreRem);
			$mail->AddAddress($emailTo, $nombreTo);	
			//Enviamos el correo
			$mail->Send();
		}
	}

#PATRON ADAPTER CHAMUYO 
class Email {
	
	public static function enviar($to, $subject, $message) {
		EnviadorDeMails($subject, $message)->enviar('contacto@unaj-informatica.com.ar', 'UNAJ - Proyecto de Software', $to, 'usuario');
	}
	
	
	public static function recibir_contacto($to, $name, $subject, $message) {
		EnviadorDeMails($subject, $message)->enviar($to, $name.' ('.$to.')', $to, 'usuario', 'contacto@unaj-informatica.com.ar', '');
	}

}

?>
