<!-- Require the header -->
<?php require_once('tpl_header.php') ?>
<!-- Navbar -->
<?php require_once('tpl_menu.php') ?>
<!-- Require the navigation -->
<?php require_once('tpl_navigation.php') ?>
	<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
	<!-- Small boxes (Stat box) 
	<div class="row">
    <div class="col-lg-12">
      <ol class="breadcrumb ">
          <?php if(isset($this->breadcrumbs)):?>
              <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                  'links'=>$this->breadcrumbs,
                  'homeLink'=>CHtml::link('Dashboard'),
                  'htmlOptions'=>array('class'=>'breadcrumb')
              )); ?>
          <?php endif?>
      </ol>
    </div>
  </div> -->
		<?php echo $content; ?>		
	</section>
	<!-- /.content -->
	</div>
<!-- credit -->
<?php require_once('tpl_credit.php') ?>
<!-- Require the footer -->
<?php require_once('tpl_footer.php') ?>