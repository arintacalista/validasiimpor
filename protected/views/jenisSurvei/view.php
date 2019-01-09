<?php
/* @var $this JenisSurveiController */
/* @var $model JenisSurvei */

$this->breadcrumbs=array(
	'Jenis Surveis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JenisSurvei', 'url'=>array('index')),
	array('label'=>'Create JenisSurvei', 'url'=>array('create')),
	array('label'=>'Update JenisSurvei', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JenisSurvei', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JenisSurvei', 'url'=>array('admin')),
);
?>

<h1>View JenisSurvei #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'deskripsi',
	),
)); ?>
