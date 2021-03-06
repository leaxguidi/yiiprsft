<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		//~ return array(
            //~ 'captcha'=>array(
                //~ 'class'=>'CaptchaExtendedAction',
                //~ // if needed, modify settings
                //~ 'mode'=>CaptchaExtendedAction::MODE_MATH,
            //~ ),
        //~ );
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}


	/**
	 * Password_recovery
	 */
	public function actionPassword_recovery()
	{
		$model=new PasswordRecovery;

		// if it is ajax validation request
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='password-recovery')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		
		if(isset($_POST['PasswordRecovery']))
		{
			$model->attributes=$_POST['PasswordRecovery'];
			
			//~ traemos la fila de la BD correspondiente al email
			$fila = $model->getDatosByEmail($model->email);
			
			//~ si no existe el usuario
			if (!$fila)
				$model->addError('email','Email no disponible.');
			
			else {
				$id = $fila->id;
				//~ si tiene cuenta activa
				if ($fila->active) {

					$model->saveRandomCodeVerification($id);
					$code = $model->getDatosById($id)->account_verification_code;
					$subject = 'Restablecer password en ' . Yii::app()->name;
					$mensaje = $model->get_mensaje_pass_reset($id, $code);
					
					//~ se envia un email al usuario
					Email::enviar($model->email, $subject, $mensaje);
					$mensaje = $model->get_mensaje_restablecer_pass($model->email);
					Yii::app()->user->setFlash('success', $mensaje);	//'success','error','notice','info'
					$this->refresh();				
				}
				else {
					Yii::app()->user->setFlash('success', 
								'<br><center><big>No podes cambiar tu <b>contraseña</b>.<br>'
								.'Primero tenes que <b>activar tu cuenta</b> desde tu correo.</center></big><br>');	
					$this->refresh();
				}
			}
		}

		/*
		 * se reciben los datos (id, codigo_verificacion) por método GET
		 * son enviados por el usuario (link recibido en su correo)
		 * para restablecer su contraseña.
		 */
		if ((isset($_GET['i'])) && (isset($_GET['c']))) {
			/*
			 * se verifican los datos recibidos por GET
			 * y se comprueba que esten registrados en la BD
			 */
			if($model->validarGETS($_GET['i'], $_GET['c'])) {
				//~ se obtiene el id de usuario
				$id = $_GET['i'];
				//~ se guarda en la BD un nuevo código de verificación
				$model->saveRandomCodeVerification($id);
				//~ se guarda en la BD un nuevo password hasheado y se obtiene el pass sin hashear
				$new_pass = $model->saveAndGetRandomPassword($id);
				//~ se ontiene el email del usuario 
				$email = $model->getDatosById($id)->email;

				$subject = 'Nuevo password en ' . Yii::app()->name;
				$mensaje = $model->get_mensaje_nuevo_pass($new_pass);
				//~ se envia un email al usuario
				Email::enviar($email, $subject, $mensaje);

				$mensaje = $model->get_mensaje_pass_modificado($email);
				Yii::app()->user->setFlash('success', $mensaje);	//'success','error','notice','info'
				$this->refresh();
			
			}
			else
				$this->redirect('login');
							
		}
		
		// display the login form
		$this->render('password_recovery',array('model'=>$model));
	}



	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
