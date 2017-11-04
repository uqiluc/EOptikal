<?php
/* @var $this SaleMasterController */
/* @var $model SaleMaster */

$this->breadcrumbs=array(
	'Sale Masters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SaleMaster', 'url'=>array('index')),
	array('label'=>'Create SaleMaster', 'url'=>array('create')),
	array('label'=>'View SaleMaster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SaleMaster', 'url'=>array('admin')),
);
?>

<h1>Update SaleMaster <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>