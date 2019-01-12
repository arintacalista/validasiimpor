<?php
/* @var $this SurveiDokumenDetailController */
/* @var $data SurveiDokumenDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_survei_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->id_survei_dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dokumen_bersih')); ?>:</b>
	<?php echo CHtml::encode($data->dokumen_bersih); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dokumen_salah')); ?>:</b>
	<?php echo CHtml::encode($data->dokumen_salah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_dibuat')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_dibuat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disetujui')); ?>:</b>
	<?php echo CHtml::encode($data->disetujui); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	*/ ?>

</div>