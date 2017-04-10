



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
                        <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Daftar Video</h3>
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
                    
                    <div class="table-responsive panel-collapse pull out">
                    <table class="table table-bordered" id="zero-configuration" style="font-size: 13px">
                    <thead>
                        <tr class="info">
                        <th>Id</th>
                        <th>Judul Video</th>
                        <th>Deskripsi</th>
                        <th>Nama File</th>
                        <th>Link</th>
                        <th>AKsi</th>

                    </tr>                       
                    </thead>    
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data as $d) : ?>
                    <tr>
                        <td><?=$d['id']?></td>
                        <td><?=$d['judul_video'] ?></td> 
                        <td><?=$d['deskripsi'] ?></td>
                        <td><?=$d['nama_file'] ?></td>
                        <td><?=$d['link'] ?></td>
                        <td class="text-center">
                        <!-- button toolbar -->
                        <div class="toolbar">
                            <!-- btn-group -->
                           <div class="btn-group">                                            
                                <a href="<?=base_url()?>index.php/videoback/edit_video_part4/<?=$d['id']?>" class="btn btn-outline btn-info">Edit</a> 
                                <a class="btn btn-outline btn-info" href="#delete" data-toggle="modal" data-target="#delete<?php echo $d['id'];?>">Hapus</a>              
                            </div>
                            <!--/ btn-group -->
                        </div>
                         <div class="modal fade" id="delete<?php echo $d['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                    <a href="<?=base_url()?>index.php/videoback/del_file_video_path4/<?=$d['id']?>" class="btn btn-default" >Yes</a>
                                                    <a href="#"class="btn btn-default" data-dismiss="modal">No</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                        <!--/ button toolbar -->
                         </td> 

                           
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

       

 