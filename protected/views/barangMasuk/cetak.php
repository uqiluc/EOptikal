<div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Faktur Barang Masuk #<?php echo $model->incoming_code; ?></h3>
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

	<div class="box">
    <div class="box-header with-border">	
    </div>
    <div class="box-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'barang-masuk-detail-grid',
			'dataProvider'=>$BMDetail,
			'summaryText'=>'',
			'itemsCssClass' => 'table',	
			'columns'=>array(
				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center; background-color: #222d32; color:#ffffff;')
				),
				array('header'=>'Jenis Barang','value'=>'$data->Barang->Tipe->name'),
				array('header'=>'Merek Barang','value'=>'$data->Barang->Merek->name'),
				array('header'=>'Nama Barang','value'=>'$data->Barang->name'),
				array('header'=>'Jumlah Barang','value'=>'$data->amount'),

			),
		)); ?>
	</div>
	</div>
</div>	
</div>