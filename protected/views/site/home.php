<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
<br>

<?php $this->pageTitle = Yii::app()->name; ?>
<h1 class="center">Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<br />

<?php
$waktu_dari = '201501';
$waktu_sampai = '201512';

$hs14 = Hs14::model()->findAll([
    'select' => ['idhs14', 'SUM(CIFKG) AS CIFKG', 'WAKTU'],
    'condition' => 'WAKTU >= :waktu_dari AND WAKTU <= :waktu_sampai',
    'group' => 'WAKTU',
    'params' => [':waktu_dari' => $waktu_dari, ':waktu_sampai' => $waktu_sampai]
]);
// dump($hs14);

$data = CHtml::listData($hs14, 'idhs14' , 'WAKTU');
$categories = array_values($data);
$categories = array_map(
    function ($value) {
        $date = DateTime::createFromFormat('Ym', $value);
        return $date->format('M Y');
    },
    $categories
);
// dump($categories);

$data = CHtml::listData($hs14, 'idhs14' , 'CIFKG');
$data = array_values($data);
$data = array_map(
    function ($value) { return  floatval($value); },
    $data
);
// dump($data);
?>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'title' => array('text' => 'Fruit Consumption'),
        'xAxis' => array(
            // 'categories' => array('Apples', 'Bananas', 'Oranges'),
            'categories' => $categories,
        ),
        'yAxis' => array(
            'title' => array('text' => 'Fruit eaten')
        ),
        'series' => array(
            // array('name' => 'Jane', 'data' => array(1, 0, 4)),
            ['name' => 'total', 'data' => $data],
        )
    )
)); ?>
