<?php
/* @var $this JenisSurveiController */
/* @var $model JenisSurvei */

$this->breadcrumbs=array(
	'Jenis Surveis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JenisSurvei', 'url'=>array('index')),
	array('label'=>'Manage JenisSurvei', 'url'=>array('admin')),
);
?>

<h1>Create JenisSurvei</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>