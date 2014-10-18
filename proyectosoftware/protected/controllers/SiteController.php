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
			
			$id = $model->getIdByEmail($model->email);
			if ($id) {
				if ($model->isUserActive($id)) {

					$model->saveRandomCodeVerification($id);
					$code = $model->getCodeVerificationByID($id);
					$subject = 'Restablecer password en ' . Yii::app()->name;
					$mensaje = $model->get_mensaje_pass_reset($id, $code);
					
					//~ se envia un email al usuario
					Email::enviar($model->email, $subject, $mensaje);				
				
					$mensaje = "<center><big><b><h3>Restablecer Contraseña</h3>"
								."</b>Revisa tu correo <b>". $model->email
								."</b><br>Te hemos enviado un email para "
								."restablecer tu contraseña</center></big><br>";
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

		if ((isset($_GET['i'])) && (isset($_GET['c']))) {
			//~ se verifican los datos recibidos por GET 
			if($model->validarGETS($_GET['i'], $_GET['c'])) {
				$id = $_GET['i'];
				$model->saveRandomCodeVerification($id);
				$model->saveRandomPassword($id);
				$new_pass = $model->getPasswordByID($id);
				$email = $model->getEmailByID($id);

				$subject = 'Nuevo password en ' . Yii::app()->name;
				$mensaje = 'Tu nueva contraseña es <b>'. $new_pass .'</b><br>'
							.' Te recomendamos que la cambies al iniciar sesión.<br>'
							.'<br><br>Muchas gracias!!!'
							.'<br>El equipo de Proyecto de Software (UNAJ)';
				
				//~ se envia un email al usuario
				Email::enviar($email, $subject, $mensaje);

				$mensaje = "<center><big><b><h3>Tu contraseña se ha modificado.</h3>"
							."</b>Revisa tu correo <b>". $email
							."</b><br>Te hemos enviado un email con "
							."tu <b>nueva contraseña</b></center></big><br>";
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
