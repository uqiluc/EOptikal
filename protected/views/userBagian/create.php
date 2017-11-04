<?php
/* @var $this UserBagianController */
/* @var $model UserBagian */

$this->breadcrumbs=array(
	'User Bagians'=>array('index'),
	'Create',
);

?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Bagian</h3>
    </div>
    <div class="box-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	
	</div>
	</div>
	