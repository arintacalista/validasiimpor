<?php
/* @var $this JenisSurveiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jenis Surveis',
);

$this->menu=array(
	array('label'=>'Create JenisSurvei', 'url'=>array('create')),
	array('label'=>'Manage JenisSurvei', 'url'=>array('admin')),
);
?>

<h1>Jenis Surveis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
