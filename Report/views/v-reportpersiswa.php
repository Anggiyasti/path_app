
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
                    <div class="page-header-section">
                        <h4 class="title semibold">Daftar Soal</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="javascript:void(0);">Form</a></li>
                                <li class="active">Bank Soal</li>
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
                    <table class="table table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr class="info">
                        <th>NO</th>
                        <th>ID REPORT</th>
                        <th>ID SISWA</th>
                        <th>ID LATIHAN</th>
                        <th>JUMLAH KOSONG</th>
                        <th>JUMLAH BENAR</th>
                        <th>JUMLAH SALAH</th>
                        <th>TOTAL NILAI</th>
                        <th>SCORE</th>
                        <th>TANGGAL PENGERJAAN</th>
                        <th>DURASI PENGERJAAN</th>
                        
                    </tr>                       
                    </thead>    
                    <tbody>
                    <?php 
                    $no = 1;
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->id_report; ?></td>
                        <td><?php echo $data->id_siswa; ?></td>
                        <td><?php echo $data->id_latihan; ?></td> 
                        <td><?php echo $data->jumlah_kosong; ?></td>
                        <td><?php echo $data->jumlah_benar; ?></td>
                        <td><?php echo $data->jumlah_salah; ?></td>
                        <td><?php echo $data->total_nilai; ?></td>
                        <td><?php echo $data->score; ?></td> 
                        <td><?php echo $data->tgl_pengerjaan; ?></td>
                        <td><?php echo $data->durasi_pengerjaan; ?></td>
                        
                                       
                        
                    <?php 
                    $no++;
                    
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



 

    
