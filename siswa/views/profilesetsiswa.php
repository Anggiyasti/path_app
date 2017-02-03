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





    // $biografi = $row['biografi'];

    // $photo=base_url().'assets/image/photo/guru/'.$row['photo'];

    // $oldphoto=$row['photo'];

} ;



?> 



<div id="page-content" class="header-clear">
   
                
          <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
        <div class="decoration decoration-margins"></div>
        <div class="heading-strip bg-7">
            <h3>Profile Setting</h3>
           
            <i class="ion-compose"></i>
            <div class="overlay dark-overlay"></div>
        </div>
        <div class="decoration decoration-margins"></div>
        <?php echo $this->session->flashdata('msg'); ?>
        <form action="<?=base_url()?>index.php/Siswa/edit_siswa" method="post">
        <div class="one-half-responsive">
            <div class="content">
                
                <div class="input-icon">
                    <label>Nama Depan</label>
                    <input type="text" class="input-text-box input-green-border" name="nama_depan" value="<?=$nama_depan; ?>">
                    <?php echo form_error('nama_depan'); ?>
                </div>
                <div class="input-icon">
                    <label>Nama Belakang</label>
                    <input type="text" class="input-text-box input-green-border" name="nama_belakang" value="<?=$nama_belakang; ?>">
                    <?php echo form_error('nama_belakang'); ?>
                </div>
                
                <div class="input-icon">
                    <label>Alamat
                    </label>
                    <input type="text" class="input-text-box input-green-border" name="alamat" value="<?=$alamat; ?>">
                    <?php echo form_error('alamat'); ?>
                </div>
                <div class="input-icon">
                    <label>Nama Sekolah
                    </label>
                    <input type="text" class="input-text-box input-green-border" name="nama_sekolah" value="<?=$namaskul; ?>">
                    <?php echo form_error('nama_sekolah'); ?>
                </div>
                    <div class="input-icon">
                    <label>Email</label>
                    <input type="email" class="input-text-box input-green-border" name="email" value="<?=$email; ?>">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="input-icon">
                    <label>No Telepon</label>
                    <input type="text" class="input-text-box input-green-border" name="no_tlp" value="<?=$no; ?>">
                     <?php echo form_error('no_tlp'); ?>
                </div>
                <div class="input-icon">
                    <label>No Telepon</label>
                    <input type="text" class="input-text-box input-green-border" name="no_tlp" value="<?=$no; ?>">
                     <?php echo form_error('no_tlp'); ?>
                </div>
                <div class="input-icon">
                    <label>Universitas</label>
                    <input type="text" class="input-text-box input-green-border" name="no_tlp" value="<?=$univ; ?>" disabled>
                </div>
                <div class="input-icon">
                    <label>Jurusan</label>
                    <input type="text" class="input-text-box input-green-border" name="no_tlp" value="<?=$jur; ?>" disabled>
                </div>
                <div class="input-icon">
                    <label>biografi</label>
                    <input type="text" class="input-text-box input-green-border" name="biografi" value="<?=$bio; ?>" disabled>
                </div>
            </div>
            <div class="content">
            <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
            <input type="submit" class="button button-dark" name="update"  value="Update" class="btn btn-primary">
            
            </div> 
                
        </div>
        </form>

        <div class="one-half-responsive last-column" id="photo">
            <form name="form-account" action="<?=base_url()?>index.php/Siswa/upload/<?=$oldphoto; ?>"  method="post" accept-charset="utf-8" enctype="multipart/form-data">


            <div class="content">

            <img id="preview" class="img-circle img-bordered" src="<?=$photo;?>" alt="" width="150px" height="150px" />
             
                <div class="input-icon">
                
                    <input type="file" id="file" name="photo" class="btn btn-default" required="true"/>
                    <button type="submit" class="button button-dark">Simpan</button>
                </div>

            </div>

             
            </form>
        </div>

        <div class="decoration decoration-margins"></div>

        <?php echo $this->session->flashdata('msg'); ?>
        <form action="<?=base_url()?>index.php/Siswa/ubahpass_siswa" method="post">
        <div class="one-half-responsive">
            <div class="content">
                <div class="input-icon">
                    <label>Password Lama</label>
                    <input type="password" name="" class="input-text-box input-green-border" >
                    <?php echo form_error('password'); ?>
                </div>
            </div>
            <div class="content">

                <div class="input-icon">
                    <label>Password Baru</label>
                    <input type="password" class="input-text-box input-green-border" name="password" id="password">
                    
                </div>
                <div class="input-icon">
                    <label>Ulangi Password</label>
                    <input type="password" class="input-text-box input-green-border" name="password2" class="form-control" id="password2"  required onkeyup="checkPass(); return false;">
                    <?php echo form_error('password'); ?>
                    <span id="confirmMessage" class="confirmMessage"></span>
                </div>
                
            </div>
            <div class="content">
            <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
            <button type="reset" class="button button-dark btn btn-default">Reset</button>
            <input type="submit" class="button button-dark" name="update"  value="Update" class="btn btn-primary">
            
            </div> 
                
        </div>
        </form>

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
</body>