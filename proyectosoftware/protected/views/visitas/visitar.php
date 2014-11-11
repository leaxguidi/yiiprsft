<?php
$this->breadcrumbs=array(
	'Visitar',
); ?>

<h1>Pacientes a visitar</h1>

<!--<?php //$this->widget('bootstrap.widgets.TbListView',array(
	//'dataProvider'=>$model,
	//'itemView'=>'_view',
//)); ?>-->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'visitas-grid',
	'dataProvider'=>$model->searchEmployeeID(Yii::app()->user->id),
	//'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'patientid',
			'value'=>'$data->patient->username',
		),
		'address',
		'lat',
		'lon',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>