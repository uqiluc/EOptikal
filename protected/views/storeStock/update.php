<?php
/* @var $this StoreStockController */
/* @var $model StoreStock */

$this->breadcrumbs=array(
	'Store Stocks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StoreStock', 'url'=>array('index')),
	array('label'=>'Create StoreStock', 'url'=>array('create')),
	array('label'=>'View StoreStock', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StoreStock', 'url'=>array('admin')),
);
?>

<h1>Update StoreStock <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>