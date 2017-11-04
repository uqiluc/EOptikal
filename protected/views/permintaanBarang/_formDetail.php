<?php
/* @var $this PermintaanBarangController */
/* @var $model PermintaanBarang */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permintaan-barang-detail-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),	
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-xs-4">
	<div class="form-group">
	<?php 
	  $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	    'model'=>$PBFDetail,
	    'attribute'=>'goods_name',
	    'value'=>$PBFDetail->goods_name,
	   	'name'=>'goods_name',
	    'source'=>$this->createUrl('Autocomplete'), //memanggil function pada controller anda
	   // additional options for the autocomplete plugin
	   'options'=>array(
	   'minLength'=>'2',
	   ),
	   'htmlOptions'=>array(
	    'placeholder' => 'Nama Barang',
   	    'class'=>'form-control',
	    ),
		));	  
	  ?>		
		<?php echo $form->error($PBFDetail,'goods_name'); ?>
	</div>
</div>
<div class="col-xs-4">
	<div class="form-group">
		<?php echo $form->textField($PBFDetail,'amount',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Jumlah Barang')); ?>
		<?php echo $form->error($PBFDetail,'amount'); ?>
	</div>
</div>
<div class="col-xs-4">
	<div class="form-group">
		<?php echo CHtml::submitButton($PBFDetail->isNewRecord ? 'Simpan' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>