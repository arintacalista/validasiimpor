<head>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<!-- <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->

</head>

<?php


$this->pageTitle=Yii::app()->name;
?>
<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
<br>
<h1 class="center">Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<br>
<br>
<?php $hs14 = Hs14::model()->find([
    'select' => 'SUM(CIFKG) AS TOTAL, WAKTU',
    'condition' => 'WAKTU >= :waktu_dari AND WAKTU <= :waktu_sampai GROUP BY WAKTU',
    'params' => [':waktu_dari' => '201501', ':waktu_sampai' => '201512']
]);
echo '<pre>';
print_r($hs14);
echo '</pre>';
?>
<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
   'options' => array(
      'title' => array('text' => 'Fruit Consumption'),
      'xAxis' => array(
         'categories' => array('Apples', 'Bananas', 'Oranges')
      ),
      'yAxis' => array(
         'title' => array('text' => 'Fruit eaten')
      ),
      'series' => array(
         array('name' => 'Jane', 'data' => array(1, 0, 4)),
         array('name' => 'John', 'data' => array(5, 7, 3))
      )
   )
));
?>