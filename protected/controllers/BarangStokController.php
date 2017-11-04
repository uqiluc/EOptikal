<?php

class BarangStokController extends Controller
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
			'ajaxOnly + selectmerek',			
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
				'actions'=>array('index','view','selectmerek'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('kelola','delete','cetak','cetakall'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->bagian==1'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionSelectmerek()
	{
	 $id_jen = $_POST['BarangStok']['type_id'];
	 $list = BarangMerek::model()->findAll('type_id = :id_jen', array(':id_jen'=>$id_jen));
	 $list = CHtml::listData($list,'id','name');

	 echo CHtml::tag('option',array('value'=>''),'-- Pilih Merek --', true);

	 foreach($list as $value=>$name){
	   echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name), true);
	 }
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

	public function actionCetak($id)
	{
		$this->layout = "qrcode";				
		$this->render('cetak',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BarangStok;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BarangStok']))
		{
			$model->attributes=$_POST['BarangStok'];
			$model->goods_code=(($model->isNewRecord) ? $model->generateKode($model->Tipe->mnemonic) : $model->goods_code);
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

		if(isset($_POST['BarangStok']))
		{
			$model->attributes=$_POST['BarangStok'];
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
	public function actionCetakall()
	{
		$this->layout = "qrcode";						
		$dataProvider=new CActiveDataProvider('BarangStok');
		$this->render('cetakall',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionKelola()
	{
		$model=new BarangStok('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BarangStok']))
			$model->attributes=$_GET['BarangStok'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BarangStok the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BarangStok::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BarangStok $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='barang-stok-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
