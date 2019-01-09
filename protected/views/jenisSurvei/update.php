<?php
/* @var $this JenisSurveiController */
/* @var $model JenisSurvei */

$this->breadcrumbs=array(
	'Jenis Surveis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JenisSurvei', 'url'=>array('index')),
	array('label'=>'Create JenisSurvei', 'url'=>array('create')),
	array('label'=>'View JenisSurvei', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JenisSurvei', 'url'=>array('admin')),
);
?>

<h1>Update JenisSurvei <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>