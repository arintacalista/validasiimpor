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
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'validasi-form',
  'enableClientValidation'=>true,
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
)); ?>
 </div>

       
   
 <h2 style="margin-left: 18px;">Silahkan memilih rincian data yang ingin ditampilkan</h2>
  

    <table style="margin-left: 20px;">
    <tr><td style="width: 130px;"><?php echo $form->labelEx($model,'Dari tanggal'); ?>
        <?php //echo $form->textField($model,'birthday');
         $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'=>'tgl[dari_tanggal]',
            'value'=>$model->dari_tanggal,
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'yy-mm-dd',
                 'changeMonth'=> 'true',
                'changeYear'=> 'true',
            ),
        ));
         ?>
        <?php echo $form->error($model,'Dari tanggal'); ?>
    </div></tr>
    <tr>
          <td style="width: 130px;"> <?php echo $form->labelEx($model,'Sampai tanggal'); ?>
        <?php //echo $form->textField($model,'birthday');
         $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'=>'tgl[sampai_tang            gal]',
            'value'=>$model->sampai_tanggal,
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'yy-mm-dd',
                 'changeMonth'=> 'true',
                'changeYear'=> 'true',
            ),
        ));
         ?></tr>
        <?php echo $form->error($model,'Sampai tanggal'); ?>
        <tr>
            <td style="width: 130px;"><?php echo $form->labelEx($model2, 'neg_Asal'); ?></td>
            <td>
                <?php
                echo $form->dropDownList($model2, 'neg_Asal', CHtml::listData(asalnegara::model()->findAll(), 'kodeNeg', 'neg_Asal'), array(
                    'prompt' => '---Pilih Negara Asal---', 'style' => 'width: 400px;', 'required' => TRUE,
                ));
                ?>
                <?php
                echo Chosen::activeMultiSelect($model2, 'neg_Asal', $CHtml::listData(asalnegara::model()->findAll(), 'kodeNeg', 'neg_Asal'), array(
                   
                ));
                ?>
            </td>
        </tr>
    <tr>
            <td style="width: 130px;"><?php echo $form->labelEx($model2, 'nama_prov'); ?></td>
            <td>
                <?php echo $form->dropDownList($model2, 'nama_prov', CHtml::listData(masterprov::model()->findAll(), 'id_prov', 'nama_prov'),
                    array(
                        'ajax' => array(
                            'data' => ['nama_prov' => 'js:this.value'],
                            'type' => 'POST',
                            'url' => CController::createUrl('Validasi/SelectPelbong'),
                            'update' => '#'.CHtml::activeId($model2, 'namaPelbong'),
                        ),
                        'prompt' => '---Pilih Provinsi---',
                        'required' => TRUE,
                        'style' => 'width: 400px;',
                    )
                ); ?>
            </td>
        </tr>

         <tr>
            <td style="width: 130px;"><?php echo $form->labelEx($model2, 'namaPelbong'); ?></td>
            <td>
                <?php
                echo $form->dropDownList($model2, 'namaPelbong', CHtml::listData(pelbongkar::model()->findAll(), 'idPel', 'namaPelbong'),
                    array(
                        // 'ajax' => array(
                        //     'data' => ['namaPelbong' => 'js:this.value'],
                        //     'type' => 'POST',
                        //     'url' => CController::createUrl('Validasi/SelectKomoditas'),
                        //     'update' => '#'.CHtml::activeId($model2, 'jenisKom'),
                        // ),
                        'prompt' => '---Pilih Pelabuhan Bongkar---',
                        'required' => TRUE,
                        'style' => 'width: 400px;',
                    )
                );
                ?>
            </td>
        </tr>
       <tr>
            <td style="width: 130px;"><?php echo $form->labelEx($model2, 'jenisKom'); ?></td>
            <td>
                <?php
                echo $form->dropDownList($model2, 'jenisKom', CHtml::listData(jeniskomoditas::model()->findAll(), 'idKomoditas', 'jenisKom'), array(
                    'prompt' => '---Pilih Jenis Komoditas---', 'style' => 'width: 400px;', 'required' => TRUE,
                ));
                ?>
            </td>
        </tr>
     <tr>
            <td style="width: 130px;"><?php echo $form->labelEx($model2, 'HS2'); ?></td>
            <td>
                <?php
                echo $form->dropDownList($model2, 'HS2', CHtml::listData(masterkodeHS::model()->findAll(), 'idHS', 'HS2'), array(
                    'prompt' => '---Pilih HS2---', 'style' => 'width: 400px;', 'required' => TRUE,
                ));
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo CHtml::submitButton('Lihat', array('class' => 'button blue')); ?>
            </td>
            <td>
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

