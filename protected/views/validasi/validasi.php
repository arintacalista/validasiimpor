<head>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- <script type = "text/javascript">
    jQuery(document).ready(function()){
    jQuery('#kodeNeg').change(function(){
    var kodeNeg = jQuery('#kodeNeg').val();
    getProvinsi (kodeNeg,)
})
} </script> -->
</head>

<?php $this->pageTitle = Yii::app()->name; ?>

<?php $form = $this->beginWidget('CActiveForm', array(
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'enableClientValidation' => true,
)); ?>

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
                    'maxSelectedOptions' => 5,
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
        <td><?= $form->labelEx($model, 'jenisKom'); ?></td>
        <td>
            <?= $form->dropDownList($model, 'jenisKom', CHtml::listData(jeniskomoditas::model()->findAll(), 'idKomoditas', 'jenisKom'), array(
                'prompt' => '---Pilih Jenis Komoditas---',
                'style' => 'width: 400px;',
            )); ?>
        </td>
        <td><?= $form->error($model, 'jenisKom'); ?></td>
    </tr>
    <tr>
        <td><?= $form->labelEx($model, 'HS2'); ?></td>
        <td>
            <?= $form->dropDownList($model, 'HS2', CHtml::listData(masterkodeHS::model()->findAll(), 'idHS', 'HS2'), array(
                'prompt' => '---Pilih HS2---',
                'style' => 'width: 400px;',
            )); ?>
        </td>
        <td><?= $form->error($model, 'HS2'); ?></td>
    </tr>
    <tr>
        <td colspan="3">
            <?php echo CHtml::submitButton('Lihat', array('class' => 'button blue')); ?>
        </td>
    </tr>
</table>

<?php $this->endWidget(); ?>

<?php

$this->Widget('ext.highchart.highcharts.HighchartsWidget', array(

    'options'=>"{

        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00'],

        chart: {

            backgroundColor: {

                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },

                stops: [

                    [0, 'rgb(96, 96, 96)'],

                    [1, 'rgb(16, 16, 16)']

                ]

            },

            borderWidth: 0,

            borderRadius: 15,

            plotBackgroundColor: null,

            plotShadow: false,

            plotBorderWidth: 0

        },

        'title': {

            style: {

                color: '#FFF',

            },

            'text': 'Data Impor',

            'x': -20 //center

        },

        'subtitle': {

            style: {

                color: '#FF0000',

            },
            'text': 'tahun 2015',

            'x': -20

         },



        'xAxis': {

            'categories': ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',

                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

        },



        'yAxis': {

            'title': {

                'text': 'Cifkg'

            },

        },

        'tooltip': {

            'valueSuffix': '10^6'

        },

        'legend': {

            'layout': 'vertical',
            'align': 'right',

            'verticalAlign': 'middle',

            'borderWidth': 0

        },

        'series': [{

            'name': 'SG',

            'data': [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]

            }, {

            'name': 'DE',

            'data': [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]

            }, {

            'name': 'NZ',

            'data': [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]

            }, {

            'name': 'CA',

            'data': [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]

            }]

        }"

));

?>

 </div>





 </div>
