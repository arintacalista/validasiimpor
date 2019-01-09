<?php
/* @var $this SurveiDokumenController */
/* @var $data SurveiDokumen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenis_survei')); ?>:</b>
	<?php echo CHtml::encode($data->id_jenis_survei); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_mulai')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_mulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_akhir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_akhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banyak_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->banyak_dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dokumen_bersih')); ?>:</b>
	<?php echo CHtml::encode($data->dokumen_bersih); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dokumen_salah')); ?>:</b>
	<?php echo CHtml::encode($data->dokumen_salah); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pic')); ?>:</b>
	<?php echo CHtml::encode($data->id_pic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persentase_selesai')); ?>:</b>
	<?php echo CHtml::encode($data->persentase_selesai); ?>
	<br />

	*/ ?>

</div>