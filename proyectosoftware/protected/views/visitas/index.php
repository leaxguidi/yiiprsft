<?php
$this->breadcrumbs=array(
	'Visitases',
);

$this->menu=array(
	array('label'=>'Create Visitas','url'=>array('create')),
	array('label'=>'Manage Visitas','url'=>array('admin')),
);
?>

<h1>Visitases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
