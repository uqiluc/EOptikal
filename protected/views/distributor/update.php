<?php
/* @var $this DistributorController */
/* @var $model Distributor */

$this->breadcrumbs=array(
	'Distributors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Perbarui Distributor</h3>
    </div>
    <div class="box-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	
	</div>
	</div>
	