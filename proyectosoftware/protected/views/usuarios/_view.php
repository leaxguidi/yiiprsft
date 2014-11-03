<div class="view">

<blockquote>
	<?php echo CHtml::link(CHtml::encode('Editar usuario ID '.$data->id),array('view','id'=>$data->id)); ?>
</blockquote>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$data,
	'attributes'=>array(
		'id',
		'dni',
		'username',
		'street',
		'street_number',
		'sexo',
		'password',
		'email',
		'account_verification_code',
		'active',
		'fecha_alta',
		'fecha_ultimo_login',
		'user_type',
		'latitud',
		'longitud',
	),
)); ?>
	<br />
	<hr />
	<br />


</div>
