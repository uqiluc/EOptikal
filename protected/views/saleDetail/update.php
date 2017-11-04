<?php
/* @var $this SaleDetailController */
/* @var $model SaleDetail */

$this->breadcrumbs=array(
	'Sale Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SaleDetail', 'url'=>array('index')),
	array('label'=>'Create SaleDetail', 'url'=>array('create')),
	array('label'=>'View SaleDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SaleDetail', 'url'=>array('admin')),
);
?>

<h1>Update SaleDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>