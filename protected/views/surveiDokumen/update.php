<?php
/* @var $this SurveiDokumenController */
/* @var $model SurveiDokumen */

$this->breadcrumbs=array(
	'Survei Dokumens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SurveiDokumen', 'url'=>array('index')),
	array('label'=>'Create SurveiDokumen', 'url'=>array('create')),
	array('label'=>'View SurveiDokumen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SurveiDokumen', 'url'=>array('admin')),
);
?>

<h1>Update SurveiDokumen <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>