<?php
/* @var $this BarangMasukDetailController */
/* @var $model BarangMasukDetail */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'barang-masuk-detail-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),	
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-xs-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'goods_id'); ?>
		<?php echo Chosen::activeDropDownList($model,'goods_id', 
		    CHtml::listData(BarangStok::model()->findAll(),'id','name'),
			array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'goods_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	

		<?php 
			echo CHtml::link('Kembali',
			array('barangMasuk/kelola'),
			array('class' => 'btn btn-danger btn-flat'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>