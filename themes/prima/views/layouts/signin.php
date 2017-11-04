<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="lucky lukhman nur hakim">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/img/logo.png">
    </head>
  <body class="bg-white">
    <?php echo $content; ?>
  </body>
</html>