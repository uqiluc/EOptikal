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

<div class="col-xs-4">
	<div class="form-group">
		<?php echo Chosen::activeDropDownList($BMFDetail,'goods_id', 
		    CHtml::listData(BarangStok::model()->findAll(),'id','name'),
			array('prompt'=>'-- Pilih Barang --','class'=>'form-control')); ?>
		<?php echo $form->error($BMFDetail,'goods_id'); ?>
	</div>
</div>
<div class="col-xs-4">
	<div class="form-group">
		<?php echo $form->textField($BMFDetail,'amount',array('class'=>'form-control','placeholder'=>'Jumlah Barang')); ?>
		<?php echo $form->error($BMFDetail,'amount'); ?>
	</div>
</div>
<div class="col-xs-4">
	<div class="form-group">
		<?php echo CHtml::submitButton($BMFDetail->isNewRecord ? 'Simpan' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>