<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Faktur Permintaan Barang #<?php echo $model->request_code; ?></h3>
        <label class="label label-success pull-right">
        <?php echo PermintaanBarang::model()->status($model->status);?>
		</label>
    </div>
    <div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>"table"),						
	'attributes'=>array(
		'request_code',
		array('name'=>'date','value'=>PermintaanBarang::model()->bulan($model->date)),
		array('name'=>'store_id','value'=>$model->place->name." (".$model->Pengguna->fullname.")"),
	),
)); ?>
</div>	
</div>

	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Detail Barang Permintaan</h3>
    </div>
    <div class="box-body">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'permintaan-barang-detail-grid',
	'dataProvider'=>$PBDetail,
	'itemsCssClass' => 'table table-striped',	
	'columns'=>array(
		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
			'style' => 'text-align: center; background-color: #222d32; color:#ffffff;')
		),
		array('header'=>'Nama Barang','value'=>'$data->goods_name'),
		array('header'=>'Jumlah','value'=>'$data->amount'),
	),
)); ?>
</div>	
</div>
</div>
</div>

        <br><br>
                <div align="right" class="row-fluid">
                    Dibuat tanggal : <?php echo date('d F Y'); ?><br>
                    <?php echo $model->place->name." (".$model->Pengguna->fullname.")";?> &nbsp&nbsp&nbsp<br><br><br>
                    _____________
                </div>