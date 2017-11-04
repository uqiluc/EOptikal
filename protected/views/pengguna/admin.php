<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */

$this->breadcrumbs=array(
	'Penggunas'=>array('index'),
	'Manage',
);

?>

  <div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Kelola Pengguna</h3>
    </div>
    <div class="box-body">
            <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-list"></i> Bagian',
		array('userBagian/kelola'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'pengguna-grid',
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
			array('name'=>'part_id','value'=>'$data->Bagian->name'),
			'fullname',
			'birth',
			'address',
			'username',
			/*
			'password',
			'level',
			'date_created',
			*/
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