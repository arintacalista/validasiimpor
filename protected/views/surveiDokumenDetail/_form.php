<?php
/* @var $this SurveiDokumenDetailController */
/* @var $model SurveiDokumenDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survei-dokumen-detail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_survei_dokumen'); ?>
		<?php echo $form->textField($model,'id_survei_dokumen'); ?>
		<?php echo $form->error($model,'id_survei_dokumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dokumen_bersih'); ?>
		<?php echo $form->textField($model,'dokumen_bersih'); ?>
		<?php echo $form->error($model,'dokumen_bersih'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dokumen_salah'); ?>
		<?php echo $form->textField($model,'dokumen_salah'); ?>
		<?php echo $form->error($model,'dokumen_salah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_dibuat'); ?>
		<?php echo $form->textField($model,'tanggal_dibuat'); ?>
		<?php echo $form->error($model,'tanggal_dibuat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disetujui'); ?>
		<?php echo $form->textField($model,'disetujui'); ?>
		<?php echo $form->error($model,'disetujui'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->