<style>
/* #container {
    max-width: 1200px;
    min-width: 800px;
    height: 400px;
    margin: 1em auto;
} */
.scrolling-container {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
</style>

<div class="panel-body">
    <h1 class="center">Home</h1>
    <div id="container" data-url="<?= $this->createAbsoluteUrl('api/surveidokumen/chart') ?>"></div>
</div>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-3.1.1.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('https://code.highcharts.com/gantt/highcharts-gantt.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('https://code.highcharts.com/gantt/modules/exporting.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('https://code.highcharts.com/stock/modules/stock.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/site/home.js', CClientScript::POS_END);
?>
