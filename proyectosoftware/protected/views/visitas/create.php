<?php
/*$this->breadcrumbs=array(
	'Visitases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Visitas','url'=>array('index')),
	array('label'=>'Manage Visitas','url'=>array('admin')),
);*/
?>


<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'Solicitud de Visitas',
	
)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget(); ?>