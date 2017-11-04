<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->name,
);

?>

<div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right ui-sortable-handle">
              <li class="active"><a href="#biodata" data-toggle="tab" aria-expanded="true">Data Diri</a></li>
              <li class=""><a href="#transaksi" data-toggle="tab" aria-expanded="false">Transaksi</a></li>
              <li class=""><a href="#medis" data-toggle="tab" aria-expanded="false">Rekam Medis</a></li>
              <li class="pull-left header"><i class="fa fa-user"></i> Data Pasien <b>#<?php echo $model->name;?></b></li>
            </ul>
<div class="tab-content">
  <div id="biodata" class="tab-pane fade in active">
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
		echo CHtml::link('<i class="fa fa-shopping-cart"></i> Transaksi Beli',
		array('saleMaster/create','patient_id'=>$model->id),
		array('class' => 'btn btn-danger btn-flat'));
		?>		

<hr>
<div class="col-xs-6">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>"table"),		
	'attributes'=>array(
		'patient_code',
		'name',
		array('name'=>'date','value'=>Patient::model()->bulan($model->date)),
		array('name'=>'gender','value'=>Patient::model()->gender($model->gender)),
		'address',
	),
)); ?>
</div>
<div class="col-xs-6">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>"table"),		
	'attributes'=>array(
		array('name'=>'phone_number','value'=>"+62".$model->phone_number),
		array('name'=>'bpjs','value'=>Patient::model()->bpjs($model->bpjs)),
		array('name'=>'bpjs_number','value'=>Patient::model()->nObpjs($model->bpjs)),
		array('name'=>'recomendation','value'=>Patient::model()->recomendation($model->recomendation)),
	),
)); ?>
</div>
</div>
  </div>

  <div id="transaksi" class="tab-pane fade">
<div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>

<hr>
<div class="col-xs-6">
  </div>
  </div>
  </div>

  <div id="medis" class="tab-pane fade">
<div class="box-body">
        <?php 
		echo CHtml::link('<i class="fa fa-plus"></i> Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat'));
		?>

<hr>
<div class="col-xs-6">
  </div>
</div>
</div>

</div>
</div>