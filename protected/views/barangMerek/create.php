<?php
/* @var $this BarangMerekController */
/* @var $model BarangMerek */

$this->breadcrumbs=array(
	'Barang Mereks'=>array('index'),
	'Create',
);

?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Merek Barang</h3>
    </div>
    <div class="box-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	
	</div>
	</div>
	