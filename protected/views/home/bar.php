<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Bar',
);
?>

<div id="container" style="height: 400px; margin: 0 auto; min-width: 310px;"
    data-categories-url="<?= $this->createAbsoluteUrl('api/home/bar/categories') ?>"
    data-seriesData-url="<?= $this->createAbsoluteUrl('api/home/bar/seriesData') ?>">
</div>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-3.1.1.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('https://code.highcharts.com/highcharts.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('https://code.highcharts.com/modules/exporting.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('https://code.highcharts.com/modules/export-data.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/home/bar.js', CClientScript::POS_END);
