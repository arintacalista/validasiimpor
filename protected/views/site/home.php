<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
   .panel-body.blok1{
        height: 600px;
        overflow-y: scroll;
    }
</style>
<div class="panel-body blok1">
<br>
<?php $this->pageTitle = Yii::app()->name; ?>
<h1 class="center">Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<br />

<?php
$waktu_dari = '201501';
$waktu_sampai = '201512';
$series = $categories = $cifkg = [];

if ($waktu_dari && $waktu_sampai) {
    $startDate = DateTime::createFromFormat('Ym', $waktu_dari);
    $endDate = DateTime::createFromFormat('Ym', $waktu_sampai);
    $endDate = $endDate->modify( '+1 month' );
    $interval = DateInterval::createFromDateString('1 month');
    $periods = new DatePeriod($startDate, $interval, $endDate);
    foreach ($periods as $dt) {
        $categories[] = $dt->format('M Y');
    }
}

$asalnegaras = asalnegara::model()->findAll(['order' => 'neg_Asal']);
foreach ($asalnegaras as $i => $asalnegara) {
    $series[$i]['name'] = $asalnegara->neg_Asal;

    $hs14 = Hs14::model()->findAll([
        'select' => ['idhs14', 'SUM(CIFKG) AS CIFKG', 'WAKTU'],
        'condition' => 'WAKTU >= :waktu_dari AND WAKTU <= :waktu_sampai AND NEG_ASAL = :neg_asal',
        'params' => [
            ':waktu_dari' => $waktu_dari,
            ':waktu_sampai' => $waktu_sampai,
            ':neg_asal' => $asalnegara->neg_Asal,
        ],
        'group' => 'WAKTU',
    ]);

    $data = [];
    foreach ($hs14 as $row) {
        $data[] = [floatval($row->CIFKG)];
        $cifkg[] = floatval($row->CIFKG);
    }

    $series[$i]['data'] = $data;
}
?>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'chart' => [
            'type' => 'line',
        ],

        'title' => [
            'text' => 'Progres Dokumen '
        ],

        'subtitle' => [
            'text' => 'tahun 2015'
        ],

        'xAxis' => [
            'categories' => $categories,
            'title' => [
                'enabled' => true,
                'text' => 'Waktu'
            ],
            'startOnTick' => true,
            'endOnTick' => true,
            'showLastLabel' => true
        ],

        'yAxis' => [
            'title' => [
                'text' => 'CIFKG'
            ]
        ],
        'legend' => [
            'layout' => 'vertical',
            'align' => 'right',
            'verticalAlign' => 'middle'
        ],


        'series' => $series,
    ),
)); ?>


</br>
<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'chart' => [
            'type' => 'scatter',
            'zoomType' => 'xy'
        ],
        'title' => ['text' => 'Data Impor'],
        'subtitle' => ['text' => 'Sumber : Dirjen Bea dan Cukai'],
        'xAxis' => [
            'categories' => $categories,
            'title' => [
                'enabled' => true,
                'text' => 'Waktu'
            ],
            'startOnTick' => true,
            'endOnTick' => true,
            'showLastLabel' => true
        ],
        'yAxis' => [
            'title' => ['text' => 'CIFKG']
        ],
        'legend' => [
            'layout' => 'vertical',
            'align' => 'right',
            'verticalAlign' => 'top',
            'x' => 100,
            'y' => 70,
            'floating' => true,
            // 'backgroundColor' => "(Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'",
            'borderWidth' => 1
        ],
        'plotOptions' => [
            'scatter' => [
                'marker' => [
                    'radius' => 5,
                    'states' => [
                        'hover' => [
                            'enabled' => true,
                            'lineColor' => 'rgb(100,100,100)'
                        ]
                    ]
                ],
                'states' => [
                    'hover' => [
                        'marker' => ['enabled' => false]
                    ]
                ],
                'tooltip' => [
                    'headerFormat' => '<b>{series.name}</b><br>',
                    'pointFormat' => ' CIFKG: {point.y}'
                ]
            ]
        ],

        'series' => $series,
    ),
)); ?>

<!-- <div class="center">
<?php
//    exec('C:\Windows\System32\cmd.exe /c START C:\xampp\htdocs\validasiImpor\rscript\run.bat');
    // echo '<a href="output95/output.png">Click Here</a>';
   // echo '<img src="output95/output.png"/>';
?>
</div> -->
</div>

