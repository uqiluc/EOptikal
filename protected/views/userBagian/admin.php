<?php
/* @var $this UserBagianController */
/* @var $model UserBagian */

$this->breadcrumbs=array(
	'User Bagians'=>array('index'),
	'Manage',
);
?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Kelola Bagian</h3>
    </div>
    <div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-list"></i> Pengguna',
		array('pengguna/kelola'),
		array('class' => 'btn btn-primary btn-flat'));
		?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-bagian-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
		'itemsCssClass' => 'table table-striped',	
		'columns'=>array(
			array(
				'header'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center; background-color: #222d32; color:#ffffff;')
			),
		'name',
			array(
				'header'=>'Aksi',
				'class'=>'CButtonColumn',
				'htmlOptions'=>array('width'=>'100px','style'=>'text-align:center;')			
			),
	),
)); ?>
</div>
</div>
</div>
</div>