<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="wefay studio">
    
    <?php
      $baseUrl = Yii::app()->theme->baseUrl; 
      $cs = Yii::app()->getClientScript();
      Yii::app()->clientScript->registerCoreScript('jquery');
    ?>

    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/bootstrap/css/bootstrap.min.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/ico/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/ico/ionicons/css/ionicons.min.css">
    <!-- Theme style -->         
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/AdminLTE.min.css"> 
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->         
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/skins/_all-skins.min.css"> 
    <!-- iCheck -->         
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/iCheck/flat/blue.css"> 
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/iCheck/all.css">
    <!-- Morris chart -->         
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/morris/morris.css"> 
    <!-- jvectormap -->         
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css"> 
    <!-- Date Picker -->         
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/datepicker/datepicker3.css"> 
    <!-- Daterange picker -->         
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/daterangepicker/daterangepicker.css"> 
    <!-- bootstrap wysihtml5 - text editor -->         
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/datatables/dataTables.bootstrap.css">  
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/plugins/select2/select2.min.css">
    
    <script type="text/javascript">
    var clicks = 0;
    function onClick() {
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
    };
    </script>
    
    <!-- The fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/logo.png">

  </head>

<body class="hold-transition skin-custom-light fixed sidebar-mini">