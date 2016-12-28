
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
                        <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Daftar Soal</h3>
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
                    <div class="col-md-4">       
                    </div>
                    <!-- form search -->                
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group input-group">
                            
                        </div>
                    </div>
                    <div class="table-responsive panel-collapse pull out">
                    <table class="table table-bordered" id="zero-configuration" style="font-size: 13px">
                    <thead>
                        <tr class="info">
                        <th>No</th>
                        <th>Id Soal</th>
                        <th>Judul Soal</th>
                        <th>Id Mata Pelajaran</th>
                        <th>Id Bab</th>
                        <th>Kesulitan</th>
                        <th>Soal</th>
                        <th>Jawaban</th>
                        <th>Publish</th>

                        <th></th>
                    </tr>                       
                    </thead>    
                    <tbody>
                    <?php 
                   
                    $no = 1;
                    foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <!-- <td><?=$d['UUID'] ?></td> -->
                        <td><?=$d['id_bank'] ?></td>
                        <td><?=$d['judul_soal'] ?></td>
                        <td><?=$d['nama_mapel'] ?></td> 
                        <td><?=$d['judul_bab'] ?></td>
                        <?php 
                                            // menentukan tingkat kesulitan dengan indeks 1 - 3
                                              $k = $d['kesulitan'];
                                              if ($k == '3') {
                                                  $kk = 'Sulit';
                                              } elseif ($k == '2') {
                                                  $kk = 'Sedang';
                                              }else {
                                                 $kk = 'Mudah';
                                              }
                                             ?>   
                                             <td><?=$kk;?></td>                  
                        <td><?php
                            $c =  $d['soal'];
                            echo substr($c, 0, 20) ."..." ?>
                            <a class='label label-info' href='#mdetailsoal' title='lihat detail' data-toggle='modal' data-target='#mdetailsoal<?php echo $d['id_bank']; ?>'>Lihat Detail</a>
                        </td>
                        <td><?=$d['jawab'] ?>
                        </td>
                        <td>
                            <?php 
                            $publish =  $d['publish'];
                            // echo $publish;
                            // menentukan checked random
                            if ($publish == '1') {
                                echo '<div class="checkbox custom-checkbox nm">  
                            <input type="checkbox" id="customcheckbox-one1" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" checked>  
                            <label for="customcheckbox-one1"></label>   
                            </div>';
                            } else {
                                 echo '<div class="checkbox custom-checkbox nm">  
                            <input type="checkbox" id="customcheckbox-one1" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" disabled>  
                            <label for="customcheckbox-one1"></label>   
                            </div>';
                        }
                             ?>
                        </td>
                        <td>
                          <a href="<?=base_url()?>index.php/banksoal/formUpdate/<?=$d['UUID'] ?>" class="btn btn-outline btn-info">Edit</a> 
                            <a class="btn btn-outline btn-info" href="#delete" data-toggle="modal" data-target="#delete<?php echo $d['id_bank']; ?>">Delete<i class="fa fa-trash-o"></i></a>
                            

                            <!-- Modal hapus-->
                            <div class="modal fade" id="delete<?php echo $d['id_bank']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Delete</h4>
                                        </div>
                                            <div class="modal-body">
                                                Are you sure?
                                            </div>
                                        <div class="modal-footer">
                                            <a href="<?=base_url()?>index.php/banksoal/hapus_soal/<?=$d['id_bank']?>" class="btn btn-default" >Yes</a>
                                            <a href="#"class="btn btn-default" data-dismiss="modal">No</a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </td>
                        <!-- Start Modal Detail Soal -->
                            <div class="modal fade" id="mdetailsoal<?php echo $d['id_bank']; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h3 class="semibold mt0 text-accent text-center"></h3>
                                        </div>
                                        <div class="modal-body">
                                        <label>SOAL :</label>
                                        <p class="text-justify" id="dsoal">
                                            <?=$d['soal'] ?>
                                            
                                        </p>
                                        <label>JAWABAN :</label>
                                        <p class="text-justify" id="djawaban">
                                            <?=$d['jawaban_benar'] ?>
                                            
                                        </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger mb5" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Detail Soal-->
                    </tr>
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

            <!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

</section>
        <!--/ END Template Main -->




