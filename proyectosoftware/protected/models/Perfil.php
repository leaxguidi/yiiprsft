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
class Perfil extends CActiveRecord
{
	
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
			return array(
				array('dni, username, street, street_number, sexo, password, email, latitud, longitud', 'required'),
				array('username', 'length', 'min'=>4, 'max'=>32),
				array('street', 'length', 'min'=>10, 'max'=>255),
				array('street_number', 'length', 'max'=>6),
				array('password', 'length', 'min'=>6, 'max'=>40),
				array('email', 'length', 'min'=>10, 'max'=>64),				
				array(
					'username',
					'validate_username',
					'message'=>'Nonbre de usuario no disponible.'
					),
				array(
					'email',
					'validate_email',
					'message'=>'Email no disponible.'
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
					'street_number',
					'match',
					'pattern'=>'/^[0-9]+$/i',
					'message'=>'Solo se permiten números.',
					),					
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
			'fecha_alta' => 'Usuario desde',
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
	 * se comprueba mediante AJAX si el EMAIL ya está registrado en la base de datos
	 */
	public function validate_email() {

		$email = Yii::app()->user->getState('fila')->email;
		if ($this->email !== $email) {
			$filas = Usuarios::model()->findAll();
			foreach ($filas as $fila) {
				if($fila->email == $this->email)
					$this->addError('email','Email no disponible.');
				break;
			}		
		}		
	}
	
	/**
	 * se comprueba mediante AJAX que el USERNAME sea distinto de 'admin'
	 */
	public function validate_username() {

		if(strtolower($this->username) == 'admin')
			$this->addError('username','Usuario no disponible.');
	}

	/**
	 * se comprueba mediante AJAX que el Password sea distinto de 'admin'
	 */
	public function validate_password($pass) {

		if(empty($pass) || strlen($pass) < 6 || strlen($pass) > 40) {
			$this->addError('password','Password incorrecto.');
			return false;
		}
		return true;
	}

	/**
	 * @return la fila correspondiente al DNI de usuario en la BD. 
	 */	
	public static function getDatosByDni($dni)
	{
		$filas = Usuarios::model()->findAll();
		foreach ($filas as $fila) {
			if($fila->dni == $dni)
				return $fila;
		}
		return null;
		
	}
	
	/**
	 * @return la fila correspondiente al EMAIL de usuario en la BD. 
	 */	
	public static function getDatosByEmail($email)
	{
		$filas = Usuarios::model()->findAll();
		foreach ($filas as $fila) {
			if($fila->email === $email)
				return $fila;
		}
		return null;
		
	}
	
	/**
	 * @return la fila correspondiente al ID de usuario en la BD. 
	 */	
	public static function getDatosById($id)
	{
		return Usuarios::model()->findByPk($id);
		
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
