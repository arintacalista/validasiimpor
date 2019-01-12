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
        <?php echo $form->dropDownList($model,'id_jenis_survei', CHtml::listData(JenisSurvei::model()->orderByNama()->findAll(), 'id', 'nama'), ['empty' => '']); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kegiatan'); ?>
		<?php echo $form->dropDownList($model,'id_kegiatan', CHtml::listData(Kegiatan::model()->orderByNama()->findAll(), 'id', 'nama'), ['empty' => '']); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pic'); ?>
		<?php echo $form->dropDownList($model,'id_pic', CHtml::listData(Pic::model()->orderByNama()->findAll(), 'id', 'kode'), ['empty' => '']); ?>
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
		<?php echo $form->label($model,'persentase_selesai'); ?>
        <?php echo $form->textField($model,'persentase_selesai');$form->textField($model,'persentase_selesai',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
