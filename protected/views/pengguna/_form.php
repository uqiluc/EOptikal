<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengguna-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),	
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-xs-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'part_id'); ?>
		<?php echo Chosen::activeDropDownList($model,'part_id', 
		    CHtml::listData(UserBagian::model()->findAll(),'id','name'),
			array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'part_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'birth'); ?>
		<div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model' => $model,
				'attribute' => 'birth',
				'id'=>'birth',
				'value'=>Yii::app()->dateFormatter->format("yy-mm-dd",strtotime($model->birth)),
				'options'=>array(
					'dateFormat' => 'yy-mm-dd',
			        'showAnim'=>'fadeIn',
			        'changeMonth'=>true,
			        'changeYear'=>true,
			        'yearRange'=>'1900:1999',
			        ),
				'htmlOptions'=>array(
					'class'=>'form-control',
					),
				));
			?>
		</div>
		<?php echo $form->error($model,'birth'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
</div>
<div class="col-xs-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->dropDownList($model,'level',
							array('1'=>'Admin','2'=>'Karyawan','3'=>'Pemilik'),
							array('class'=>'form-control')
								); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	

		<?php 
			echo CHtml::link('Kembali',
			array('site/index'),
			array('class' => 'btn btn-danger btn-flat'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>