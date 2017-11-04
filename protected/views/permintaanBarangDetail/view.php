<?php
/* @var $this PermintaanBarangDetailController */
/* @var $model PermintaanBarangDetail */

$this->breadcrumbs=array(
	'Permintaan Barang Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PermintaanBarangDetail', 'url'=>array('index')),
	array('label'=>'Create PermintaanBarangDetail', 'url'=>array('create')),
	array('label'=>'Update PermintaanBarangDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PermintaanBarangDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PermintaanBarangDetail', 'url'=>array('admin')),
);
?>

<h1>View PermintaanBarangDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'request_code',
		'goods_name',
		'amount',
		'status',
	),
)); ?>
