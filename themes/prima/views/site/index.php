  <div class="row">
    <div class="col-lg-3 col-xs-6">
    <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo Yii::app()->db->createCommand("SELECT COUNT(id) FROM incoming_goods_detail")->queryScalar();?></h3>
          <p>Barang Masuk</p>
        </div>
        <div class="icon">
          <i class="fa fa-arrow-down"></i>
        </div>
        <?php 
        echo CHtml::link('Info Lengkap <i class="fa fa-arrow-circle-right"></i>',
        array('barangMasuk/kelola'),
        array('class' => 'small-box-footer'));
        ?>        
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo Yii::app()->db->createCommand("SELECT COUNT(id) FROM goods_stock")->queryScalar();?></h3>
          <p>Barang</p>
        </div>
        <div class="icon">
          <i class="fa fa-briefcase"></i>
        </div>
        <?php 
        echo CHtml::link('Info Lengkap <i class="fa fa-arrow-circle-right"></i>',
        array('BarangStok/kelola'),
        array('class' => 'small-box-footer'));
        ?>  
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo Yii::app()->db->createCommand("SELECT COUNT(id) FROM outcoming_goods")->queryScalar();?></h3>
          <p>Barang Keluar</p>
        </div>
        <div class="icon">
          <i class="fa fa-arrow-up"></i>
        </div>
        <?php 
        echo CHtml::link('Info Lengkap <i class="fa fa-arrow-circle-right"></i>',
        array('barangKeluar/kelola'),
        array('class' => 'small-box-footer'));
        ?>  
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo Yii::app()->db->createCommand("SELECT COUNT(request_code) FROM goods_request")->queryScalar();?></h3>
          <p>Permintaan</p>
        </div>
        <div class="icon">
          <i class="fa fa-file"></i>
        </div>
        <?php 
        echo CHtml::link('Info Lengkap <i class="fa fa-arrow-circle-right"></i>',
        array('permintaanBarang/kelola'),
        array('class' => 'small-box-footer'));
        ?>  
        </div>
    </div>

  </div>

  <div class="row">
      <div class="col-lg-12">
        <section class="panel">

          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        </section>
      </div>  
  </div>

  <div class="row">
    <div class="col-lg-6">
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data Permintaan Barang</h3>
    </div>
    <div class="box-body">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'barang-stok-grid',
    'dataProvider'=>$Permintaan,
    'itemsCssClass' => 'table table-striped',   
    'columns'=>array(
        array(
            'header'=>'No',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions'=>array('width'=>'10px', 
            'style' => 'text-align: center; background-color: #222d32; color:#ffffff;')
        ),
        array('header'=>'Tanggal','value'=>'BarangMasuk::model()->bulan($data->date)'),
        array('name'=>'store_id','value'=>'$data->place->name." - ".$data->Pengguna->fullname'),
        array('name'=>'status','value'=>'PermintaanBarang::model()->status($data->status)'),
        array(
            'header'=>'Aksi',
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("permintaanBarang/view/id/$data->request_code")',
            'htmlOptions'=>array('width'=>'100px','style'=>'text-align:center;')            
        ),
    ),
)); ?>
    </div>  
    </div>
    </div>

    <div class="col-lg-6">
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data Stok Barang</h3>
    </div>
    <div class="box-body">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'barang-stok-grid',
    'dataProvider'=>$model->search(),
    'itemsCssClass' => 'table table-striped',   
    'columns'=>array(
        array(
            'header'=>'No',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions'=>array('width'=>'10px', 
            'style' => 'text-align: center; background-color: #222d32; color:#ffffff;')
        ),
        'goods_code',
        array('name'=>'type_id','value'=>'$data->Tipe->name'),
        'name',
        'quantity',
        ),
    )); ?>
    </div>  
    </div>
    </div>
  </div>


      <script type="text/javascript">

        $(function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'Laporan Barang Masuk dan Keluar Tahun <?php echo date('Y')?>'
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 150,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                xAxis: {
                    categories: [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember',
                    ],
                            plotBands: [{ // visualize the weekend
                                from: 200.5,
                                to: 100.5,
                                color: 'rgba(68, 170, 213, .2)'
                            }]
                        },
                        yAxis: {
                            title: {
                                text: 'Jumlah Data'
                            }
                        },
                        tooltip: {
                            shared: true,
                            valueSuffix: ' Data'
                        },
                        credits: {
                            enabled: false
                        },
                        plotOptions: {
                            areaspline: {
                                fillOpacity: 0.5
                            }
                        },
                        series: [
                        {
                            name: 'Barang Masuk',
                            data: [
                            <?php
                            for ($i=1; $i <= 12; $i++) { 
                                echo barangMasukDetail::model()->monthReport($i).",";
                            }
                            ?>
                            ]
                        },

                        {
                            name: 'Barang Keluar',
                            data: [
                            <?php
                            for ($i=1; $i <= 12; $i++) { 
                                echo barangKeluar::model()->monthReport($i).",";
                            }
                            ?>
                            ]
                        }


                        ]
                    });
        });
    </script>                     