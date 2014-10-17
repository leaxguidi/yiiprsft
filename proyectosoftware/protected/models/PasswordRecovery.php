<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class PasswordRecovery extends CActiveRecord
{
	public $email;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email', 'required'),
			array(
				'email',
				'email',
				'message'=>'El formato del email es incorrecto.',
				),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'email'=>'Email',
		);
	}

	/**
	 * se comprueba que el email este registrado en la BD
	 * si el email ingresado por el usuario
	 * coincide con alguno en la BD,
	 * se devuelve el id del usuario. 
	 */	
	public function getIdByEmail($email)
	{
		$filas = Usuarios::model()->findAll();
		foreach ($filas as $fila) {

			if($fila->email == $email)
				return $fila->id;

		}
		$this->addError('email','El Email es incorrecto.');	
		return false;
		
	}	
	/**
	 *	guarda el hash, en la BD,
	 *  generado para la verificacion
	 *  de la cuenta
	 */
	public function saveRandomCodeVerification($id) {	
				
		//~ se crea un hash para el codigo de verificación
		$code = sha1(rand(1, 999999999999));
		
		//~ se obtiene la fila de tabla usuarios mediante el id
		$fila=Usuarios::model()->findByPk($id);
		
		//~ se almacena el hash en la fila del usuario
		$fila->updateByPk($id, array('account_verification_code'=>$code));
		
	}
	
	public function get_mensaje_pass_reset($id, $code) {	
		
		//~ se comprueba si el sistema se ejecuta en el servidor o a nivel local
		$localhost = ($_SERVER['HTTP_HOST'] == 'localhost') ? 'localhost' : '';
		
		//~ el link sera armado en base a la variable $localhost
		$link = $localhost . Yii::app()->baseUrl . '/site/password_recovery?';
		
		$parametros_get = "i=" . $id . "&c=" . $code;
		
		$usuario=Usuarios::model()->findByPk($id)->username;	

		return  " Hola <b>". $usuario ."</b>!!!<br><br> "
				."Alguien ha solicitado cambiar la contraseña de tu cuenta.<br>"
				."Si no fuiste vos, olvida este mensaje.<br><br>"
				."En cambio, si queres restablecer tu contraseña, hace clic "
				."<a href='" . $link . $parametros_get
				."' target='_blank'>aqui</a>"
				." o pega el siguiente enlace en tu navegador. "
				."<a href='" . $link . $parametros_get
				."' target='_blank'>". $link . $parametros_get ."</a><br><br>"
				."Luego de esto, te enviaremos un email con tu nueva contraseña.<br>"
				."No olvides cambiarla al iniciar sesión.<br>"				
				."<br><br>Muchas gracias!!!"
				."<br>El equipo de Proyecto de Software (UNAJ)"
				;
		
		
	}


	/**
	 * se chequea que el codigo de verificacion y el id
	 * recibidos por GET, pertenezcan al mismo usuario en la BD.
	 */
	public function validarGETS($id, $code)
	{
		//~ se comprueba que los parametros recibidos por GET sean correctos
		if ((preg_match('/^[0-9]+$/i', $id)) && (preg_match('/^[a-z0-9]+$/i', $code))) {
			
			//~ se almacena la fila correspondiente al $id de la tabla usuarios(BD)  
			$fila=Usuarios::model()->findByPk($id);

			//~ comprovamos que la fila exista
			if($fila) {
				//~ si el codigo esta asociado al id de usuario
				if ($fila->account_verification_code === $code) {
					return true;
				}
			}

		}
		return false;
		
	}	

	/**
	 * se genera un password aleatorio  
	 * que reemplaza el pass del usuario
	 * se guarda en la BD
	 */
	public function saveRandomPassword($id)
	{
		$pass = rand(100000, 999999);
		//~ se almacena la fila correspondiente al $id del usuarios(BD)  
		$fila=Usuarios::model()->findByPk($id);
		$fila->updateByPk($id, array('password'=>$pass));
		
	}	

	/**
	 * se devuelve el password del usuario (id)  
	 */
	public function getPasswordByID($id)
	{
		return Usuarios::model()->findByPk($id)->password;
		
	}	

	/**
	 * se devuelve el email del usuario (id)  
	 */
	public function getEmailByID($id)
	{
		return Usuarios::model()->findByPk($id)->email;
		
	}	

	/**
	 * se devuelve el account_verification_code del usuario (id)  
	 */
	public function getCodeVerificationByID($id)
	{
		return Usuarios::model()->findByPk($id)->account_verification_code;
		
	}	


}
