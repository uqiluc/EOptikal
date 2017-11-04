<?php
/* @var $this SaleMasterController */
/* @var $model SaleMaster */

$this->breadcrumbs=array(
	'Sale Masters'=>array('index'),
	$model->id,
);
?>
<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Transaksi <b>#<?php echo $model->note_number; ?></b></h3>
    </div>
    </div>
	</div>
</div>

<div class="row">
    <div class="col-lg-4">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-file-text"></i> Informasi Nota</h3>
    </div>
    <div class="box-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>"table"),					
	'attributes'=>array(
		'note_number',
		'date',
		array(
			'name'=>'user_id',
			'value'=>$model->Kasir->fullname,
		),
	),
)); ?>
	</div>
	</div>
	</div>
    
    <div class="col-lg-8">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user"></i> Informasi Pasien/Pelanggan</h3>
    </div>
    <div class="box-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>"table"),					
	'attributes'=>array(
		array(
			'name'=>'patient_id',
			'value'=>$model->Patient->name,
		),	
		array(
			'label'=>'No Telepon',
			'value'=>"0".$model->Patient->phone_number,
		),
		array(
			'label'=>'Alamat',
			'value'=>$model->Patient->address,
		),
	),
)); ?>
</div>
</div>
</div>
</div>

<div class="row">
 <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-shopping-cart"></i> Detail Barang</h3>
    </div>
    <div class="box-body">
    <?php $this->renderPartial('_formSaleDetail', array('SaleDetailF'=>$SaleDetailF,'model2'=>$model2)); ?>

    <hr>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'sale-detail-grid',
		'dataProvider'=>$SaleDetail,
		'itemsCssClass' => 'table table-bordered',			
		'columns'=>array(
			array(
				'header'=>'#',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center; background-color: #222d32; color:#ffffff;')
			),			
			array(
				'header'=>'Kode Barang',
				'value'=>'$SaleDetail->Barang->goods_code',
			),
			array(
				'header'=>'Nama Barang',
				'value'=>'$SaleDetail->Barang->name',
			),			
			'amount_of_purchase',
			'unit_price',
			array(
				'header'=>'Sub Total',
				'value'=>'$SaleDetail->total',
			),	
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
	</div>
	</div>
	</div>
</div>
</div>
