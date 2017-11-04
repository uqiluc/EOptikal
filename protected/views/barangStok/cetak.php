<?php $this->widget('application.extensions.qrcode.QRCodeGenerator',array(
    'data' => $model->goods_code,
    'subfolderVar' => false,
    'matrixPointSize' => 5,
    'displayImage'=>true, // default to true, if set to false display a URL path
    'errorCorrectionLevel'=>'H', // available parameter is L,M,Q,H
    'matrixPointSize'=>4, // 1 to 10 only
)) ?><br>
<small><?php echo $model->goods_code;?></small>