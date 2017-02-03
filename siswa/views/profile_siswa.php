<?php 

  foreach ($Siswa as $row) {
    $id_siswa = $row['id_siswa'];

    $nama_depan = $row['nama_depan'];

    $nama_belakang = $row['nama_belakang'];

    $password = $row['password'];

    $email = $row['email'];

    $alamat = $row['alamat'];

    $namaskul = $row['nama_sekolah'];

    $no = $row['no_tlp'];

    $univ = $row['univ'];

    $jur = $row['jurusan'];

    $bio = $row['biografi'];

    // $universitas = $row['univ'];

    $photo=base_url().'assets/images/siswa/'.$row['photo'];

    $oldphoto=$row['photo'];

} ;

?> 


<div class="courses-page-area3">
                <div class="container">
                    <div class="row"> 
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="section-divider"></div>
                                    <div class="course-details-inner">
                                        <div class="leave-comments">
                                            <h3 class="sidebar-title">Profile Setting</h3>
                                            <div class="product-details-tab-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <ul>
                                                <li class="active"><a href="#description" data-toggle="tab" aria-expanded="false">Profile</a></li>
                                                <li><a href="#review" data-toggle="tab" aria-expanded="false">Password</a></li>
                                                <li><a href="#add-tags" data-toggle="tab" aria-expanded="false">Photo</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="description">
                                                    <div class="contact-form" id="review-form">
                                                    <?php echo $this->session->flashdata('msg'); ?> 
                                                    <form action="<?=base_url()?>index.php/Siswa/edit_siswa" method="post">
                                                        <fieldset>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Nama Depan</label>
                                                                    <input type="text" class="form-control" name="nama_depan" value="<?=$nama_depan; ?>">
                                                                    <?php echo form_error('nama_depan'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Nama Belakang</label>
                                                                    <input type="text" class="form-control" name="nama_belakang" value="<?=$nama_belakang; ?>">
                                                                    <?php echo form_error('nama_belakang'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Alamat</label>
                                                                    <input type="text" class="form-control" name="alamat" value="<?=$alamat; ?>">
                                                                    <?php echo form_error('alamat'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Nama Sekolah</label>
                                                                    <input type="text" class="form-control" name="nama_sekolah" value="<?=$namaskul; ?>">
                                                                    <?php echo form_error('nama_sekolah'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control" name="email" value="<?=$email; ?>">
                                                                    <?php echo form_error('email'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                <label>No Telepon</label>
                                                                <input type="text" class="form-control" name="no_tlp" value="<?=$no; ?>">
                                                                <?php echo form_error('no_tlp'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                <label>Universitas</label>
                                                                <input type="text" class="form-control" name="" value="<?=$univ; ?>" disabled>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                <label>Jurusan</label>
                                                                <input type="text" class="form-control" name="" value="<?=$jur; ?>" disabled>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                <label>biografi</label>
                                                                <textarea placeholder="Comment" class="textarea form-control" id="form-message" name="biografi" rows="8" cols="20"><?=$bio; ?></textarea>
                                                                <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
                                                                <input type="submit" class="view-all-accent-btn" name="update"  value="Update" style="color: #FFFFFF;" >
                                                                <!-- <button type="submit" name="update" class="view-all-accent-btn">Update</button> -->
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                </div>
                                                <div class="tab-pane fade" id="review">
                                                    <div class="contact-form" id="review-form">
                                                    <?php echo $this->session->flashdata('msg'); ?> 
                                                    <form action="<?=base_url()?>index.php/Siswa/ubahpass_siswa" method="post">
                                                        <fieldset>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Password Lama</label>
                                                                    <input type="password" name="" class="form-control" >
                                                                    <?php echo form_error('password'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Password Baru</label>
                                                                    <input type="password" class="form-control" name="password" id="password">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Ulangi Password</label>
                                                                    <input type="password" class="form-control" name="password2" class="form-control" id="password2"  required onkeyup="checkPass(); return false;">
                                                                    <?php echo form_error('password'); ?>
                                                                    <span id="confirmMessage" class="confirmMessage"></span>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
                                                                <button type="reset" class="view-all-accent-btn">Reset</button>
                                                                 <input type="submit" class="view-all-accent-btn" name="update"  value="Update" style="color: #FFFFFF;" >

                                                                
                                                                <!-- <button type="submit" name="update" class="view-all-accent-btn">Update</button> -->
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>                      
                                                </div>
                                                <div class="tab-pane fade" id="add-tags">                           
                                                    <div class="contact-form" id="photo">
                                                    <?php echo $this->session->flashdata('msg'); ?> 
                                                    <form action="<?=base_url()?>index.php/Siswa/upload/<?=$oldphoto; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                        <fieldset>
                                                        <img id="preview" class="img-circle img-bordered" src="<?=$photo;?>" alt="" width="150px" height="150px" />
                                                        <br><br>
                                                        <label for="file" class="view-all-accent-btn">
                                                        Pilih Gambar
                                                        </label>
                                                        <input style="display:none;" type="file" id="file" name="photo" class="btn btn-default" required="true" onchange="ValidateSingleInput(this);" />
                                                        <?php echo form_error('password'); ?>
                                                       <!--  <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>"> -->
                                                        <button type="submit" class="view-all-accent-btn">Simpan</button>
                                                        <div class="help-block with-errors"></div>

                                                                 

                                                                
                                                                <!-- <button type="submit" name="update" class="view-all-accent-btn">Update</button> -->

                                                        </fieldset>
                                                    </form>
                                                </div> 
                                                </div>                                          
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                            <div class="row">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <script type="text/javascript">
// load bab
$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('index.php/siswa/ambil_univ_jur')?>",
cache: false,
});

$("#univ").change(function(){

var value=$(this).val();
if(value>0){
$.ajax({
data:{modul:'getjur',id:value},
success: function(respond){
$("#jurusan").html(respond);
}
})
}

});

})

</script>
<script type="text/javascript">

    function checkPass() {

        //Store the password field objects into variables ...

        var pass1 = document.getElementById('password');

        var pass2 = document.getElementById('password2');

        //Store the Confimation Message Object ...

        var message = document.getElementById('confirmMessage');

        //Set the colors we will be using ...

        var goodColor = "#66cc66";

        var badColor = "#ff6666";

        var blank = "#fff"

        //Compare the values in the password field

        //and the confirmation field



        if (pass2.value == "") {

            message.style.color = blank;

            message.innerHTML = ""

        } else if (pass1.value == pass2.value) {

            //The passwords match.

            //Set the color to the good color and inform

            //the user that they have entered the correct password

            message.style.color = goodColor;

            message.innerHTML = "Passwords Cocok!"

        } else {

            //The passwords do not match.

            //Set the color to the bad color and

            //notify the user.

            message.style.color = badColor;

            message.innerHTML = "Passwords Tidak Cocok!"

        }

    }



</script>   
<script type="text/javascript">
 var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
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
</script>
