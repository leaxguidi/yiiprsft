
<?php if(!Yii::app()->user->isGuest): ?>
<?php 

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Registro',
);

$this->menu=array(
	array('label'=>'List Usuarios','url'=>array('index')),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>
<?php endif ?>

<?php 
if(Yii::app()->user->hasFlash('success')) {
	$this->widget('bootstrap.widgets.TbAlert', array('alerts'=>array('success'),));
}
else {
	echo '<h1>Create Usuarios</h1>';
	echo $this->renderPartial('_form', array('model'=>$model));
}	

?>
