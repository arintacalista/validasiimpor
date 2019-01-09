<?php

class UploadController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionUpload()
	{
		$model=new Upload;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
		if(isset($_POST['Upload']))
		{
			$model->attributes=$_POST['Upload'];
			$model->file=CUploadedFile::getInstance($model,'file');
		if($model->save())
		{
			$model->file->saveAs(Yii::getPathOfAlias('webroot').'/image/'.$model->file);
		$this->redirect(array('view','id'=>$model->id_user));
}
			}
		$this->render('upload',array(
		'model'=>$model,
	));
			}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}