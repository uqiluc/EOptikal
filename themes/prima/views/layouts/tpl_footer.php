        <script language='javascript'>
        function validAngka(a)
        {
                if(!/^[0-9.]+$/.test(a.value))
                {
                a.value = a.value.substring(0,a.value.length-1000);
                }
        }
        </script>  
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/morris/morris.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/sparkline/jquery.sparkline.min.js"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/app.min.js"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/highcharts.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/exporting.js"></script>

    </body>
</html>