

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
                                <h3 class="panel-title">Form Soal</h3>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                            <div class="panel-body">
                                
                                    <form class="form-horizontal form-bordered" action="" method="post">
                                    <?php echo validation_errors(); ?>

                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 ">ID BAB</label>
                                        <div class="col-sm-5">
										<input class="form-control" id="disabledSelect" type="text" name="id_bab" value="<?php echo $editdata->id_bab; ?>" disabled>
										<span id="pesan"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-2">judul Bab</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="judul_bab" value="<?php echo $editdata->judul_bab; ?>">
												<span id="pesan"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-2">Keterangan</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="keterangan" value="<?php echo $editdata->keterangan; ?>">
											<span id="pesan"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2">Status</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="status_free" value="<?php echo $editdata->free; ?>" id='tamp_status' hidden="true">
                                            <select name="status_free" id="" class="form-control">
                                                <option value="0" id="free">Free</option>
                                                <option value="1" id="premium">Premium</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="panel-footer">
                                        <div class="form-group no-border">
                                            <!-- <label class="col-sm-3 control-label">Button</label> -->
                                            <div class="col-sm-9">
                                                <input type="hidden" name="id_bab" value="<?php echo $editdata->id_bab; ?>">
												<input type="submit" class="btn" name="update"  value="Update">
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

                <!-- START row -->
                
                <!--/ END row -->

                <!-- START row -->
                
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->

        

<script type="text/javascript">
    // set option kesulitan ################
    var tampstatus=$('#tamp_status').val();
    if (tampstatus == 0) {
        $('#free').attr('selected','selected');
    }else {
        $('#premium').attr('selected','selected');
    }
</script>