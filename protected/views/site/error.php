<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
	<div class="center-content text-center">
		<div class="error-number"><?php echo $code; ?></div>
		<div class="mg-b-lg">Selamat Anda Menemukan Halaman <?php echo $code; ?></div>
		<p><?php echo CHtml::encode($message); ?>
		</p>
		<?php 
			echo CHtml::link('Kembali Ke Sistem',
			array('site/index'),
			array('class' => 'btn btn-info'));
		?>
	</div>
