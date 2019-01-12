<?php
/* @var $this SurveiDokumenController */
/* @var $data SurveiDokumen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_survei')); ?>:</b>
	<?php echo CHtml::encode($data->idJenisSurvei->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->idKegiatan->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic')); ?>:</b>
	<?php echo CHtml::encode($data->idPic->nama); ?>
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
	<b><?php echo CHtml::encode($data->getAttributeLabel('persentase_selesai')); ?>:</b>
	<?php echo CHtml::encode($data->persentase_selesai); ?>
	<br />

	*/ ?>

</div>
