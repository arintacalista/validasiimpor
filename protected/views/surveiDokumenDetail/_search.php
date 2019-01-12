<?php
/* @var $this SurveiDokumenDetailController */
/* @var $model SurveiDokumenDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_survei_dokumen'); ?>
		<?php echo $form->textField($model,'id_survei_dokumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dokumen_bersih'); ?>
		<?php echo $form->textField($model,'dokumen_bersih'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dokumen_salah'); ?>
		<?php echo $form->textField($model,'dokumen_salah'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_dibuat'); ?>
		<?php echo $form->textField($model,'tanggal_dibuat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disetujui'); ?>
		<?php echo $form->textField($model,'disetujui'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->