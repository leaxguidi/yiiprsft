<?php
/**
 * si el usuario no está logueado entonces $USERNAME = ''
 * si está logueado $USERNAME = username(BD)
 */
$USERNAME = (Yii::app()->user->isGuest) ? '' : Yii::app()->user->getState('fila')->username;
?>

<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Inicio', 'url'=>array('/site/index')),
                array('label'=>'Visitar', 'url'=>array('/visitas/visitar'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Registro', 'url'=>array('/usuarios/create'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Ingresar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Usuarios', 'url'=>array('/usuarios/admin'), 'visible'=>Yii::app()->user->name === 'admin'),
                array('label'=>'Zonas', 'url'=>array('/zonas/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Perfil', 'url'=>array('/perfil/view'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Salir ('.$USERNAME.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<hr>
	<div class="footer text-center">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
