<?php
/* @var $this SaleDetailController */
/* @var $model SaleDetail */

$this->breadcrumbs=array(
	'Sale Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SaleDetail', 'url'=>array('index')),
	array('label'=>'Manage SaleDetail', 'url'=>array('admin')),
);
?>

<h1>Create SaleDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>