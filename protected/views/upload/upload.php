
<h1>Upload File</h1>

<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'aturTimeline',
	'htmlOptions' => array ('enctype' => 'multipart/form-data','autocomplete'=>'off'),
	'enableAjaxValidation'=>false,
)
); 

?>
<div class="row"> <?php echo $form->labelEx($model,'file'); ?>
<?php echo 
		$form->fileField($model,'file',array('size'=>50,'maxlength'=>50)); ?>
<?php echo 
		$form->error($model,'file'); 
		?>
</div></br>
</br>
 <?php echo CHtml::submitButton('Upload', array('class' => 'button blue')); ?>
<?php $this->endWidget(); ?>