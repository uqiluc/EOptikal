<?php
/* @var $this BarangStokController */
/* @var $model BarangStok */

$this->breadcrumbs=array(
	'Barang Stoks'=>array('index'),
	$model->name,
);
?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Data Barang</h3>
    </div>
    <div class="box-header pull-right" style="margin-bottom: -62px;">
    <center>
    <?php $this->widget('application.extensions.qrcode.QRCodeGenerator',array(
	    'data' => $model->goods_code,
	    'subfolderVar' => false,
	    'matrixPointSize' => 5,
	    'displayImage'=>true, // default to true, if set to false display a URL path
	    'errorCorrectionLevel'=>'H', // available parameter is L,M,Q,H
	    'matrixPointSize'=>4, // 1 to 10 only
	)) ?><br>
	<small><?php echo $model->goods_code;?></small>
    </center>
    </div>
    <div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-cog"></i> Kelola',
		array('kelola'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-edit"></i> Perbarui',
		array('update','id'=>$model->id),
		array('class' => 'btn btn-primary btn-flat'));
		?>		
		<?php 
		echo CHtml::link('<i class="fa fa-print"></i> Cetak',
		array('cetak','id'=>$model->id),
		array('class' => 'btn btn-danger btn-flat','title'=>'Cetak QRCode Barang'));
		?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>"table"),					
	'attributes'=>array(
		'id',
		'goods_code',
		array('name'=>'type_id','value'=>$model->Tipe->name),
		array('name'=>'brand_id','value'=>$model->Merek->name),
		'name',
		array(
			'name'=>'purchase_price',
			'value'=>BarangStok::model()->rupiah($model->purchase_price),
		),		
		array(
			'name'=>'selling_price',
			'value'=>BarangStok::model()->rupiah($model->selling_price),
		),		
		array(
			'name'=>'status',
			'value'=>BarangStok::model()->status($model->status),
		),	
	),
)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>"table"),					
	'attributes'=>array(
		array('name'=>'kind','value'=>BarangStok::model()->kind($model->kind)),
		array('name'=>'color','value'=>BarangStok::model()->color($model->color)),
		array('name'=>'size','value'=>BarangStok::model()->size($model->size)),
		array('name'=>'material','value'=>BarangStok::model()->material($model->material)),
	),
)); ?>
</div>
</div>
</div>
</div>		