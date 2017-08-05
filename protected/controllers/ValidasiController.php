<?php

class ValidasiController extends Controller {


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
        // if it is ajax validation request
        $model=new ValidasiForm;
        $model2=new ValidasiForm;
        $neg_Asal = 0;
        $nama_prov=0;
        $namaPelbong = 0;
        $jenisKom=0;
        $HS2 = 0;

        if(isset($_POST['ajax']) && $_POST['ajax']==='client-account-create-form')
        {
            echo CActiveForm::validate($model2);
            Yii::app()->end();
        }

        if (isset($_POST['ValidasiForm'])) {
            $model2->attributes = $_POST['ValidasiForm'];
            $neg_asal = $_POST['ValidasiForm']['neg_asal'];
            $nama_prov = $_POST['ValidasiForm']['nama_prov'];
            $pel_bong = $_POST['ValidasiForm']['namaPelbong'];
            $jenis = $_POST['ValidasiForm']['jenisKom'];
            $HS = $_POST['ValidasiForm']['HS2'];
        }
        $this->render('validasi', array(
            'model' => $model, 'model2' => $model2, 'neg_Asal' => $neg_Asal, 'nama_prov' => $nama_prov, 'namaPelbong' => $namaPelbong, 'jenisKom' => $jenisKom,'HS2' => $HS2));
      

       
       
        
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='validasi-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message
            '];
            else
                $this->render('error ', $error);
        }
    }

    public function actionSelectPelbong()
    {
        $nama_prov = $_POST['nama_prov'];
        $list = Pelbongkar::model()->findAll('id_prov = :id_prov', array(':id_prov' => $nama_prov));
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

 