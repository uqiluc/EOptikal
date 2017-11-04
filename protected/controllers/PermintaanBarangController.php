<?php

class PermintaanBarangController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('kelola','delete','autocomplete','cetak'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->bagian==1'								
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCetak($id)
	{
		$this->layout = "print";				
		$PBDetail=PermintaanBarangDetail::model()->getDetail($id);
		$this->render('cetak',array(
			'model'=>$this->loadModel($id),
			'PBDetail'=>$PBDetail,
		));
	}

	public function actionAutocomplete()
	{
	 $res =array();

	            if (isset($_GET['term'])) {
	                    $qtxt ="SELECT name from goods_stock WHERE name LIKE :name
	                            ORDER BY name ASC"; 
	                    $command =Yii::app()->db->createCommand($qtxt);
	                    $command->bindValue(":name", $_GET['term'].'%', PDO::PARAM_STR);
	                    $res =$command->queryColumn();
	            }

	            echo CJSON::encode($res);
	            Yii::app()->end();
	 }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$PBDetail=PermintaanBarangDetail::model()->getDetail($id);
		$PBFDetail=new PermintaanBarangDetail;
		if(isset($_POST['PermintaanBarangDetail']))
		{
			$PBFDetail->attributes=$_POST['PermintaanBarangDetail'];
			$PBFDetail->request_code=$id;
			if($PBFDetail->save())
				$this->redirect(array('permintaanBarang/view/id/'.$id));
		}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'PBDetail'=>$PBDetail,
			'PBFDetail'=>$PBFDetail,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PermintaanBarang;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PermintaanBarang']))
		{
			$model->attributes=$_POST['PermintaanBarang'];
			$model->user_id=Yii::app()->user->id;
			$model->store_id=Yii::app()->user->bagian;
			$model->date=date('Y-m-d');

			if($model->save())
				$this->redirect(array('PermintaanBarang/view/id/'.$model->request_code));
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

		if(isset($_POST['PermintaanBarang']))
		{
			$model->attributes=$_POST['PermintaanBarang'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->request_code));
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
		$dataProvider=new CActiveDataProvider('PermintaanBarang');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionKelola()
	{
		$model=new PermintaanBarang('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PermintaanBarang']))
			$model->attributes=$_GET['PermintaanBarang'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PermintaanBarang the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PermintaanBarang::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PermintaanBarang $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='permintaan-barang-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
