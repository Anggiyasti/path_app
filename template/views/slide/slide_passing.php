
        <!--/ END Template Sidebar (Left) -->

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
                <div class="row">
                <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="checkbox custom-checkbox pull-left">  
                        <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Daftar Mata Pelajaran</h3>
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
                    <?php echo $this->session->flashdata('msg'); ?>
                                <table class="table table-bordered" id="zero-configuration" style="font-size: 13px">

                                    <thead>
                                        <tr>
                                            <!-- <th width="5%"></th> -->
                                            <th>ID </th>
                                            <th>Slider</th>

                                          
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach ($data as $ds):?>
                                        <tr>
                                            <td><?=$ds['id'];?></td>
                                          <td><?=$ds['judul'];?></td>
                                           
                                          
                                            
                                            
                                            <td class="text-center">
                                                <!-- button toolbar -->
                                                <div class="toolbar">
                                                    <div class="btn-group">
                                            
                                    <a href="<?=base_url()?>index.php/template/slide/gambar_slide_passing/<?=$ds['id']?>" class="btn btn-outline btn-info">Ubah Gambar</a> 
                                    
                                                                
                                                </div>
                                                <!--/ button toolbar -->
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>                  
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
                <!--/ END row -->

              

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
       

    