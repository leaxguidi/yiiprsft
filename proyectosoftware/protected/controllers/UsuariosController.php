<?php

class UsuariosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	public function actions()
	{
		return array(
            'captcha'=>array(
                'class'=>'CaptchaExtendedAction',
                // if needed, modify settings
                'mode'=>CaptchaExtendedAction::MODE_MATH,
            ),
        );
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('RegistroUsuario','captcha'),
				'expression'=>'Yii::app()->user->isGuest;'
			),		
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','index','view','update'),
				//'users'=>array('admin'),
				'expression'=>'Yii::app()->user->checkAccess("RBAC Manager")',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuarios;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		//~ ---------  SE REGISTRA LA CUENTA DE USUARIO  ----------------------
		if(isset($_POST['Usuarios']))
		{	
			$model->attributes=$_POST['Usuarios'];
			
			$model->password = (empty($model->password)) ? '' : sha1($model->password);
			$model->account_verification_code = sha1(rand(1, 999999999999));
			$model->username = ucwords($model->username);
			if($model->save()) {
				if(Yii::app()->user->isGuest) {
					
					//~ se envia el email al usuario
					$subject = 'Confirmar registro en ' . Yii::app()->name;
					$mensaje = $model->get_mensaje_activar_cuenta(
								$model->username, $model->id, $model->account_verification_code);
					Yii::app()->authManager->assign('B7f8d198!paciente',$model->id);
					Email::enviar($model->email, $subject, $mensaje);
					
					//~ se muestra un mensaje flash al usuario
					$mensaje = $model->get_mensaje_revisar_correo(
								$model->username, $model->email);
					Yii::app()->user->setFlash('success', $mensaje);	//'success','error','notice','info'
					$this->refresh();				
				}
				else
					$this->redirect(array('view','id'=>$model->id));
			
			}
		}
		//~ ---------  SE ACTIVA LA CUENTA DE USUARIO  -------------------------------------------
		
		//~ se recive el id de usuario y un hash aleatorio generado durante el registro de usuario
		else if ((isset($_GET['i'])) && (isset($_GET['c']))) {
			$id = $_GET['i'];
			$code = $_GET['c'];
			
			//~ se verifica que los datos tengan el formato correspondiente
			if($model->validarGETS($id, $code)) {
				
				//~ se activa la cuenta si el usuario está en la BD
				if($model->activarCuentaUsuario($_GET['i'], $_GET['c'])) {
				
					//~ se muestra un mensaje flash al usuario
					$username = $model->getDatosById($id)->username;
					$mensaje = "Felicitaciones <b>".$username."</b>!!! Ya puedes iniciar sesión.";
					$mensaje = $model->get_formato_html($mensaje);
					Yii::app()->user->setFlash('success', $mensaje);	//'success','error','notice','info'
				}
			}
			$this->redirect('create');
		}
		
		//~ se renueva el captcha_code
		Yii::app()->getController()->createAction('captcha')->getVerifyCode(true);
		
		$this->render('create',array('model'=>$model));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			$model->setAttribute('password',sha1($model->password));
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuarios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Usuarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	

}
