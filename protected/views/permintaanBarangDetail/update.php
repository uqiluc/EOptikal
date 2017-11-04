<?php
/* @var $this PermintaanBarangDetailController */
/* @var $model PermintaanBarangDetail */

$this->breadcrumbs=array(
	'Permintaan Barang Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PermintaanBarangDetail', 'url'=>array('index')),
	array('label'=>'Create PermintaanBarangDetail', 'url'=>array('create')),
	array('label'=>'View PermintaanBarangDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PermintaanBarangDetail', 'url'=>array('admin')),
);
?>

<h1>Update PermintaanBarangDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>