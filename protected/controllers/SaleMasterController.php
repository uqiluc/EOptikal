<?php

class SaleMasterController extends Controller
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
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','index','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('history','delete'),
				'users'=>array('admin'),
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
	public function actionIndex($id)
	{
		$SaleDetail=SaleDetail::model()->getDetail($id);	
		$SaleDetailF=new SaleDetail;

		$model2=new BarangStok('search');
		$model2->unsetAttributes();
		if(isset($_GET['BarangStok']))
			$model2->attributes=$_GET['BarangStok'];

		if(isset($_POST['SaleDetail']))
		{
			$SaleDetailF->attributes=$_POST['SaleDetail'];
			$SaleDetailF->master_sale_id=$id;
			if($SaleDetailF->save())
				$this->redirect(array('saleMaster/index','id'=>$model->id));
		}	
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'SaleDetail'=>$SaleDetail,
			'SaleDetailF'=>$SaleDetailF,
			'model2'=>$model2,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($patient_id)
	{
		$model=new SaleMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$model->patient_id = $patient_id;
		$model->note_number = (($model->isNewRecord) ? $model->generateKode() : $model->note_number);;
		$model->date = date('y-m-d');
		$model->user_id = Yii::app()->user->id;
		$model->save(false);
		$this->redirect(array('index','id'=>$model->id));
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

		if(isset($_POST['SaleMaster']))
		{
			$model->attributes=$_POST['SaleMaster'];
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
	 * Manages all models.
	 */
	public function actionHistory()
	{
		$model=new SaleMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SaleMaster']))
			$model->attributes=$_GET['SaleMaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SaleMaster the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SaleMaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SaleMaster $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sale-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
