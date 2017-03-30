
     
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
                                        <label class="col-sm-2">ID</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" id="disabledSelect" type="text" name="id_mapel" value="<?php echo $editdata->id_mapel; ?>" disabled>
											<span id="pesan"></span>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-sm-2">Alias Mata Pelajaran</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="alias_mapel" value="<?php echo $editdata->alias_mapel; ?>">
											<span id="pesan"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-2">Nama Mata Pelajaran</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="nama_mapel" value="<?php echo $editdata->nama_mapel; ?>">
											<span id="pesan"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 ">Jurusan</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="jurusan_sekolah" value="<?php echo $editdata->jurusan; ?>" id="tampjur" hidden="true">
                                            <select name="jurusan" class="form-control">
                                                <option value="0" id="kosong">--Pilih Jurusan--</option>
                                                <option value="IPA" id="ipa">IPA</option>
                                                <option value="IPS" id="ips">IPS</option>
                                                <option value="SEMUA" id="SEMUA">SEMUA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="panel-footer">
                                        <div class="form-group no-border">
                                            <!-- <label class="col-sm-3 control-label">Button</label> -->
                                            <div class="col-sm-9">
                                                <input type="hidden" name="id_mapel" value="<?php echo $editdata->id_mapel; ?>">
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
    // set option jurusan ################
        var tampjurusan=$('#tampjur').val();
        if (tampjurusan == 'IPA') {
            $('#ipa').attr('selected','selected');
        }else if (tampjurusan== 'IPS') {
            $('#ips').attr('selected','selected');
        }else if (tampjurusan== 'SEMUA') {
            $('#SEMUA').attr('selected','selected');
        }else{
            $('#kosong').attr('selected','selected');
      }
</script>