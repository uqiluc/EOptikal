<?php
/* @var $this PermintaanBarangController */
/* @var $model PermintaanBarang */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permintaan-barang-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),	
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-xs-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'request_code'); ?>
		<?php echo $form->textField($model,'request_code',array(
			'size'=>60,
			'maxlength'=>255,
			'value' => (($model->isNewRecord) ? $model->generateID() : $model->request_code),
			'readonly' => true,
			'class'=>'form-control')); ?>
		<?php echo $form->error($model,'request_code'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('value'=>date('Y-m-d'),'class'=>'form-control','readonly'=>true)); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Lanjut' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	

		<?php 
			echo CHtml::link('Kembali',
			array('PermintaanBarang/kelola'),
			array('class' => 'btn btn-danger btn-flat'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>