<?php
/* @var $this SurveiDokumenDetailController */
/* @var $model SurveiDokumenDetail */

$this->breadcrumbs=array(
	'Survei Dokumen Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SurveiDokumenDetail', 'url'=>array('index')),
	array('label'=>'Create SurveiDokumenDetail', 'url'=>array('create')),
	array('label'=>'Update SurveiDokumenDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SurveiDokumenDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SurveiDokumenDetail', 'url'=>array('admin')),
);
?>

<h1>View SurveiDokumenDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_survei_dokumen',
		'id_user',
		'dokumen_bersih',
		'dokumen_salah',
		'tanggal_dibuat',
		'disetujui',
		'created_at',
	),
)); ?>
