<?php

class ValidasiController extends Controller
{
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('validasi','selectPelbong'),
                'users'=>array('*'),
            ),
            // array('allow', // allow authenticated user to perform 'create' and 'update' actions
            //     'actions'=>array('create','update'),
            //     'users'=>array('@'),
            // ),
            // array('allow', // allow admin user to perform 'admin' and 'delete' actions
            //     'actions'=>array('admin','delete'),
            //     'users'=>array('admin'),
            // ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionValidasi()
    {
        $model = new ValidasiForm;

        if (isset($_POST['ValidasiForm'])) {
            $model->attributes = $_POST['ValidasiForm'];
        }

        $this->render('validasi', [
            'model' => $model,
        ]);
    }

    public function actionSelectPelbong()
    {
        $nama_prov = $_POST['nama_prov'];
        $list = Pelbongkar::model()->findAll([
            'condition' => 'id_prov = :id_prov',
            'params' => [':id_prov' => $nama_prov],
            'order' => 'namaPelbong',
        ]);
        $list = CHtml::listData($list, 'idPel', 'namaPelbong');

        echo CHtml::tag('option', array('value' => ''), '---Pilih Pelabuhan Bongkar---', true);

        foreach ($list as $key => $namaPelbong) {
            echo CHtml::tag('option', array('value' => $key), CHtml::encode($namaPelbong), true);
        }
    }

    public function actionSelectKomoditas()
    {
        $$namaPelbong = $_POST['namaPelbong'];
        $list = Jeniskomoditas::model()->findAll('id_prov = :id_prov', array(':id_prov' => $nama_prov));
        $list = CHtml::listData($list, 'idPel', 'namaPelbong');

        echo CHtml::tag('option', array('value' => ''), '---Pilih Pelabuhan Bongkar---', true);

        foreach ($list as $key => $namaPelbong) {
            echo CHtml::tag('option', array('value' => $key), CHtml::encode($namaPelbong), true);
        }
    }
}
