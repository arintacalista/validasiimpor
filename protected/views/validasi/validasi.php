<style type="text/css">
    .panel-body.blok1{
        height: 600px;
        overflow-y: scroll;
    }
    .center  {
        text-align: center;
    }
    .box {
     width: 120px;
     height: 100px;
     background-color: #cef6ce;
     border: 2px #B40404;
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
<h2>Pencacahan</h2>

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
                    'dateFormat' => 'yymmdd',
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
                    'dateFormat' => 'yymmdd',
                ),
            )); ?>
        </td>
        <td><?= $form->error($model, 'sampai_tanggal'); ?></td>
    </tr></br>
    </table>



  



    <table><h4>Bisa pilih salah satu dan atau semuanya.</h4>
       <tr>
        <td width="10%"><?= $form->labelEx($model, 'neg_Asal'); ?></td>
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

<script src="../../../js/jquery-3.1.1.min.js"></script>

<?php $this->endWidget(); ?>

<?php
$asalnegaras = $model->neg_Asal;
$series_berat = $series_nilai = $series_cifkg = $categories = $cifkg = [];

if ($model->dari_tanggal && $model->sampai_tanggal) {
    $startDate = DateTime::createFromFormat('Ymd', $model->dari_tanggal); // 2017-08
    $endDate = DateTime::createFromFormat('Ymd', $model->sampai_tanggal); // 2017-09
    $endDate = $endDate->modify( '+1month' ); // end 2017-10
    $interval = DateInterval::createFromDateString('1 month');
    $periods = new DatePeriod($startDate, $interval, $endDate); // interval dari 2017-08 to 2017-10 = 201708, 2017-09
    foreach ($periods as $dt) {
        $categories[] = $dt->format('M Y');
    }
}


if ( ! empty($asalnegaras)) {
    foreach ((array) $asalnegaras as $i => $kodeNeg) {
        $asalnegara = asalnegara::model()->findByPk($kodeNeg);
        $pelbongkar = pelbongkar::model()->findByPk($model->namaPelbong);
        $masterhs = masterhs::model()->findByPk($model->kodeHS);

        $params = [];
        $criteria = new CDbCriteria;
        $criteria->select = ['idhs14', 'SUM(BERAT) AS BERAT', 'SUM(NILAI) AS NILAI', 'WAKTU', 'SUM(CIFKG) AS CIFKG'];
        $criteria->addCondition('WAKTU >= :waktu_dari'); $params[':waktu_dari'] = $model->dari_tanggal;
        $criteria->addCondition('WAKTU <= :waktu_sampai'); $params[':waktu_sampai'] = $model->sampai_tanggal;
        $criteria->addCondition('NEG_ASAL = :neg_asal'); $params[':neg_asal'] = $asalnegara->neg_Asal;

        // if ($model->nama_prov) { $criteria->addCondition('PELBONG = :pelbong'); $params[':pelbong'] = $model->nama_prov; }
        if ($model->namaPelbong) { $criteria->addCondition('PELBONG = :pelbong'); $params[':pelbong'] = $pelbongkar->namaPelbong; }
        if ($model->kodeHS) { $criteria->addCondition('HS = :hs'); $params[':hs'] = $masterhs->kodeHS; }

        $criteria->params = $params;
        $criteria->group = 'WAKTU';
        $hs14 = Hs14::model()->findAll($criteria);

        $data_berat = $data_nilai = [];
        foreach ($hs14 as $row) {
            $data_berat[] = floatval($row->BERAT);
            $data_nilai[] = floatval($row->NILAI);
            $cifkg[] = floatval($row->CIFKG);
        }

        $series_berat[$i]['data'] = $data_berat;
        $series_berat[$i]['name'] = $asalnegara->neg_Asal;
        $series_nilai[$i]['data'] = $data_nilai;
        $series_nilai[$i]['name'] = $asalnegara->neg_Asal;
        $series_cifkg[$i]['data'] = $cifkg;
        $series_cifkg[$i]['name'] = $asalnegara->neg_Asal;
    }
} else {
    $pelbongkar = pelbongkar::model()->findByPk($model->namaPelbong);
    $masterhs = masterhs::model()->findByPk($model->kodeHS);

    $params = [];
    $criteria = new CDbCriteria;
    $criteria->select = ['idhs14', 'SUM(BERAT) AS BERAT', 'SUM(NILAI) AS NILAI', 'WAKTU', 'SUM(CIFKG) AS CIFKG'];
    $criteria->addCondition('WAKTU >= :waktu_dari'); $params[':waktu_dari'] = $model->dari_tanggal;
    $criteria->addCondition('WAKTU <= :waktu_sampai'); $params[':waktu_sampai'] = $model->sampai_tanggal;

    // if ($model->nama_prov) { $criteria->addCondition('PELBONG = :pelbong'); $params[':pelbong'] = $model->nama_prov; }
    if ($model->namaPelbong) { $criteria->addCondition('PELBONG = :pelbong'); $params[':pelbong'] = $pelbongkar->namaPelbong; }
    if ($model->kodeHS) { $criteria->addCondition('HS = :hs'); $params[':hs'] = $masterhs->kodeHS; }

    $criteria->params = $params;
    $criteria->group = 'WAKTU';
    $hs14 = Hs14::model()->findAll($criteria);

    $data_berat = $data_nilai = [];
    foreach ($hs14 as $row) {
        $data_berat[] = floatval($row->BERAT);
        $data_nilai[] = floatval($row->NILAI);
        $cifkg[] = floatval($row->CIFKG);
    }

    $series_berat[0]['data'] = $data_berat;
    $series_nilai[0]['data'] = $data_nilai;
    $series_cifkg[0]['data'] = $cifkg;
}

?>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'chart' => ['type' => 'line'],
        'legend' => [
            'align' => 'right',
            'layout' => 'vertical',
            'verticalAlign' => 'middle'
        ],
        'subtitle' => ['text' => 'Sumber : Dirjen Bea dan Cukai'],
        'title' => ['text' => 'Berat'],
        'xAxis' => ['categories' => $categories],
        'yAxis' => ['title' => ['text' => 'Berat']],
        'series' => $series_berat,
    ),
)); ?>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'chart' => ['type' => 'line'],
        'legend' => [
            'align' => 'right',
            'layout' => 'vertical',
            'verticalAlign' => 'middle'
        ],
        'subtitle' => ['text' => ''],
        'title' => ['text' => 'Nilai'],
        'xAxis' => ['categories' => $categories],
        'yAxis' => ['title' => ['text' => 'Nilai']],
        'series' => $series_nilai,
    ),
)); ?>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'chart' => ['type' => 'line'],
        'legend' => [
            'align' => 'right',
            'layout' => 'vertical',
            'verticalAlign' => 'middle'
        ],
        'subtitle' => ['text' => ''],
        'title' => ['text' => 'Cifkg'],
        'xAxis' => ['categories' => $categories],
        'yAxis' => ['title' => ['text' => 'Cifkg']],
        'series' => $series_cifkg,
    ),
)); ?>

<div class="center"></div>
<div class="box">
    <?php $cifkg = array_filter($cifkg); ?>
    <label><h3>Summary</h3></label><br/>
    <label>Max : </label><?= (count($cifkg) > 0 ? max($cifkg) : '0'); ?><br />
    <label>Min : </label><?= (count($cifkg) > 0 ? min($cifkg) : '0'); ?><br />
    <label>Average : </label><?= (count($cifkg) > 0 ? (array_sum($cifkg) / count($cifkg)) : '0'); ?><br />
</div>

</div>
