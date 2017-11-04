<?php
/* @var $this BarangStokController */
/* @var $model BarangStok */

$this->breadcrumbs=array(
	'Barang Stoks'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#barang-stok-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

  <div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Kelola Stok Barang</h3>
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
		<?php 
		echo CHtml::link('<i class="fa fa-list"></i> Tipe',
		array('barangTipe/kelola'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-print"></i>',
		array('cetakall'),
		array('class' => 'btn btn-danger btn-flat pull-right','title'=>'Cetak Semua QRCode Barang'));
		?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'barang-stok-grid',
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
		'goods_code',
		array('name'=>'type_id','value'=>'$data->Tipe->name'),
		'name',
		'quantity',
		array('header'=>'QRcode','type'=>'raw','value'=>'CHtml::image(Yii::app()->request->baseurl."/uploads/".$data->goods_code.".png","gambar",array("width"=>20))'),
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
