<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $dni
 * @property string $username
 * @property string $street
 * @property integer $street_number
 * @property string $sexo
 * @property string $password
 * @property string $email
 * @property string $account_verification_code
 * @property integer $active
 * @property string $fecha_alta
 * @property string $fecha_ultimo_login
 * @property string $user_type
 * @property double $latitud
 * @property double $longitud
 */
class Usuarios extends CActiveRecord
{

	public $repeat_email;
	public $captcha_code;	
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		if(Yii::app()->user->name === 'admin') {
			return array(
				array('dni, username, street, street_number, sexo, password, email, latitud, longitud', 'required'),
				array(
					'dni',
					'validate_dni',
					'message'=>'DNI no disponible.'					
					),
				array(
					'email',
					'validate_email',
					'message'=>'Email no disponible.'
					),				
			);
		}
		else {
			return array(
				array('dni, username, street, street_number, sexo, password, email, repeat_email, captcha_code, latitud, longitud', 'required'),

				array('dni', 'length', 'min'=>7, 'max'=>8),
				array('username', 'length', 'min'=>4, 'max'=>32),
				array('street', 'length', 'min'=>10, 'max'=>255),
				array('street_number', 'length', 'max'=>6),
				array('password', 'length', 'min'=>6, 'max'=>40),
				array('email', 'length', 'min'=>10, 'max'=>64),
				array('captcha_code', 'CaptchaExtendedValidator', 'allowEmpty'=>!CCaptcha::checkRequirements()),
				//~ array('fecha_alta, fecha_ultimo_login, user_type', 'safe'),
				array(
					'dni',
					'match',
					'pattern'=>'/^[0-9]+$/i',
					'message'=>'Solo se permiten números.',
					),
				array(
					'username',
					'match',
					'pattern'=>'/^[a-zàèìòùáéíóúñ ]+$/i',
					'message'=>'Solo se permiten letras y espacios.',
					),
				array(
					'email',
					'email',
					'message'=>'El formato del email es incorrecto.',
					),
				array(
					'repeat_email',
					'compare',
					'compareAttribute'=>'email',
					'message'=>'Las direcciones de Email no coiciden.',
					),							
				array(
					'street_number',
					'match',
					'pattern'=>'/^[0-9]+$/i',
					'message'=>'Solo se permiten números.',
					),
				array(
					'dni',
					'validate_dni',
					'message'=>'DNI no disponible.'					
					),
				array(
					'email',
					'validate_email',
					'message'=>'Email no disponible.'
					),
				array(
					'sexo',
					'validate_sexo',
					),


				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, dni, username, street, street_number, sexo, password, email, account_verification_code, active, fecha_alta, fecha_ultimo_login, user_type, latitud, longitud', 'safe', 'on'=>'search'),
			);
		}
		
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dni' => 'DNI',
			'username' => 'Nombre y Apellido',
			'street' => 'Dirección',
			'street_number' => 'Número',
			'sexo' => 'Sexo',
			'password' => 'Contraseña',
			'email' => 'Email',
			'repeat_email' => 'Repetir Email',
			'captcha_code' => 'Captcha',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('street_number',$this->street_number);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('account_verification_code',$this->account_verification_code,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('fecha_alta',$this->fecha_alta,true);
		$criteria->compare('fecha_ultimo_login',$this->fecha_ultimo_login,true);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('latitud',$this->latitud);
		$criteria->compare('longitud',$this->longitud);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * se comprueba si el SEXO es seleccionado
	 */
	public function validate_sexo() {
		if($this->sexo === 'vacio')
			$this->addError('sexo','Por favor, indica tu sexo.');	
	}

	
	/**
	 * @return array 
	 */	
	public function get_opctions_sexo(){
		return array('vacio' => 'Indica tu sexo', 'Hombre' => 'Hombre', 'Mujer' => 'Mujer', 'Otro' => 'Otro');	
	}	
	
	
	/**
	 * se comprueba mediante AJAX si el DNI ya está registrado en la base de datos
	 */
	public function validate_dni() {
			
		$filas = Usuarios::model()->findAll();
		foreach ($filas as $fila) {
			if($fila->dni == $this->dni)
				$this->addError('dni','DNI no disponible.');
			break;
		}		
	}		
	
	
	/**
	 * se comprueba mediante AJAX si el EMAIL ya está registrado en la base de datos
	 */
	public function validate_email() {

		$filas = Usuarios::model()->findAll();
		foreach ($filas as $fila) {
			if($fila->email == $this->email)
				$this->addError('email','Email no disponible.');
			break;
		}		
	}
	
	/**
	 * return true si se consigue activar la cuenta de usuario.
	 */
	public function activarCuentaUsuario($id, $code)
	{
		//~ se comprueba que los parametros recibidos por GET sean correctos
		if ((preg_match('/^[0-9]+$/i', $id)) && (preg_match('/^[a-z0-9]+$/i', $code))) {
			
			//~ se almacena la fila correspondiente al $id de la tabla usuarios(BD)  
			$fila=Usuarios::model()->findByPk($id);

			//~ comprovamos que la fila exista
			if($fila) {
				//~ si el codigo asociado al id (BD) es igual al codigo recibido por GET
				//~ y la cuenta no está activada (active == 0)
				//~ entonces se activa la cuenta de usuario (active = 1)
				if (($fila->account_verification_code === $code) && ($fila->active == 0)) {
					//~ dentro del array se pasan los campos a ser modificados
					$fila->updateByPk($id, array('active'=>1));
					$fila->updateByPk($id, array('fecha_alta'=>date('Y-m-d')));
					return true;
				}
			}

		}
		return false;
		
	}	
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
