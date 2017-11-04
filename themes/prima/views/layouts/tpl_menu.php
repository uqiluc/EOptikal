<?php 
    $permintaan = Yii::app()->db->createCommand("SELECT COUNT(id) FROM outcoming_goods")->queryScalar();
?>
<div class="wrapper">
    <header class="main-header">    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PJ</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>PRIMA JAYA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span></a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
                <li class="user-menu">
                    <?php if ($permintaan == 0)
                    {
                        echo CHtml::link('<i class="fa fa-globe"></i>',array('permintaanBarang/kelola'), array('title' => 'Pemberitahuan Permintaan Barang'));
                    }
                    else
                    {
                    echo CHtml::link('<i class="fa fa-globe"></i><label class="label label-danger">'.$permintaan.'</label>',array('permintaanBarang/kelola'), array('title' => 'Pemberitahuan Permintaan Barang')); 
                    }
                    ?>
                </li>
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar04.png" class="user-image" alt="User Image">
                <span class="hidden-xs"> <?php echo Yii::app()->user->name;?></span>
                </a>
                <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar04.png" class="img-circle" alt="User Image">
                <p>
                <?php echo Yii::app()->user->name;?> - <?php echo Yii::app()->user->name;?></p>
                </li>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                <div class="pull-left">
                <?php echo CHtml::link('<i class="fa fa-user"></i> Profil',
                    array('pengguna/view','id'=>Yii::app()->user->id),
                    array('class' => 'btn btn-info btn-flat'));
                ?>
                <?php echo CHtml::link('<i class="fa fa-cog"></i>',                        
                    array('pengguna/kelola'),
                    array('class' => 'btn btn-info btn-flat'));
                ?>
                </div>
                <div class="pull-right">
                <?php echo CHtml::link('<i class="fa fa-sign-out"></i> Keluar',                        array('site/logout'),
                    array('class' => 'btn btn-success btn-flat'));
                ?>
                </div>
                </li>
                </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                </li>
            </ul>
        </div>
        </nav>
    </header>