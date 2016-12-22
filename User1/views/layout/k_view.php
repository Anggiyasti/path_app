<!-- /.row -->
<div class="row">
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

        <h1 class="page-header">Kontrak</h1>
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
                         <a href="<?php echo base_url('site/tambah_kontrak'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus fa-1x"></i>  Kontrak</a>                   
                    </div>
                    <!-- form search -->                
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group input-group">
                            <form  class="navbar-form navbar-left" role="search" action="<?=base_url()?>site/carikontrak" method="post">  
                              <input class="form-control" placeholder="Cari No Kontrak" id="inputIcon" name="no_kontrak" type="text"> 
                               <span class="input-group-btn">
                                <button class="btn btn-default"><a class="icon-search"><i class="fa fa-search"></i></a></button>
                                </span>
                            </form> 
                        </div>
                    </div>
                    <table class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr class="info">
                        <th>No</th>
                        <th>No Kontrak</th>
                        <th>Id Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th></th>
                    </tr>                       
                    </thead>    
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?=$d['id_bank'] ?></td>
                        <td><?=$d['judul_bab'] ?></td>                  
                    
                        <td>
                            <a href="<?=base_url()?>index.php/banksoal/edit_kontrak/<?=$d['id_bank'] ?>" class="btn btn-outline btn-info"><i class="fa fa-edit"></i></a> 
                            <a class="btn btn-outline btn-info" href="#delete" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i></a>

                            <!-- Modal hapus-->
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            <a href="<?=base_url()?>site/hapus_kontrak/<?=$d['id_bank']?>" class="btn btn-default" >Yes</a>
                                            <a href="#"class="btn btn-default" data-dismiss="modal">No</a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </td>
                    </tr>
                    <?php 
                    $no++;
                    endforeach; 
                    ?>                      
                    </tbody>
                    </table>
                </div>
                <!-- /.table-hover -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

