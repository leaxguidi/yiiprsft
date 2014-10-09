<?php

Yii::import('application.extensions.phpmailer.JPhpMailer');


class Email {
	
	public static function enviar($to, $subject, $message) {
		
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
		
		//Definimos el remitente (dirección y, opcionalmente, nombre)
		$mail->SetFrom('contacto@unaj-informatica.com.ar', 'UNAJ - Proyecto de Software');
		
		//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
		//~ $mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
		
		//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
		$mail->AddAddress($to, 'usuario');
		
		//Definimos el tema del email
		$mail->Subject = $subject;
		
		//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
		//~ $mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
		$mail->MsgHTML($message);
		
		//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
		$mail->AltBody = $message;
		
		//Enviamos el correo
		$mail->Send();

				
	}
	
	
	public static function recibir_contacto($to, $name, $subject, $message) {
		
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
		
		//Definimos el remitente (dirección y, opcionalmente, nombre)
		$mail->SetFrom($to, $name.' ('.$to.')');
		
		//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
		//~ $mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
		
		//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
		$mail->AddAddress('contacto@unaj-informatica.com.ar', '');
		
		//Definimos el tema del email
		$mail->Subject = $subject;
		
		//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
		//~ $mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
		$mail->MsgHTML($message);
		
		//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
		$mail->AltBody = $message;
		
		//Enviamos el correo
		$mail->Send();

				
	}
	
	
	
}



















?>
