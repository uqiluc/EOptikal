<?php
/* @var $this BarangMerekController */
/* @var $model BarangMerek */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'barang-merek-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),	
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-xs-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'mnemonic'); ?>
		<?php echo $form->textField($model,'mnemonic',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'mnemonic'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo Chosen::activeDropDownList($model,'type_id', 
		    CHtml::listData(BarangTipe::model()->findAll(),'id','name'),
			array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	

		<?php 
			echo CHtml::link('Kembali',
			array('kelola'),
			array('class' => 'btn btn-danger btn-flat'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>