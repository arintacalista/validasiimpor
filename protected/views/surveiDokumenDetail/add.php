<?php
/* @var $this SurveiDokumenDetailController */
/* @var $model SurveiDokumenDetail */

$this->breadcrumbs=array(
	'Survei Dokumen Details'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List SurveiDokumenDetail', 'url'=>array('index')),
	array('label'=>'Manage SurveiDokumenDetail', 'url'=>array('admin')),
);
?>

<h1>SurveiDokumenDetail Tambah</h1>

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
		<?php echo $form->dropDownList($model,'id_survei_dokumen', CHtml::listData(SurveiDokumen::model()->findAll(), 'id', 'jenisSurveiAndKegiatanAndPic'), ['empty' => '']); ?>
		<?php echo $form->error($model,'id_survei_dokumen'); ?>
	</div>

	<?php echo $form->hiddenField($model, 'id_user', ['value' => Yii::app()->user->getId()]); ?>
	<?php echo $form->error($model,'id_user'); ?>

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
		<?php echo $form->textField($model,'tanggal_dibuat', ['readonly' => 'readonly', 'value' => date('Y-m-d')]); ?>
		<?php echo $form->error($model,'tanggal_dibuat'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
