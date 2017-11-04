<?php
/* @var $this PermintaanBarangDetailController */
/* @var $model PermintaanBarangDetail */

$this->breadcrumbs=array(
	'Permintaan Barang Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PermintaanBarangDetail', 'url'=>array('index')),
	array('label'=>'Manage PermintaanBarangDetail', 'url'=>array('admin')),
);
?>

<h1>Create PermintaanBarangDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>