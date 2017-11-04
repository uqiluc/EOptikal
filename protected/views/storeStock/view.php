<?php
/* @var $this StoreStockController */
/* @var $model StoreStock */

$this->breadcrumbs=array(
	'Store Stocks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StoreStock', 'url'=>array('index')),
	array('label'=>'Create StoreStock', 'url'=>array('create')),
	array('label'=>'Update StoreStock', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StoreStock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StoreStock', 'url'=>array('admin')),
);
?>

<h1>View StoreStock #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'goods_stock_id',
		'status',
		'amount',
		'user_id',
	),
)); ?>
