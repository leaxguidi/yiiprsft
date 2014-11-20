<?php 
    /* Input dialog with Javascript callback */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog2',
        'options'=>array(
            'title'=>'Ingresa tu Contraseña',
            'autoOpen'=>false,
            'modal'=>true,
            //~ 'buttons'=>array(
                //~ 'Enviar'=>'js:addItem',
                //~ 'Cancel'=>'js:function(){ $(this).dialog("close");}',
            //~ ),
        ),
    ));?>
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'usuarios-form',
		'type'=>'horizontal',
		'enableClientValidation'=>true,
		'enableAjaxValidation'=>true,
	));?>
	<div class="well">
		<div class="dialog_input">
			<input class="span2" 
			type="password" name="Perfil[password]" id="Perfil_password" onkeypress="return pulsar(event)"
			value="<?php echo $model->password;  ?>" >
		</div>
		<br>

		<button class="btn btn-primary" type="submit" name="yt0">Enviar</button>
	</div>
		
	<?php $this->endWidget('bootstrap.widgets.TbActiveForm');?>
	<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>

<?php 
	echo '<blockquote>';
	echo '<br>';
	
		echo '<hr>';
		echo '<h5>';
		echo '<li>';
		echo CHtml::link('ACTUALIZAR PERFIL', '#', array(
				'onclick'=>'$("#mydialog2").dialog("open"); return false;'));
		echo '</li>';
		echo '</h5>';
		echo '<hr>';
		
		echo '<h5>';
		echo '<li>';
		echo CHtml::link(CHtml::encode('VER PERFIL'),array('view'));
		echo '</li>';
		echo '</h5>';
		echo '<hr>';
	    
	echo '<br>';
	echo '<sript>';
	echo '</blockquote>';
  	
?>
<?php /* include your relevant javascript somewhere */ ?>
<script type="text/javascript" >
    var input = document.getElementById('Perfil_password').value;
    function addItem(){
        $(this).dialog("close");
        console.log(document.getElementById('Perfil_password').value);
        document.getElementById('Perfil_password').value = '';
        
        //~ alert( $("#Perfil_password").val() + " has been added");
    }
</script>

