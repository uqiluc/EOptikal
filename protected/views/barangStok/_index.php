<?php
/* @var $this SuratMasukController */
/* @var $data SuratMasuk */
?>
<div class="col-lg-2 col-xs-6">                        
    <!-- small box -->
    <div class="small-box bg-blue">
        <div class="inner">
	<?php $this->widget('application.extensions.qrcode.QRCodeGenerator',array(
    'data' => $data->goods_code,
    'subfolderVar' => false,
    'matrixPointSize' => 5,
    'displayImage'=>true, // default to true, if set to false display a URL path
    'errorCorrectionLevel'=>'H', // available parameter is L,M,Q,H
    'matrixPointSize'=>4, // 1 to 10 only
	)) ?>
	<br>
	<small><?php echo CHtml::encode($data->goods_code);?></small>
	<br><br>
		</div>
	</div>
</div>		