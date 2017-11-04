<?php
/* @var $this PermintaanBarangController */
/* @var $model PermintaanBarang */

$this->breadcrumbs=array(
	'Permintaan Barangs'=>array('index'),
	'Create',
);

?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Permintaan</h3>
    </div>
    <div class="box-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	
	</div>
	</div>
	