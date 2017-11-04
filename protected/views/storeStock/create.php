<?php
/* @var $this StoreStockController */
/* @var $model StoreStock */

$this->breadcrumbs=array(
	'Store Stocks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StoreStock', 'url'=>array('index')),
	array('label'=>'Manage StoreStock', 'url'=>array('admin')),
);
?>

<h1>Create StoreStock</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>