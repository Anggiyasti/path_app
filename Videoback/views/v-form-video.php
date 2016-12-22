
<!-- START Template Main -->
        <section id="main" role="main">
        <!-- Start Modal salah upload video -->
<div class="modal fade" id="warningupload" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title text-center text-danger">Peringatan</h2>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Silahkan cek type extension video!</h3>
        <h5 class="text-center">Type yang bisa di upload hanya .mp4</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Form Video</h4>
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
                <!-- Page Header -->
                <div class="row">
<!--                     <div class="col-md-6">
 -->                        <!-- Form horizontal layout striped -->
                        <form class="form-horizontal form-striped panel panel-default" action="<?=base_url()?>index.php/videoback/cek_option_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="panel-heading">
                                <h3 class="panel-title">Form Tambah Video</h3>
                            </div>
                            <?php echo $this->session->flashdata('msg'); ?>               
                            <div class="panel-body">
                                <div class='form-group'>
                                    <label class="col-sm-2">Mata Pelajaran</label>
	                                <div class="col-sm-8">
	                                    <select class='form-control' name="pelajaran" id='pelajaran'>
	                       	                <option value='0'>--pilih--</option>
	                                        <?php 
	                                        foreach ($mapel as $prov) {
	                                        echo "<option value='$prov[id_mapel]'>$prov[nama_mapel]</option>";
	                                        }
	                                        ?>
	                   	                </select>
	                                </div>
                                </div>
                                <div class='form-group'>
                                    <label class="col-sm-2">Bab</label>
                                    <div class="col-sm-8">
                                        <select class='form-control' name="id_bab" id='id_bab'>
                                    	    <option value='0'>--pilih--</option>
                                        </select>
                                    </div>
                                </div>  
                                <!-- pilih option upload video -->

            <div class="form-group">

                <label class="col-sm-2">Pilihan Upload Video</label>

                <div class="col-sm-8">

                    <div class="btn-group" data-toggle="buttons" >

                        <label class="btn btn-info active" id="up_server">

                            <input type="radio" name="option_up" value="server" autocomplete="off" > Upload Video Ke server

                        </label>

                        <label class="btn btn-default " id="up_link">

                            <input type="radio" name="option_up"  value="link" autocomplete="off" checked="true"> Link

                        </label>

                    </div>

                </div>

            </div>



            <!-- untuk preview video -->

            <div  class="form-group prv_video" hidden="true">

                <div class="row" style="margin:1%;"> 

                    <div class="col-md-8">

                        <video id="preview" class="img-tumbnail image" src="" width="100%" height="50%" controls >



                        </video>

                    </div>

                    <div class="col-md-2 left"> 

                        <h6>Name: <span id="filename" name="nama_file"></span></h6> 

                    </div> 

                    <div class="col-md-2 left"> 

                        <h6>Size: <span id="filesize"></span>Kb</h6> 

                    </div> 

                    <div class="col-md-4 bottom"> 

                        <h6>Type: <span id="filetype"></span></h6> 

                    </div>

                </div>

            </div>
            <!-- upload ke server -->

            <div id="upload" class="form-group server">

                <label class="col-sm-2">File Video</label>

                <div class="col-sm-8">



                    <label for="file" class="btn btn-success">

                        Pilih Video

                    </label>

                    <input style="display:none;" type="file" id="file" name="video" onchange="ValidateSingleInput(this);"/>

                </div>

            </div>



            <!-- upload video by link -->



            <div class="form-group link" hidden="true">

                <label class="col-sm-2">Link Video</label>

                <div class="col-sm-8">

                    <input class="form-control" type="text" name="link_video">

                </div>

            </div>

                              
					            <div class="form-group">
					                <label class="col-sm-2">Jenis Video</label>

					                <div class="col-sm-8">

					                    <select name="jenis_video" class="form-control" required>

					                        <option value="" selected>-Pilih Jenis Video-</option>

					                        <option value="1">Room Recording</option>

					                        <option value="2">Screen Recording</option>

					                    </select>

					                </div>

					            </div>



                                <div class="form-group">

                <label class="col-sm-2">Judul Video</label>

                <div class="col-sm-8">

                    <input type="text" name="judul_video" class="form-control">

                    <span class="text-danger"><?php echo form_error('judul_video'); ?></span>

                </div>



            </div>

                                <div class="form-group">

                <label class="col-sm-2">Deskripsi Video</label>

                <div class="col-sm-8">

                    <textarea class="form-control" name="deskripsi"></textarea>

                </div>

            </div>
                                <div class="form-group">

                <label class="col-sm-2">Publish</label>

                <div class="col-sm-4">

                    <select name="publish" class="form-control">

                        <option value="0" selected>Select</option>

                        <option value="0">Tidak</option>

                        <option value="1">Ya</option>

                    </select>

                </div>
                </div>
                <div class="panel-footer">

                <div class="col-md-2 col-md-offset-4 pull-right">

                    <button type="reset" class="btn btn-default">Reset</button>

                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label">Submit</span></button>

                </div>

            </div>



        </form>

        <!--/ END Form panel -->
           </div>
                <!--/ END row -->
            </div>
            <!-- Template Container -->

        </section>   

                    <script type="text/javascript">
            	$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('index.php/videoback/ambil_data') ?>",
cache: false,
});

$("#pelajaran").change(function(){

var value=$(this).val();
if(value>0){
$.ajax({
data:{modul:'getbab',id:value},
success: function(respond){
$("#id_bab").html(respond);
}
})
}

});

})
            </script> 

            <!-- start script js validation extension -->
<script type="text/javascript">
 var _validFileExtensions = [".mp4"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                $('#warningupload').modal('show');
                // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                // oInput.value = "";
                return false;
            }
        }
    }
    return true;
}

// Strat  event untuk pilihan jenis input  
 $(document).ready(function () {
        $("#up_server").click(function () {

            $(".server").show();

            $(".link").hide();

        });

        $("#up_link").click(function () {

            $(".link").show();

            $(".server").hide();

            $(".prv_video").hide();

        });

        $("#file").click(function () {

            $(".prv_video").show();

        });



    });
</script>
<!-- END -->



        