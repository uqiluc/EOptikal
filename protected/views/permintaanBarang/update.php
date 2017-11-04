<?php
/* @var $this PermintaanBarangController */
/* @var $model PermintaanBarang */

$this->breadcrumbs=array(
	'Permintaan Barangs'=>array('index'),
	$model->request_code=>array('view','id'=>$model->request_code),
	'Update',
);

$this->menu=array(
	array('label'=>'List PermintaanBarang', 'url'=>array('index')),
	array('label'=>'Create PermintaanBarang', 'url'=>array('create')),
	array('label'=>'View PermintaanBarang', 'url'=>array('view', 'id'=>$model->request_code)),
	array('label'=>'Manage PermintaanBarang', 'url'=>array('admin')),
);
?>

<h1>Update PermintaanBarang <?php echo $model->request_code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>