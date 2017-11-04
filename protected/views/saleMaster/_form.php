<?php
/* @var $this SaleMasterController */
/* @var $model SaleMaster */
/* @var $form CActiveForm */
?>
<div class="col-xs-6">
    <h3 class="box-title"><i class="fa fa-file-text"></i> Informasi Nota</h3>
    <hr>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sale-master-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'note_number'); ?>
		<?php echo $form->textField($model,'note_number',array(
			'size'=>60,
			'maxlength'=>255,
			'value' => (($model->isNewRecord) ? $model->generateKode() : $model->note_number),
			'readonly' => true,
			'class'=>'form-control')); ?>
		<?php echo $form->error($model,'note_number'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('class'=>'form-control','readonly'=>true,'value'=>date('y-m-d'))); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('class'=>'form-control','readonly'=>true,'value'=>Yii::app()->user->name)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

</div>


<div class="col-xs-6">
    <h3 class="box-title"><i class="fa fa-user"></i> Informasi Pasien</h3>
    <hr>

	<div class="form-group">
		<?php echo $form->labelEx($model,'patient_id'); ?>
		<?php echo Chosen::activeDropDownList($model,'patient_id', 
		    CHtml::listData(Patient::model()->findAll(),'id','name'),
			array('class'=>'form-control','empty'=>'-- Pilih Pasien --')); ?>
		<?php echo $form->error($model,'patient_id'); ?>
	</div>	

	<div class="form-group">
		<label>Jenis Kelamin</label>
	</div>		

	<div class="form-group">
		<label>Alamat</label>
	</div>		

	<div class="form-group">
		<label>No Telepon</label>
	</div>		

</div>

<div class="col-xs-12">
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Lanjut' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	

		<?php 
			echo CHtml::link('Kembali',
			array('PermintaanBarang/kelola'),
			array('class' => 'btn btn-danger btn-flat'));
		?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>