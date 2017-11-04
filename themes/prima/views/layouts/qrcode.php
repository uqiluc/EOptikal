<!DOCTYPE html>
<html lang="en">
  <head>

    <?php
      $baseUrl = Yii::app()->theme->baseUrl; 
      $cs = Yii::app()->getClientScript();
      Yii::app()->clientScript->registerCoreScript('jquery');
    ?>


    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/bootstrap/css/bootstrap.min.css"> 
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
    <style>
    	html, body{
    		font-family: Arial; font-size: 15px;
    		margin: 20px;
    	}
    	h1{
    		font-size: 25px;
    		margin: 0px 0px 0px 0px;
    	}
    </style>
    
    <script>
    	function cetak(){
        	document.getElementById("p").style.visibility="hidden";
        	window.print();
    	}
    </script>
  </head>
  
<body>
    <div style="width: 800px;">
        <div style="text-align: left;"><br>
			<?php echo $content; ?>
        <br><br>
			<div id="p"><a href="#" onclick="cetak()"><button type="submit" class="btn btn-primary">Print</button></div> 
		</div>
    </div>
  </body>
</html>


