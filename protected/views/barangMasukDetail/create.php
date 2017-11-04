<?php
/* @var $this BarangMasukDetailController */
/* @var $model BarangMasukDetail */

$this->breadcrumbs=array(
	'Barang Masuk Details'=>array('index'),
	'Create',
);


?>
<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Barang Masuk</h3>
    </div>
    <div class="box-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	
	</div>
	</div>
	