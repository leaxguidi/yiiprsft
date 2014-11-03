<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	private $_id;
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
			 * si coincide el password y si el usuario tiene su cuenta activa,
			 * entonces puede iniciar sesión
			 */
			if ($fila->password === sha1($this->password) && $fila->active == 1) {
				
				$this->_id = $fila->id;
				
				/*
				 * Ya que al momento de autenticar al usuario, traemos su fila completa de la BD.
				 * Se aprovecha esto dejando sus datos a disposición durante el tiempo que dure su sesión.
				 * 
				 * Se almacena el array $fila (BD) del usuario:
				 * $this->setState('fila',$fila);
				 * 
				 * Se puede acceder a cualquier campo de la fila (BD)
				 * Yii::app()->user->getState('fila')->id
				 * Yii::app()->user->getState('fila')->username
				 * Yii::app()->user->getState('fila')->email
				 * 
				 **/
				$this->setState('fila',$fila);

				//~ se hace un update para el campo fecha_ultimo_login de la BD
				$fila->updateByPk($fila->id, array('fecha_ultimo_login'=>date('Y-m-d')));
				
				$this->errorCode=self::ERROR_NONE;
			 }
			else
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}

		return !$this->errorCode;
	}
	
	/*
	 * Se sobreescribe el método getId() de la clase padre.
	 * Devuelve el id del usuario
	 * 
	 * Se accede de la forma:
	 * Yii::app()->user->id
	 **/
	public function getId(){
		return $this->_id;
	}


}
