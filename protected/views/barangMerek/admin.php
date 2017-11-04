<?php
/* @var $this BarangMerekController */
/* @var $model BarangMerek */

$this->breadcrumbs=array(
	'Barang Mereks'=>array('index'),
	'Manage',
);

?>
 <div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Kelola Merek Barang</h3>
    </div>
    <div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-list"></i> Jenis Barang',
		array('barangTipe/kelola'),
		array('class' => 'btn btn-primary btn-flat'));
		?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'barang-merek-grid',
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
		array('name'=>'type_id','value'=>'$data->Tipe->name'),
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
