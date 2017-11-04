<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	'Manage',
);
?>

 <div class="row">
    <div class="col-lg-12">
	<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data Pasien</h3>
    </div>
    <div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>
		<?php 
		echo CHtml::link('<i class="fa fa-print"></i>',
		array('cetakall'),
		array('class' => 'btn btn-danger btn-flat pull-right','title'=>'Cetak Semua QRCode Barang'));
		?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patient-grid',
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
		'patient_code',
		'name',
		array('name'=>'gender','value'=>'Patient::model()->gender($data->gender)'
),
		'address',
		array('name'=>'phone_number','value'=>'"0".$data->phone_number'),
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
