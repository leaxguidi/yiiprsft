<?php

class PerfilController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
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
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','update','authenticate'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * 
	 */
	public function actionView()
	{
		Yii::app()->user->setState('enabled_update', false);
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * 
	 */
	public function actionAuthenticate()
	{
		Yii::app()->user->setState('enabled_update', false);
		$this->layout='//layouts/thumbnail';
		
		$model=new Perfil;
		
		if(isset($_POST['Perfil']))
		{
			$model->attributes=$_POST['Perfil'];
			$passBD = Yii::app()->user->getState('fila')->password;
			$passFORM = sha1($model->password);
			$model->password = '';			

			if($passBD == $passFORM) {
				Yii::app()->user->setState('enabled_update', true);
				$this->redirect('update');
			}
		}
		
		$this->render('authenticate',array('model'=>$model));

	}

	/**
	 * 
	 */
	public function actionUpdate()
	{
		if(Yii::app()->user->getState('enabled_update')) {
			
			$model=$this->loadModel();

			if(isset($_POST['ajax']) && $_POST['ajax']==='perfil-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			if(isset($_POST['Perfil']))
			{
				$model->attributes=$_POST['Perfil'];
				$fila = Yii::app()->user->getState('fila');
				if($fila == $model)
					$this->redirect(array('view'));
				
				if($fila->password !== $model->password) {
					if($model->validate_password($model->password))
						$model->password = sha1($model->password);
				}
				if($fila->username !== $model->username)
					$model->username = ucwords($model->username);
				
				if($model->save()) {
					Yii::app()->user->setState('fila',$model);
					Yii::app()->user->setState('enabled_update', false);
					$this->redirect(array('view'));
				}
			}
			$this->render('update',array('model'=>$model));
		}
		else {
			$this->redirect(array('view'));
		}		

	}


	/**
	 * 
	 */
	public function loadModel()
	{
		$model=Perfil::model()->findByPk(Yii::app()->user->id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Perfil $model the model to be validated
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
