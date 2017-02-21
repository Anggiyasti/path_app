<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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

    $facebook = $row['facebook'];

    $twitter = $row['twitter'];

    $instagram = $row['instagram'];

    // $universitas = $row['univ'];

    $photo=base_url().'assets/images/siswa/'.$row['photo'];

    $oldphoto=$row['photo'];

} ;

?> 
<!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Profile Setting</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
 
        <div class="form-inputs">
            

            <h4 class="shipping-address">Profile</h4>
            <?php echo $this->session->flashdata('msg'); ?> 
            <form action="<?=base_url()?>index.php/Siswa/edit_siswa" method="post">
              <div class="input-field">

                <input type="text" class="validate" name="nama_depan" placeholder="Nama Depan" value="<?=$nama_depan; ?>">
                <?php echo form_error('nama_depan'); ?>
              </div>
              <div class="input-field">
                <input type="text" class="validate" name="nama_belakang" placeholder="Nama Belakang" value="<?=$nama_belakang; ?>">
                <?php echo form_error('nama_belakang'); ?>
              </div>
           
            <div class="input-field">
              <input type="text" class="validate" placeholder="Alamat" name="alamat" value="<?=$alamat; ?>">
            <?php echo form_error('alamat'); ?>
            </div>
            <div class="input-field">
              <input type="text" class="validate" placeholder="Nama Selolah" name="nama_sekolah" value="<?=$namaskul; ?>">
               <?php echo form_error('nama_sekolah'); ?>
            </div>
            <div class="input-field">
              <input type="email" class="validate" placeholder="email" value="<?=$email; ?>">
              <?php echo form_error('email'); ?>
            </div>
            <div class="input-field">
              <input type="text" class="validate" placeholder="no Telepon" name="no_tlp" value="<?=$no; ?>">
              <?php echo form_error('no_tlp'); ?>
            </div>
            <div class="input-field">
              <input type="text" class="validate" name="" value="<?=$univ; ?>" disabled>
            </div>
            <div class="input-field">
              <input type="text" class="validate" name="" value="<?=$jur; ?>" disabled>
            </div>
            <div class="input-field">
              <textarea placeholder="Biografi" class="textarea validate" id="form-message" name="biografi" rows="8" cols="20"><?=$bio; ?></textarea>
            </div>

            <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
            <!-- <button class="waves-effect waves-light btn-large primary-color width-100" name="update" type=""> Submit</button> -->
            <input type="submit"   name="update" value="Update" class="btn-large primary-color width-100"  >
          </form>



          <h4 class="shipping-address">Sosial Media</h4>
            <?php echo $this->session->flashdata('msg'); ?> 
            <form action="<?=base_url()?>index.php/Siswa/edit_sosmed" method="post">
              <div class="input-field">

                <input type="text" class="validate" name="facebook" placeholder="Facebook" value="<?=$facebook; ?>">
                <?php echo form_error('facebook'); ?>
              </div>
              <div class="input-field">
                <input type="text" class="validate" name="twitter" placeholder="Twitter" value="<?=$twitter; ?>">
                <?php echo form_error('twitter'); ?>
              </div>
           
            <div class="input-field">
              <input type="text" class="validate" placeholder="Instagram" name="instagram" value="<?=$instagram; ?>">
            <?php echo form_error('instagram'); ?>
            </div>

            <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
            <!-- <button class="waves-effect waves-light btn-large primary-color width-100" name="update" type=""> Submit</button> -->
            <input type="submit"   name="update" value="Update" class="btn-large primary-color width-100"  >
          </form>

          <h4 class="shipping-address">Password</h4>
            <?php echo $this->session->flashdata('msg'); ?> 
            <form action="<?=base_url()?>index.php/Siswa/ubahpass_siswa" method="post">
              <div class="input-field">
                <label>Password Lama</label>
                <input type="password" name="" class="form-control" >
                <?php echo form_error('password'); ?>
              </div>
              <div class="input-field">
                <label>Password Baru</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
           
            <div class="input-field">
                <label>Ulangi Password</label>
                <input type="password" class="form-control" name="password2" class="form-control" id="password2"  required onkeyup="checkPass(); return false;">
                <?php echo form_error('password'); ?>
                <span id="confirmMessage" class="confirmMessage"></span>
            </div>

            <div class="input-field">
            <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
            <button type="reset" class="btn-large primary-color width-100">Reset</button>
            </div>

            <div class="input-field">
            <input type="submit" class="btn-large primary-color width-100" name="update"  value="Update" >
            </div>
          </form>
           
          <div class="notification notification-danger" id="notif" hidden="true">
            <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
            <h4>Silahkan cek type extension gambar!</h4>
            <p>Type yang bisa di upload hanya .jpeg|.gif|.jpg|.png|.bmp</p>
          </div>

          <div class="notification notification-danger" id="size" hidden="true">
            <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
            <h4>Silahkan cek ukuran gambar!</h4>
            <p>Ukuran yang bisa di upload maksimal 100Kb! </p>
          </div>

          <h4 class="shipping-address">Photo</h4>
            <?php echo $this->session->flashdata('msg'); ?> 
            <form action="<?=base_url()?>index.php/Siswa/upload/<?=$oldphoto; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

            <img id="preview" class="img-circle circle avatar" src="<?=$photo;?>" alt="" style="width: 150px; height: 150px;" />
            <br><br>            
            <label for="file" class="btn primary-color" >
            Pilih Gambar
            </label>
            <input style="display:none;" type="file" id="file" name="photo" class="btn btn-default" required="true" onchange="ValidateSingleInput(this);" />
             <label class="btn primary-color"  onclick="restImgSoal()">Reset</label>
            <?php echo form_error('password'); ?>
                                                       <!--  <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>"> -->
            <button type="submit" class="btn primary-color">Simpan</button>
          </form>
          </div>

          
       

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

  function restImgSoal() {
      $("input[name=photo]").val("");
      $('#preview').attr('src', "");
      $('#file').text("");
      $('#filetypeSoal').text("");
      $('#filesizeSoal').text("");
    }


</script>   
<!-- start script js validation extension -->
<script type="text/javascript">
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
            if (file.size > 103000 ) {
               $('#size').show();
               return false;
            } 
            
        }
    }
    return true;
}
</script>
<!-- END -->
