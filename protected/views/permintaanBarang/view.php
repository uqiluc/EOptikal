<?php
/* @var $this PermintaanBarangController */
/* @var $model PermintaanBarang */

$this->breadcrumbs=array(
	'Permintaan Barangs'=>array('index'),
	$model->request_code,
);

?>


<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Faktur Permintaan Barang #<?php echo $model->request_code; ?></h3>
        <label class="label label-success">
        <?php echo PermintaanBarang::model()->status($model->status);?>
		</label>
		
        <?php 
		echo CHtml::link('<i class="fa fa-print"></i>',
		array('PermintaanBarang/cetak/id/'.$model->request_code),
		array('class' => 'btn btn-danger btn-flat pull-right','title'=>'Cetak Faktur'));
		?>
        <?php 
		echo CHtml::link('<i class="fa fa-check"></i>',
		array('PermintaanBarang/acep/'.$model->request_code),
		array('class' => 'btn btn-success btn-flat pull-right','title'=>'Setujui Semua Barang Yang Diminta'));
		?>
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

<?php if ($model->date == date('Y-m-d'))
	{
?>		
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Barang Permintaan</h3>
    </div>
    <div class="box-body">
    <?php $this->renderPartial('_formDetail', array('PBFDetail'=>$PBFDetail)); ?>
    </div>
    </div>
    </div>
    </div>
<?php } else {} ?>

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
		'request_code',
		'goods_name',
		'amount',
		'status',
	),
)); ?>
</div>	
</div>
</div>
</div>