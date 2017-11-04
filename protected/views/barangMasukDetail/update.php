<?php
/* @var $this BarangMasukDetailController */
/* @var $model BarangMasukDetail */

$this->breadcrumbs=array(
	'Barang Masuk Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Perbarui Barang Masuk</h3>
    </div>
    <div class="box-body">

<?php $this->renderPartial('_forma', array('model'=>$model)); ?>
	
	</div>
	</div>
	