
<section id="main" role="main">
<!-- Start Math jax -->
  <script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
});
</script>
  <script type="text/javascript" async
  src="<?= base_url('assets/adminre/plugins/MathJax-master/MathJax.js?config=TeX-MML-AM_HTMLorMML') ?>">
</script>


        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
               
                <!-- Page Header -->

                <!-- START row -->

                <!-- Page Header -->
                
                <!-- Page Header -->

                <!-- START row -->
                <!-- /.row -->
<div class="row">
 <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="checkbox custom-checkbox pull-left">  
                        <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Daftar report</h3>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>  
    <!-- /.col-lg-12 -->
    <div class="col-lg-12">
        <!-- jalankan validasi pesan -->
        <?php if ($this->session->flashdata('info')) { ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Success</h4>
            </div>
        <?php } elseif ($this->session->flashdata('pesan2')) { ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Failed</h4>
                <?php echo $this->session->flashdata('pesan2'); ?>
            </div>
        <?php }; ?>
            <!-- end validasi -->

        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row --> 


            
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <!-- /.panel-default -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    
                    <!-- form search -->                
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group input-group">
                            
                        </div>
                    </div>
                    <div class="table-responsive panel-collapse pull out">
                    <table class="table table-striped" id="zero-configuration" style="font-size: 13px">
                    <thead>
                        <tr class="info">
                        <th>No</th>
                        <th>Judul BAB</th>
                        <th>Id Report</th>
                        <th>Id Siswa</th>
                        <th>Id Latihan</th>
                        <th>Jumlah Kosong</th>
                        <th>Jumlah Benar</th>
                        <th>Jumlah Salah</th>
                        <th>Total Nilai</th>
                        <th>Score</th>
                        <th>Tanggal Pengerjaan</th>
                        <th>Durasi Pengerjaan</th>
                        
                    </tr>                       
                    </thead>    
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($report as $d):
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?=$d['judul_bab'] ?></td> 
                        <td><?=$d['id_report_latihan'] ?></td>
                        <td><?=$d['id_pengguna'] ?></td>
                        <td><?=$d['id_latihan'] ?></td>
                        <td><?=$d['jmlh_kosong'] ?></td>
                        <td><?=$d['jmlh_benar']?></td>
                        <td><?=$d['jmlh_salah'] ?></td>
                        <td><?=$d['total_nilai'] ?></td>
                        <td><?=$d['score'] ?></td> 
                        <td><?=$d['tgl_pengerjaan'] ?></td>
                        <td><?=$d['durasi_pengerjaan'] ?></td>
                        
                                       
                        
                    <?php 
                    $no++;
                     endforeach;
                    
                    ?>                      
                    </tbody>
                    </table>
                                                </div>

                </div>
                <!-- /.table-hover -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>



 

    
