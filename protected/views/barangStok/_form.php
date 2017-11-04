<?php
/* @var $this BarangStokController */
/* @var $model BarangStok */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'barang-stok-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),	
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-xs-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php
		 echo $form->DropDownList($model,'type_id',
		 CHtml::listData(BarangTipe::model()->findAll(),'id','name'),
		 array(
		   'prompt'=>'-- Pilih Tipe --',"class" => 'form-control',
		   'ajax' => array(
		     'type'=>'POST',
		     'url'=>CController::createUrl('barangStok/selectmerek'),
		     'update'=>'#'.CHtml::activeId($model,'brand_id'), 
		     'beforeSend'=>'function() {
		       $("#brand_id").find("option").remove();
		     }',
		   )
		 )
		 );
		 ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',
		(!$model->isNewRecord) ? $model->MerekList() :array(),
		 array(
		   'prompt'=>'-- Pilihan --',"class" => 'form-control',
		 )
		 ); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'purchase_price'); ?>
		<div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Rp</span>			
		<?php echo $form->textField($model,'purchase_price',array('size'=>12,'maxlength'=>12,'class' => 'form-control')); ?>
		</div>
		<?php echo $form->error($model,'purchase_price'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'selling_price'); ?>
		<div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Rp</span>			
		<?php echo $form->textField($model,'selling_price',array('size'=>12,'maxlength'=>12,'class' => 'form-control')); ?>
		</div>
		<?php echo $form->error($model,'selling_price'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'details'); ?>
		<br>
		<?php
			echo $form->radioButtonList($model,'details',
				array('0'=>'Ya','1'=>'TIdak'),
				array(
					'template'=>'{input}{label}',
					'separator'=>'',
					'labelOptions'=>array(
						'style'=>'padding-right:20px;margin-left:15px'),
					)                              
				);
		?>
		<?php echo $form->error($model,'details'); ?>
	</div>	

	<div class="form-group" id="details">
		<?php echo $form->labelEx($model,'kind'); ?>
		<?php echo $form->textField($model,'kind',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'kind'); ?>
		<br>
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'color'); ?>
		<br>
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'size'); ?>
		<br>
		<?php echo $form->labelEx($model,'material'); ?>
		<?php echo $form->textField($model,'material',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'material'); ?>
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