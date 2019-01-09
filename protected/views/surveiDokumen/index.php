<?php
/* @var $this SurveiDokumenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Survei Dokumens',
);

$this->menu=array(
	array('label'=>'Create SurveiDokumen', 'url'=>array('create')),
	array('label'=>'Manage SurveiDokumen', 'url'=>array('admin')),
);
?>

<h1>Survei Dokumens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
