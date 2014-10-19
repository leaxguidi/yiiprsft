<?php

Yii::import('application.extensions.phpmailer.JPhpMailer');

/**
 * 
 */
Class EnviadorDeMails {
	
	public $email;
	
	public function __construct($subject,$message){
		$this->mail = new JPhpMailer;
		//Definir que vamos a usar SMTP
		$this->mail->IsSMTP();
		//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
		// 0 = off (producción)
		// 1 = client messages
		// 2 = client and server messages
		$this->mail->SMTPDebug = 0;
		//Ahora definimos gmail como servidor que aloja nuestro SMTP
		$this->mail->Host = 'mx1.hostinger.com.ar';
		//El puerto
		$this->mail->Port = 2525;
		//Definmos la seguridad como TLS
		//~ $this->mail->SMTPSecure = 'tls';
		//Tenemos que usar gmail autenticados, así que esto a TRUE
		$this->mail->SMTPAuth = true;
		//Definimos la cuenta que vamos a usar. Dirección completa de la misma
		$this->mail->Username = "contacto@unaj-informatica.com.ar";
		//Introducimos nuestra contraseña
		$this->mail->Password = "user--EMAIL999";
		$this->mail->Subject = $subject;
		$this->mail->MsgHTML($message);
		//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
		$this->mail->AltBody = $message;
	}

	public function enviar($emailRem,$nombreRem,$emailTo,$nombreTo){
		$this->mail->SetFrom($emailRem, $nombreRem);
		$this->mail->AddAddress($emailTo, $nombreTo);	
		//Enviamos el correo
		$this->mail->Send();
	}

}



#PATRON ADAPTER CHAMUYO 
class Email {
	
	public static function enviar($to, $subject, $message) {
		$email = new EnviadorDeMails($subject, $message);
		$email->enviar('contacto@unaj-informatica.com.ar', 'UNAJ - Proyecto de Software', $to, 'usuario');
	}
	
	
	public static function recibir_contacto($to, $name, $subject, $message) {
		$email = new EnviadorDeMails($subject, $message);
		$email->enviar($to, $name.' ('.$to.')', $to, 'usuario', 'contacto@unaj-informatica.com.ar', '');
	}

}

?>
