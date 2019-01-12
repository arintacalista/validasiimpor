<?php
/* @var $this SurveiDokumenDetailController */
/* @var $model SurveiDokumenDetail */

$this->breadcrumbs=array(
	'Survei Dokumen Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SurveiDokumenDetail', 'url'=>array('index')),
	array('label'=>'Manage SurveiDokumenDetail', 'url'=>array('admin')),
);
?>

<h1>Create SurveiDokumenDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>