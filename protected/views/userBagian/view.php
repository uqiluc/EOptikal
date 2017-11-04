<?php
/* @var $this UserBagianController */
/* @var $model UserBagian */

$this->breadcrumbs=array(
	'User Bagians'=>array('index'),
	$model->name,
);

?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Bagian</h3>
    </div>
    <div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-cog"></i> Kelola',
		array('kelola'),
		array('class' => 'btn btn-primary btn-flat'));
		?>		
<hr>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>"table"),					
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
</div>
</div>
</div>
</div>