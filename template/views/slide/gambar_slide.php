<?php 

  foreach ($slide as $row) {
    
     $id = $row['id'];
     $judul = $row['judul'];
     $resume = $row['resume'];
     // $isi = $row['isi'];
     $gambar=base_url().'assets/app/halo/img/'.$row['gambar'];
     $oldphoto=$row['gambar'];
} ;



?> 
     
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- START panel -->
                        <div class="panel panel-default">
                            <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Form Home</h3>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                           
           <?php echo $this->session->flashdata('msg'); ?> 
            <form name="form-account" action="<?=base_url()?>index.php/template/slide/gambar_slide/<?=$id; ?>"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
             <div class="form-group">
                                        <label class="col-sm-2">Judul Soal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="judul" name="judul" value="<?=$judul;?>">
                                            <br>
                      <span id="pesan"></span>
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-sm-2">Resume</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="resume" name="resume"><?=$resume; ?></textarea>
                                             <br>
                      <span id="pesan"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 ">Link Artikel</label>
                                        <div class="col-sm-10">
                                            <select name="id_artikel" id="id_artikel" class="form-control">
                                            <?php 
                                                foreach ($artikel as $row) {
                                                echo "<option value='$row[id_artikel]'>$row[judul_artikel]</option>";
                                                }
                                              ?>
                                        </select>
                                         <br>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-sm-2">Gambar Slide</label>
                                        <div class="col-sm-10">
                                            <img id="preview" class="img-bordered" src="<?=$gambar;?>" alt="" width="700px" height="1050px" />
                                            <div class="input-icon">
                                            <label><p>Gambar tidak boleh lebih dari 2mb (700x1050)</p></label>
                                            <input  type="file" id="file" name="photo" class="btn " onchange="ValidateSingleInput(this);" />
                                            <br>

                                            <br>

                                            <div class="one-half-responsive last-column" id="photo">

            <div class="notification notification-danger" id="notif" hidden="true">
            <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
            <h4>Silahkan cek type extension gambar!</h4>
            <p>Type yang bisa di upload hanya .jpeg|.gif|.jpg|.png|.bmp</p>
          </div>

          <div class="notification notification-danger" id="size" hidden="true">
            <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
            <h4>Silahkan cek ukuran gambar!</h4>
            <p>Ukuran yang bisa di upload maksimal 2mb ! </p>
          </div>

                      <span id="pesan"></span>
                                        </div>
                                    </div>

                                    


                                     <div class="content">

            

                   

                   
                </div>

            </div>
             <button type="submit" class="btn btn-primary">Simpan</button>

             
            </form>
        </div>
                            <!-- panel body -->
                        </div>
                        <!--/ END form panel -->
                    </div>
                </div>
        


        </section>
        <!--/ END Template Main -->



<script type="text/javascript">

 CKEDITOR.replace( 'editor1' );

 var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    

function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        console.log(sFileName);
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
             $('#notif').show();
                // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                // oInput.value = "";
                return false;
            }

            file = oInput.files[0];
            if (file.size > 508 ) {
               $('#size').show();
               return false;
            } 
            
        }
    }
    return true;
}


function ValidateSingleInput1(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        console.log(sFileName);
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
             $('#notifa').show();
                // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                // oInput.value = "";
                return false;
            }

            file = oInput.files[0];
            if (file.size > 508 ) {
               $('#sizea').show();
               return false;
            } 
            
        }
    }
    return true;
}






</script>










