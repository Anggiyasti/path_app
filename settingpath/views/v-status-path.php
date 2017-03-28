
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
                        <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Setting Status Path</h3>
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
        <div class="panel panel-teal mt10 mb0">
        <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Form Setting Status Path</h3>
                            </div>
                            <!--/ panel heading/header -->

            <div class="panel-body">
            <?php echo $this->session->flashdata('msg'); ?>
                <form action="<?=base_url()?>settingpath/test" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                    <div class="form-group">
                        <label class="col-sm-2">Status</label>
                        <div class="col-sm-5">
                            <select class='form-control' name="status">
                                <option value='0'>Non Aktif</option>
                                <option value='1'>Aktif</option>
                            </select>
                        </div>
                    </div> 
                </form>
                <input type="submit" value="Submit" onclick="set_status()">
            </div>
                <!-- end panel body -->
            
            </div>
            
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
// untuk update status path 
function set_status() {
        status = $('select[name=status]').val();
    
        data = {
            status:status
        };
        $.ajax({
        url:base_url+"settingpath/update_stat_path",
        data:data,
        type:"POST",
        dataType:"TEXT",
        success:function(){
          swal('Setting Part 2 Berhasil');
          
        },error:function(){
          swal('Setting Part 2 Gagal');
        }
      });
}


</script>
