<style type="text/css">
    .panel-body.blok1{
        height: 600px;
        overflow-y: scroll;
    }
</style>

<?php $this->pageTitle = Yii::app()->name; ?>

<?php $form = $this->beginWidget('CActiveForm', array(
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'enableClientValidation' => true,
)); ?>
<div class="panel-body blok1">
<h2>Silahkan memilih rincian data yang ingin ditampilkan</h2>

<table>
    <tr>
        <td width="10%"><?= $form->labelEx($model, 'dari_tanggal'); ?></td>
        <td>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'ValidasiForm[dari_tanggal]',
                'value' => $model->dari_tanggal,
                'options' => array(
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'dateFormat' => 'yymm',
                ),
            )); ?>
        </td>
        <td><?= $form->error($model, 'dari_tanggal'); ?></td>
    </tr>
    <tr>
        <td><?= $form->labelEx($model, 'sampai_tanggal'); ?></td>
        <td>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'ValidasiForm[sampai_tanggal]',
                'value' => $model->sampai_tanggal,
                'options' => array(
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'dateFormat' => 'yymm',
                ),
            )); ?>
        </td>
        <td><?= $form->error($model, 'sampai_tanggal'); ?></td>
    </tr>
    <tr>
        <td><?= $form->labelEx($model, 'neg_Asal'); ?></td>
        <td>
            <?= Chosen::activeMultiSelect($model, 'neg_Asal', CHtml::listData(asalnegara::model()->findAll(), 'kodeNeg', 'neg_Asal'), [
                'data-placeholder' => '---Pilih Negara Asal---',
                'options' => [
                    'displaySelectedOptions' => true,
                    'maxSelectedOptions' => 10,
                ],
                'style' => 'width: 400px',
            ]); ?>
        </td>
        <td><?= $form->error($model, 'neg_Asal'); ?></td>
    </tr>
    <tr>
        <td><?= $form->labelEx($model, 'nama_prov'); ?></td>
        <td>
            <?= $form->dropDownList($model, 'nama_prov', CHtml::listData(masterprov::model()->findAll(), 'id_prov', 'nama_prov'), array(
                'ajax' => array(
                    'data' => ['nama_prov' => 'js:this.value'],
                    'type' => 'POST',
                    'url' => CController::createUrl('Validasi/SelectPelbong'),
                    'update' => '#'.CHtml::activeId($model, 'namaPelbong'),
                ),
                'prompt' => '---Pilih Provinsi---',
                'style' => 'width: 400px;',
            )); ?>
        </td>
        <td><?= $form->error($model, 'nama_prov'); ?></td>
    </tr>
    <tr>
        <td><?= $form->labelEx($model, 'namaPelbong'); ?></td>
        <td>
            <?= $form->dropDownList($model, 'namaPelbong', CHtml::listData(pelbongkar::model()->findAll(['order' => 'namaPelbong']), 'idPel', 'namaPelbong'), array(
                // 'ajax' => array(
                //     'data' => ['namaPelbong' => 'js:this.value'],
                //     'type' => 'POST',
                //     'url' => CController::createUrl('Validasi/SelectKomoditas'),
                //     'update' => '#'.CHtml::activeId($model, 'jenisKom'),
                // ),

                'prompt' => '---Pilih Pelabuhan Bongkar---',
                'style' => 'width: 400px;',
            )); ?>
        </td>
        <td><?= $form->error($model, 'namaPelbong'); ?></td>
    </tr>

    <tr>
        <td><?= $form->labelEx($model, 'kodeHS'); ?></td>
        <td>
            <?= $form->dropDownList($model, 'kodeHS', CHtml::listData(Masterhs::model()->findAll(), 'idHS', 'kodeHS'), array(
                'prompt' => '---Pilih jenis HS---',
                'style' => 'width: 400px;',
            )); ?>
        </td>
        <td><?= $form->error($model, 'kodeHS'); ?></td>
    </tr>
    <tr>
        <td colspan="3">
            <?php echo CHtml::submitButton('Lihat', array('class' => 'button blue')); ?>
        </td>
    </tr>
</table>

<?php $this->endWidget(); ?>

<?php
$asalnegaras = $model->neg_Asal;
$series = $categories = $cifkg = [];

if ($model->dari_tanggal && $model->sampai_tanggal) {
    $startDate = DateTime::createFromFormat('Ym', $model->dari_tanggal);
    $endDate = DateTime::createFromFormat('Ym', $model->sampai_tanggal);
    $endDate = $endDate->modify( '+1 month' );
    $interval = DateInterval::createFromDateString('1 month');
    $periods = new DatePeriod($startDate, $interval, $endDate);
    foreach ($periods as $dt) {
        $categories[] = $dt->format('M Y');
    }
}

foreach ((array) $asalnegaras as $i => $kodeNeg) {
    $asalnegara = asalnegara::model()->findByPk($kodeNeg);
    $series[$i]['name'] = $asalnegara->neg_Asal;
    $pelbongkar = pelbongkar::model()->findByPk($model->namaPelbong);
    $masterhs = masterhs::model()->findByPk($model->kodeHS);

    $hs14 = Hs14::model()->findAll([
        'select' => ['idhs14', 'SUM(CIFKG) AS CIFKG', 'WAKTU'],
        'condition' => 'WAKTU >= :waktu_dari AND WAKTU <= :waktu_sampai AND NEG_ASAL = :neg_asal AND PELBONG = :pelbong AND HS = :hs',
        // 'condition' => 'WAKTU >= :waktu_dari AND WAKTU <= :waktu_sampai AND NEG_ASAL = :neg_asal',
        'params' => [
            ':waktu_dari' => $model->dari_tanggal,
            ':waktu_sampai' => $model->sampai_tanggal,
            ':neg_asal' => $asalnegara->neg_Asal,
            ':pelbong' => $pelbongkar->namaPelbong,
            ':hs' => $masterhs->kodeHS,
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
            'align' => 'left',
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
                    'pointFormat' => 'Tahun: {point.x}, CIFKG: {point.y}'
                ]
            ]
        ],

        'series' => $series,
    ),
)); ?>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'chart' => [
            'type' => 'line',
        ],

        'title' => [
            'text' => 'Solar Employment Growth by Sector, 2010-2016'
        ],

        'subtitle' => [
            'text' => 'Source => thesolarfoundation.com'
        ],

        'yAxis' => [
            'title' => [
                'text' => 'Number of Employees'
            ]
        ],
        'legend' => [
            'layout' => 'vertical',
            'align' => 'right',
            'verticalAlign' => 'middle'
        ],

        'plotOptions' => [
            'series' => [
                'pointStart' => 2010
            ]
        ],

        'series' => $series,
    ),
)); ?>




<?php $cifkg = array_filter($cifkg); ?>
<label>Max : </label><?= (count($cifkg) > 0 ? max($cifkg) : '0'); ?><br />
<label>Min : </label><?= (count($cifkg) > 0 ? min($cifkg) : '0'); ?><br />
<label>Average : </label><?= (count($cifkg) > 0 ? (array_sum($cifkg) / count($cifkg)) : '0'); ?><br />
</div>
