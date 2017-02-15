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
 
 <div class="form-inputs">
            

            <h4 class="shipping-address">Profile</h4>
            <?php echo $this->session->flashdata('msg'); ?> 
            <form action="<?=base_url()?>index.php/Siswa/edit_siswa" method="post">
              <div class="input-field">
                <input type="text" class="validate" name="nama_depan" value="<?=$nama_depan; ?>">
                <?php echo form_error('nama_depan'); ?>
              </div>
              <div class="input-field">
                <input type="text" class="validate" name="nama_belakang" value="<?=$nama_belakang; ?>">
                <?php echo form_error('nama_belakang'); ?>
              </div>
           
            <div class="input-field">
              <input type="text" class="validate" name="alamat" value="<?=$alamat; ?>">
            <?php echo form_error('alamat'); ?>
            </div>
            <div class="input-field">
              <input type="text" class="validate" name="nama_sekolah" value="<?=$namaskul; ?>">
               <?php echo form_error('nama_sekolah'); ?>
            </div>
            <div class="input-field">
              <input type="email" class="validate" name="email" value="<?=$email; ?>">
              <?php echo form_error('email'); ?>
            </div>
            <div class="input-field">
              <input type="text" class="validate" name="no_tlp" value="<?=$no; ?>">
              <?php echo form_error('no_tlp'); ?>
            </div>
            <div class="input-field">
              <input type="text" class="validate" name="" value="<?=$univ; ?>" disabled>
            </div>
            <div class="input-field">
              <input type="text" class="validate" name="" value="<?=$jur; ?>" disabled>
            </div>
            <div class="input-field">
              <textarea placeholder="Comment" class="textarea validate" id="form-message" name="biografi" rows="8" cols="20"><?=$bio; ?></textarea>
            </div>

            <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
            <button class="waves-effect waves-light btn-large primary-color width-100" name="update"> Submit</button>
          <!--   <input type="submit"    value="Update"  > -->

            <!-- <a class="waves-effect waves-light btn-large primary-color width-100" href="index.html">Purchase</a> -->
          </form>
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
