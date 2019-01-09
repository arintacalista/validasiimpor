<?php
/* @var $this SurveiDokumenController */
/* @var $model SurveiDokumen */

$this->breadcrumbs=array(
	'Survei Dokumens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SurveiDokumen', 'url'=>array('index')),
	array('label'=>'Manage SurveiDokumen', 'url'=>array('admin')),
);
?>

<h1>Create SurveiDokumen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>