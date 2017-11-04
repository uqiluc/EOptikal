<?php
/* @var $this SaleDetailController */
/* @var $model SaleDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sale-detail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'master_sale_id'); ?>
		<?php echo $form->textField($model,'master_sale_id'); ?>
		<?php echo $form->error($model,'master_sale_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'goods_id'); ?>
		<?php echo $form->textField($model,'goods_id'); ?>
		<?php echo $form->error($model,'goods_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount_of_purchase'); ?>
		<?php echo $form->textField($model,'amount_of_purchase',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'amount_of_purchase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_price'); ?>
		<?php echo $form->textField($model,'unit_price',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'unit_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->