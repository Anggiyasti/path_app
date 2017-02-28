
      
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">BANK SOAL</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="javascript:void(0);">Form</a></li>
                                <li class="active">Elements</li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- START panel -->
                        <div class="panel panel-default">
                            <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Form Mata Pelajaran</h3>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                            <div class="panel-body">
                                <form class="form-horizontal form-bordered" action="<?=base_url()?>index.php/Banksoal/uploadmapel" method="post">
                                <?php echo $this->session->flashdata('msg'); ?>
                                    
                                    
                                   
                                    <div class="form-group">
                                        <label class="col-sm-2">Alias Mata Pelajaran</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="alias_mapel" class="form-control" >
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-2">Nama Mata Pelajaran</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="nama_mapel" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2">Part</label>
                                        <div class="col-sm-5">
                                            <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                                <input type="checkbox" name="part1" id="customcheckbox1" value="1" />
                                                <label for="customcheckbox1">&nbsp;&nbsp;1</label>
                                            </span>
                                            <span class="checkbox custom-checkbox">
                                                <input type="checkbox" name="part2" value="2" id="customcheckbox2" />
                                                <label for="customcheckbox2">&nbsp;&nbsp;2</label>
                                            </span>
                                            <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                                <input type="checkbox" name="part3" id="customcheckbox3" value="3" />
                                                <label for="customcheckbox3">&nbsp;&nbsp;3</label>
                                            </span>
                                            <span class="checkbox custom-checkbox">
                                                <input type="checkbox" name="part4" value="4" id="customcheckbox4" />
                                                <label for="customcheckbox4">&nbsp;&nbsp;4</label>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="panel-footer">
                                        <div class="form-group no-border">
                                            <!-- <label class="col-sm-3 control-label">Button</label> -->
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <!-- <button type="reset" class="btn btn-danger">Reset button</button> -->
                                            </div>
                                        </div> 
                                    </div>
                                    </form>

                                  
                            </div>
                            <!-- panel body -->
                        </div>
                        <!--/ END form panel -->
                    </div>
                </div>
                <!--/ END row -->

             
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->

        
