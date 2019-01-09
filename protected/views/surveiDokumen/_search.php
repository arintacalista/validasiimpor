<?php
/* @var $this SurveiDokumenController */
/* @var $model SurveiDokumen */
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
		<?php echo $form->label($model,'id_jenis_survei'); ?>
		<?php echo $form->textField($model,'id_jenis_survei'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_mulai'); ?>
		<?php echo $form->textField($model,'tanggal_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_akhir'); ?>
		<?php echo $form->textField($model,'tanggal_akhir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banyak_dokumen'); ?>
		<?php echo $form->textField($model,'banyak_dokumen'); ?>
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
		<?php echo $form->label($model,'id_pic'); ?>
		<?php echo $form->textField($model,'id_pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'persentase_selesai'); ?>
		<?php echo $form->textField($model,'persentase_selesai'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->