<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Permintaan</h3>
    </div>
    <div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Permintaan'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-th"></i> Data Barang',
		array('barangStok/kelola'),
		array('class' => 'btn btn-primary btn-flat', 'title'=>'Data Stok Barang'));
		?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'permintaan-barang-grid',
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
		'request_code',
		array('name'=>'date','value'=>'BarangMasuk::model()->bulan($data->date)'),
		array('name'=>'store_id','value'=>'$data->place->name." - ".$data->Pengguna->fullname'),
		array('name'=>'status','value'=>'PermintaanBarang::model()->status($data->status)'),
		array(
			'header'=>'Aksi',
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->controller->createUrl("permintaanBarang/view/id/$data->request_code")',
			'updateButtonUrl'=>'Yii::app()->controller->createUrl("permintaanBarang/update/id/$data->request_code")',
			'deleteButtonUrl'=>'Yii::app()->controller->createUrl("permintaanBarang/delete/id/$data->request_code")',
			'htmlOptions'=>array('width'=>'100px','style'=>'text-align:center;')			
		),
	),
)); ?>
