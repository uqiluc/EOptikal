<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */
/* @var $form CActiveForm */
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    'options'=>array(
        'title'=>'Data Barang',
        'autoOpen'=>false,
        'modal' => true,
        'width' => 716, 
  		'height' => 500,
        'buttons'=>array(
        'Batal'=>'js:function(){$(this).dialog("close")}',
        ),
    ),
));
$this->widget('zii.widgets.grid.CGridView',array(
		 'id'=>'BarangStok-grid',
		 'dataProvider'=>$model2->search(),
		 'filter'=>$model2,
		 'columns'=>array(
		 	'goods_code',
		 	'name',
		 	array(
			    'header'=>'PILIH',
			    'type'=>'raw',
			    'value'=>'CHtml::Button(
			          "+"
			          , array(
			    "class" => "Button submit",
			          	   "id" => "get_link",
			          	   "onClick" => "$(\"#mydialog\").dialog(\"close\");
			   						  	 $(\"#SaleDetail_id \").val(\"". $data->id."\");
			   						  	 $(\"#SaleDetail_name \").val(\"". $data->name."\")',
		 		),
		),
));

$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

<div class="row">
<div class="col-xs-12">
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'sale-detail-form',
		'htmlOptions' => array('enctype' => 'multipart/form-data'),	
		'enableAjaxValidation'=>false,
	)); ?>
<div class="col-xs-3">
	<div class="form-group">
	<?php echo CHtml::link('Pilih Barang', '#', array('onclick'=>'$("#mydialog").dialog("open"); return false;','class'=>'pull-right label label-danger')); ?>
		<?php echo Chosen::activeDropDownList($SaleDetailF,'goods_id', 
		    CHtml::listData(BarangStok::model()->findAll(),'id','name'),
			array('class'=>'form-control','empty'=>'-- Pilih Barang --')); ?>
		<?php echo $form->error($SaleDetailF,'goods_id'); ?>
	</div>
</div>
<div class="col-xs-2">
	<div class="form-group">	
		<?php echo $form->textField($SaleDetailF,'unit_price',array('size'=>60,'maxlength'=>100,'class'=>'form-control','readonly'=>true,'value'=>'','id'=>'goods')); ?>
		<?php echo $form->error($SaleDetailF,'unit_price'); ?>
	</div>
</div>
<div class="col-xs-1">
	<div class="form-group">	
		<?php echo $form->textField($SaleDetailF,'amount_of_purchase',array('size'=>60,'maxlength'=>100,'class'=>'form-control','id'=>'goods')); ?>
		<?php echo $form->error($SaleDetailF,'amount_of_purchase'); ?>
	</div>
</div>
<div class="col-xs-3">
	<div class="form-group">
		<?php echo $form->textField($SaleDetailF,'total',array('size'=>60,'maxlength'=>100,'class'=>'form-control','readonly'=>true,'value'=>'','id'=>'goods')); ?>
		<?php echo $form->error($SaleDetailF,'total'); ?>
	</div>
</div>	
<div class="col-xs-3">
	<div class="form-group">
		<?php echo CHtml::submitButton($SaleDetailF->isNewRecord ? '+ Add' : 'Ubah', 
		array('class' =>'btn btn-info btn-flat'));?>	
	</div>
</div>
<?php $this->endWidget(); ?>