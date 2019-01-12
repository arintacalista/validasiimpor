<?php

class SurveiDokumenDetailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'add', 'approving', 'notYetApproved'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SurveiDokumenDetail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SurveiDokumenDetail']))
		{
			$model->attributes=$_POST['SurveiDokumenDetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SurveiDokumenDetail']))
		{
			$model->attributes=$_POST['SurveiDokumenDetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SurveiDokumenDetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SurveiDokumenDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SurveiDokumenDetail']))
			$model->attributes=$_GET['SurveiDokumenDetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SurveiDokumenDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SurveiDokumenDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SurveiDokumenDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='survei-dokumen-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAdd()
    {
        $model=new SurveiDokumenDetail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SurveiDokumenDetail']))
		{
			$model->attributes=$_POST['SurveiDokumenDetail'];
			if($model->save())
				$this->redirect(array('add'));
		}

		$this->render('add',array(
			'model'=>$model,
		));
    }

    public function actionApproving($id)
    {
        $id = Yii::app()->request->getParam('id');

        if ($id > 1) {
            $model = SurveiDokumenDetail::model()->findByPk($id);

            if ($model->disetujui == 0) {
                $model->disetujui = 1;
                $model->save();

                $surveiDokumen = $model->idSurveiDokumen;
                $surveiDokumen->dokumen_bersih += $model->dokumen_bersih;
                $surveiDokumen->dokumen_salah += $model->dokumen_salah;
                $surveiDokumen->banyak_dokumen = $surveiDokumen->dokumen_bersih + $surveiDokumen->dokumen_salah;
                $surveiDokumen->persentase_selesai = $surveiDokumen->dokumen_bersih / $surveiDokumen->banyak_dokumen * 100;
                $surveiDokumen->save();
            }

            $this->redirect(['/surveiDokumenDetail/notYetApproved']);
        }
    }

    public function actionNotYetApproved()
	{
		$model = new SurveiDokumenDetail('search');
        $model->unsetAttributes();  // clear any default values
		if(isset($_GET['SurveiDokumenDetail']))
			$model->attributes=$_GET['SurveiDokumenDetail'];

        $model->disetujui = 0;
        $this->render('approve',array(
			'model'=>$model,
		));
	}
}
