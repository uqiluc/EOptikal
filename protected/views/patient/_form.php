<?php
/* @var $this PatientController */
/* @var $model Patient */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patient-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),	
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-xs-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'patient_code'); ?>
		<?php echo $form->textField($model,'patient_code',array(
			'size'=>60,
			'maxlength'=>255,
			'value' => (($model->isNewRecord) ? $model->generateKode() : $model->patient_code),
			'readonly' => true,
			'class'=>'form-control')); ?>
		<?php echo $form->error($model,'patient_code'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model' => $model,
					'attribute' => 'date',
					'id'=>'birth',
					'value'=>Yii::app()->dateFormatter->format("yy-mm-dd",strtotime($model->date)),
					'options'=>array(
						'dateFormat' => 'yy-mm-dd',
				        'showAnim'=>'fadeIn',
				        'changeMonth'=>true,
				        'changeYear'=>true,
				        'yearRange'=>'1940:2017',
				        ),
					'htmlOptions'=>array(
						'class'=>'form-control',
						),
					));
			?>
		</div>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'gender'); ?>
		<br>
		<?php
			echo $form->radioButtonList($model,'gender',
				array('0'=>'Laki-Laki','1'=>'Perempuan'),
				array(
					'template'=>'{input}{label}',
					'separator'=>'',
					'labelOptions'=>array(
						'style'=>'padding-right:20px;margin-left:15px'),
					)                              
				);
		?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<div class="input-group">
            <span class="input-group-addon" id="basic-addon1">+62</span>
		<?php echo $form->textField($model,'phone_number',array('size'=>11,'maxlength'=>11,'class' => 'form-control','onkeyup'=>"validAngka(this)")); ?>
		</div>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>
</div>
<div class="col-xs-6">

	<div class="form-group">
		<?php echo $form->labelEx($model,'bpjs'); ?>
		<br>
		<?php
			echo $form->radioButtonList($model,'bpjs',
				array('0'=>'BPJS','1'=>'Non-BPJS'),
				array(
					'template'=>'{input}{label}',
					'separator'=>'',
					'labelOptions'=>array(
						'style'=>'padding-right:20px;margin-left:15px'),
					)                              
				);
		?>
		<?php echo $form->error($model,'bpjs'); ?>
	</div>

	<div class="form-group" id="bpjs">
		<?php echo $form->labelEx($model,'bpjs_number'); ?>
		<?php echo $form->textField($model,'bpjs_number',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'bpjs_number'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'recomendation'); ?>
		<br>
		<?php
			echo $form->radioButtonList($model,'recomendation',
				array('0'=>'Ada','1'=>'Tidak Ada'),
				array(
					'template'=>'{input}{label}',
					'separator'=>'',
					'labelOptions'=>array(
						'style'=>'padding-right:20px;margin-left:15px'),
					)                              
				);
		?>
		<?php echo $form->error($model,'recomendation'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	

		<?php 
			echo CHtml::link('Kembali',
			array('index'),
			array('class' => 'btn btn-danger btn-flat'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>