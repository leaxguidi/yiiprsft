<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		//~ dni ingresado en el login
		$dni = $this->username;

		//~ se obtiene la fila completa del usuario (BD)
		//~ si el usuario no esta registrado, $fila es igual a null
		$fila = Usuarios::getDatosByDni($dni);
		
		if($fila) {
			/*
			 * $fila->password es el password del usuario registrado en la BD (es un hash sha1)
			 * si lo comparamos directamente con el password del login nunca va a coincidir
			 * por eso a $this->password hay que aplicarle el mismo hash 
			 * 
			 * si coincide el password y si el usuario tiene su cuenta activa, entonces puede iniciar sesión
			 */
			if ($fila->password === sha1($this->password) && $fila->active == 1)
				$this->errorCode=self::ERROR_NONE;
			else
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}

		return !$this->errorCode;
	}
	
	



}
