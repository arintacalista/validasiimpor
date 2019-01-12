<?php
/* @var $this SurveiDokumenDetailController */
/* @var $model SurveiDokumenDetail */

$this->breadcrumbs=array(
	'Survei Dokumen Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SurveiDokumenDetail', 'url'=>array('index')),
	array('label'=>'Create SurveiDokumenDetail', 'url'=>array('create')),
	array('label'=>'View SurveiDokumenDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SurveiDokumenDetail', 'url'=>array('admin')),
);
?>

<h1>Update SurveiDokumenDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>