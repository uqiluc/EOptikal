<?php
/* @var $this BarangMasukController */
/* @var $model BarangMasuk */

$this->breadcrumbs=array(
	'Barang Masuks'=>array('index'),
	'Manage',
);

?>

  <div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Kelola Barang Masuk</h3>
    </div>
    <div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-list"></i> Barang Keluar',
		array('barangKeluar/kelola'),
		array('class' => 'btn btn-primary btn-flat'));
		?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'barang-masuk-grid',
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
		'incoming_code',
		array('name'=>'date','value'=>'BarangMasuk::model()->bulan($data->date)'),
		array('name'=>'user_id','value'=>'$data->Pengguna->fullname'),		
		array(
			'header'=>'Aksi',
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->controller->createUrl("barangMasuk/view/id/$data->incoming_code")',
			'updateButtonUrl'=>'Yii::app()->controller->createUrl("barangMasuk/update/id/$data->incoming_code")',
			'deleteButtonUrl'=>'Yii::app()->controller->createUrl("barangMasuk/delete/id/$data->incoming_code")',
			'htmlOptions'=>array('width'=>'100px','style'=>'text-align:center;')			
		),
		),
	)); ?>
</div>
</div>
</div>
</div>