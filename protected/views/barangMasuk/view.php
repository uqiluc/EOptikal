<?php
/* @var $this BarangMasukController */
/* @var $model BarangMasuk */

$this->breadcrumbs=array(
	'Barang Masuks'=>array('index'),
	$model->incoming_code,
);

?>

<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Faktur Barang Masuk #<?php echo $model->incoming_code; ?></h3>
        <?php 
		echo CHtml::link('<i class="fa fa-print"></i>',
		array('barangMasuk/cetak/id/'.$model->incoming_code),
		array('class' => 'btn btn-danger btn-flat pull-right','title'=>'Tambah Barang Masuk'));
		?>
    </div>
    <div class="box-body">
    <?php if($model->supplier_id==0)
    { 
	   		 echo "<div class='col-lg-12'>";
    } else { echo "<div class='col-lg-6'>";}
    ?>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>"table"),					
			'attributes'=>array(
				'incoming_code',
				array('name'=>'date','value'=>BarangMasuk::model()->bulan($model->date)),
				array('name'=>'user_id','value'=>$model->Pengguna->fullname),
			),
		)); ?>
	</div>
	<?php if($model->supplier_id==0)
    { 
    } else { 
    ?>
	<div class="col-lg-6">	
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>"table"),					
			'attributes'=>array(
				array('name'=>'supplier_id','value'=>$model->Distributor->name),
			),
		)); ?>	
	</div>
	<?php } ?>
	</div>
	</div>

<?php if ($model->date == date('Y-m-d'))
	{
?>		
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Barang</h3>
    </div>
    <div class="box-body">
    <?php $this->renderPartial('_formDetail', array('BMFDetail'=>$BMFDetail)); ?>
    </div>
    </div>
    </div>
    </div>
<?php } else {} ?>

	<div class="box">
    <?php if (date('Y-m-d') == $model->date)
    {
    ?>
    <div class="box-header with-border">
        <h3 class="box-title">Detail Barang Masuk</h3>
    </div>
    <div class="box-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'barang-masuk-detail-grid',
			'dataProvider'=>$BMDetail,
			'itemsCssClass' => 'table table-striped',	
			'columns'=>array(
				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center; background-color: #222d32; color:#ffffff;')
				),
				array('header'=>'Jenis Barang','value'=>'$data->Barang->Tipe->name'),
				array('header'=>'Merek Barang','value'=>'$data->Barang->Merek->name'),
				array('name'=>'goods_id','value'=>'$data->Barang->name'),
				'amount',
				'status',
				array(
					'header'=>'Aksi',
					'class'=>'CButtonColumn',
					'template'=>'{update}{delete}',
					'updateButtonUrl'=>'Yii::app()->controller->createUrl("barangMasukDetail/update/id/$data->id")',
					'deleteButtonUrl'=>'Yii::app()->controller->createUrl("barangMasukDetail/delete/id/$data->id")',
					'htmlOptions'=>array('width'=>'100px','style'=>'text-align:center;')			
				),
			),
		)); 
		?>
	</div>
	</div>
	<?php } else { ?>
	<div class="box-body">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'barang-masuk-detail-grid',
				'dataProvider'=>$BMDetail,
				'itemsCssClass' => 'table table-striped',	
				'columns'=>array(
					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center; background-color: #222d32; color:#ffffff;')
					),
					array('header'=>'Jenis Barang','value'=>'$data->Barang->Tipe->name'),
					array('header'=>'Merek Barang','value'=>'$data->Barang->Merek->name'),
					array('name'=>'goods_id','value'=>'$data->Barang->name'),
					'amount',
					'status',
				),
			)); 
			?>
		</div>
		</div>
	<?php } ?>
</div>	
</div>