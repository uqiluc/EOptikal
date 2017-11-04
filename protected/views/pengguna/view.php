<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */

$this->breadcrumbs=array(
	'Penggunas'=>array('index'),
	$model->id,
);

?>
<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Pengguna #<?php echo $model->fullname; ?></h3>
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
		array(
			'name'=>'part_id',
			'value'=>$model->Bagian->name,
		),
		'fullname',
		'birth',
		'address',
		'username',
		array(
			'name'=>'part_id',
			'value'=>'********',
		),
		array(
			'name'=>'level',
			'value'=>Pengguna::model()->level($model->level),
		),
		'date_created',
	),
)); ?>
</div>
</div>
</div>
</div>