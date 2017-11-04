<?php 
    $tipe = Yii::app()->db->createCommand("SELECT COUNT(id) FROM goods_type")->queryScalar();
    $merek = Yii::app()->db->createCommand("SELECT COUNT(id) FROM goods_brand")->queryScalar();
    $stok = Yii::app()->db->createCommand("SELECT COUNT(id) FROM goods_stock")->queryScalar();
    $distributor = Yii::app()->db->createCommand("SELECT COUNT(id) FROM supplier")->queryScalar();
    $patient = Yii::app()->db->createCommand("SELECT COUNT(id) FROM patient")->queryScalar();
?>

<aside class="main-sidebar">
<section class="sidebar">
<!-- Sidebar user panel -->
<div class="user-panel">
  <div class="pull-left image">
  <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar04.png" class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
  <p><?php echo Yii::app()->user->name;?></p>
  <small><i class="fa fa-circle text-online"></i> Online</small>
  </div>
</div>
<br>
  <ul class="sidebar-menu">
    <!-- <li class="header">MENU UTAMA</li> -->
    <li class="treeview">
    <?php echo CHtml::link('<i class="fa fa-dashboard"></i> <span>Dasbord</span>',array('site/index')); ?>
    </li>
    <li class="treeview">  
    <?php echo CHtml::link('<i class="fa fa-tag"></i> <span>Data</span><i class="fa fa-angle-left pull-right"></i>',array('#')); ?>
    <ul class="treeview-menu">
    <li ><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Tipe Barang <label class="label label-danger">'.$tipe.'</label>',array('barangTipe/kelola')); ?></li>    
    <li ><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Merek Barang <label class="label label-danger">'.$merek.'</label>',array('barangMerek/kelola')); ?></li>
    <li ><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Stok Barang <label class="label label-danger">'.$stok.'</label>',array('barangStok/kelola')); ?></li>
    <li ><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Distributor <label class="label label-danger">'.$distributor.'</label>',array('distributor/kelola')); ?></li>
    <li ><?php echo CHtml::link('<i class="fa fa-circle-o"></i> Pasien <label class="label label-danger">'.$patient.'</label>',array('patient/index')); ?></li>        
    </ul>
    </li>  
    <li class="treeview">  
    <?php echo CHtml::link('<i class="fa fa-sun-o"></i> <span>Barang Masuk</span><i class="fa fa-angle-left pull-right"></i>',array('#')); ?>
    <ul class="treeview-menu">
    <li ><?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah',array('barangMasuk/create')); ?></li>
    <li ><?php echo CHtml::link('<i class="fa fa-list"></i> Kelola',array('barangMasuk/kelola')); ?></li>
    </ul>
    </li>  
    <li class="treeview">  
    <?php echo CHtml::link('<i class="fa fa-moon-o"></i> <span>Barang Keluar</span><i class="fa fa-angle-left pull-right"></i>',array('#')); ?>
    <ul class="treeview-menu">
    <li ><?php echo CHtml::link('<i class="fa fa-stack-exchange"></i> Permintaan',array('permintaanBarang/kelola')); ?></li>
    <li ><?php echo CHtml::link('<i class="fa fa-list"></i> Kelola',array('barangKeluar/kelola')); ?></li>
    </ul>
    </li>   
    <li class="treeview">  
    <?php echo CHtml::link('<i class="fa fa-print"></i> <span>Laporan</span><i class="fa fa-angle-left pull-right"></i>',array('#')); ?>
    <ul class="treeview-menu">
    <li ><?php echo CHtml::link('<i class="fa fa-file"></i> Stok Barang',array('barang/report')); ?></li>    
    <li ><?php echo CHtml::link('<i class="fa fa-file"></i> Barang Masuk',array('barangMasuk/report')); ?></li>
    <li ><?php echo CHtml::link('<i class="fa fa-file"></i> Barang Keluar',array('barangKeluar/report'));?></li>
    </ul>
    </li>

    <li class="treeview">  
    <?php echo CHtml::link('<i class="fa fa-shopping-cart"></i> <span>Penjualan</span><i class="fa fa-angle-left pull-right"></i>',array('#')); ?>
    <ul class="treeview-menu">
    <li ><?php echo CHtml::link('<i class="fa fa-user"></i> Data Pelanggan',array('patient/index'));?></li>
    <li ><?php echo CHtml::link('<i class="fa fa-book"></i> History Penjualan',array('transaksi/history')); ?></li>
    </ul>
    </li> 
    <li class="treeview">
    <?php echo CHtml::link('<i class="fa fa-user"></i> <span>Pengguna</span>',array('pengguna/kelola')); ?>
    </li>   

  </ul>
</section>
<!-- /.sidebar -->
</aside>