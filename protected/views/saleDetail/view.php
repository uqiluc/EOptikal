<?php
/* @var $this SaleDetailController */
/* @var $model SaleDetail */

$this->breadcrumbs=array(
	'Sale Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SaleDetail', 'url'=>array('index')),
	array('label'=>'Create SaleDetail', 'url'=>array('create')),
	array('label'=>'Update SaleDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SaleDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SaleDetail', 'url'=>array('admin')),
);
?>

<h1>View SaleDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'master_sale_id',
		'goods_id',
		'amount_of_purchase',
		'unit_price',
		'total',
	),
)); ?>
