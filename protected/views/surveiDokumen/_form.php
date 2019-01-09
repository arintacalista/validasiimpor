<?php
/* @var $this SurveiDokumenController */
/* @var $model SurveiDokumen */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survei-dokumen-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_jenis_survei'); ?>
		<?php echo $form->dropDownList($model,'id_jenis_survei', CHtml::listData(JenisSurvei::model()->findAll(), 'id', 'nama'), ['empty' => '']); ?>
		<?php echo $form->error($model,'id_jenis_survei'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_mulai'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'SurveiDokumen[tanggal_mulai]',
            'value' => $model->tanggal_mulai,
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
            ),
        )); ?>
		<?php echo $form->error($model,'tanggal_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_akhir'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'SurveiDokumen[tanggal_akhir]',
            'value' => $model->tanggal_akhir,
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
            ),
        )); ?>
		<?php echo $form->error($model,'tanggal_akhir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'banyak_dokumen'); ?>
		<?php echo $form->textField($model,'banyak_dokumen'); ?>
		<?php echo $form->error($model,'banyak_dokumen'); ?>
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
		<?php echo $form->labelEx($model,'id_pic'); ?>
		<?php echo $form->dropDownList($model,'id_pic', CHtml::listData(pic::model()->findAll(), 'id', 'kode'), ['empty' => '']); ?>
		<?php echo $form->error($model,'id_pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'persentase_selesai'); ?>
		<?php echo $form->textField($model,'persentase_selesai'); ?>
		<?php echo $form->error($model,'persentase_selesai'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->