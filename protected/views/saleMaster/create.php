<?php
/* @var $this SaleMasterController */
/* @var $model SaleMaster */

$this->breadcrumbs=array(
	'Sale Masters'=>array('index'),
	'Create',
);

?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-body">

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	
	</div>
	</div>
	</div>
</div>