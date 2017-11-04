<?php
/* @var $this BarangTipeController */
/* @var $model BarangTipe */

$this->breadcrumbs=array(
	'Barang Tipes'=>array('index'),
	'Manage',
);
?>

  <div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Kelola Tipe Barang</h3>
    </div>
    <div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-list"></i> Merek',
		array('barangMerek/kelola'),
		array('class' => 'btn btn-primary btn-flat'));
		?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'barang-tipe-grid',
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
		'mnemonic',
			array(
				'header'=>'Aksi',
				'class'=>'CButtonColumn',
				'template'=>'{update}{delete}',
				'htmlOptions'=>array('width'=>'100px','style'=>'text-align:center;')			
			),
		),
	)); ?>
</div>
</div>
</div>
</div>
