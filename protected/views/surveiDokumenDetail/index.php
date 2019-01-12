<?php
/* @var $this SurveiDokumenDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Survei Dokumen Details',
);

$this->menu=array(
	array('label'=>'Create SurveiDokumenDetail', 'url'=>array('create')),
	array('label'=>'Manage SurveiDokumenDetail', 'url'=>array('admin')),
);
?>

<h1>Survei Dokumen Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
