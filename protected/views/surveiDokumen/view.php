<?php
/* @var $this SurveiDokumenController */
/* @var $model SurveiDokumen */

$this->breadcrumbs=array(
	'Survei Dokumens'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SurveiDokumen', 'url'=>array('index')),
	array('label'=>'Create SurveiDokumen', 'url'=>array('create')),
	array('label'=>'Update SurveiDokumen', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SurveiDokumen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SurveiDokumen', 'url'=>array('admin')),
);
?>

<h1>View SurveiDokumen #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'id_jenis_survei',
		'tanggal_mulai',
		'tanggal_akhir',
		'banyak_dokumen',
		'dokumen_bersih',
		'dokumen_salah',
		'id_pic',
		'persentase_selesai',
	),
)); ?>
