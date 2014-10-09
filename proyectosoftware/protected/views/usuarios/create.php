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

<h1>Create Usuarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
