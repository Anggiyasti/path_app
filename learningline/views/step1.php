<!-- <div>
<form action="<?=base_url()?>index.php/learningline/formstep3/<?=$mapel['id']?>" method="post">

		<?=$mapel['id']?>
<select name="bab">
	<?php foreach ($bab as $key) { ?>
		<option value="<?=$key['id_bab']?>"><?=$key['judul_bab']?></option>
	<?php } ?>
</select>	
<input type="submit" name="" value="sumbit">
</form>
<?php foreach ($bab as $key) { ?>
<a href="<?=base_url()?>index.php/learningline/formstep/<?=$mapel['id']?>/<?=$key['id_bab']?>"><?=$key['judul_bab']?></a>
<?php } ?>
</div> -->



        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        
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
                                <h3 class="panel-title">Pilih BAB</h3>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                          
                            <div class="panel-body">
                                <form class="form-horizontal form-bordered" action="<?=base_url()?>index.php/learningline/formstep3/<?=$mapel['id']?>" method="post">
                                <?php echo $this->session->flashdata('msg'); ?>
                                 
                                   <div class="form-group">
                                        <label class="col-sm-2 ">BAB</label>
                                        <div class="col-sm-5">
                                           <select class="form-control" name="bab">
        									<?php foreach ($bab as $key) { ?>
											<option value="<?=$key['id_bab']?>"><?=$key['judul_bab']?></option>
											<?php } ?>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="panel-footer">
                                        <div class="form-group no-border">
                                            
                                            <div class="col-sm-9">
                                                 <input class="btn btn-primary simpan_step" type="submit" name="" value="sumbit">
                                              
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

