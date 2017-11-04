<?php
/* @var $this BarangMasukDetailController */
/* @var $model BarangMasukDetail */

$this->breadcrumbs=array(
	'Barang Masuk Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BarangMasukDetail', 'url'=>array('index')),
	array('label'=>'Create BarangMasukDetail', 'url'=>array('create')),
	array('label'=>'Update BarangMasukDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BarangMasukDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BarangMasukDetail', 'url'=>array('admin')),
);
?>

<h1>View BarangMasukDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'incoming_code',
		'goods_name',
		'amount',
		'status',
	),
)); ?>
