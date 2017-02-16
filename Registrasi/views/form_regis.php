
<!-- Page Content -->
      <div id="content" class="grey-blue login">

        <!-- Toolbar -->
        <div id="toolbar" class="tool-login primary-color animated fadeindown">
          <a href="javascript:history.back()" class="open-left">
            <i class="ion-android-arrow-back"></i>
          </a>
        </div>
        
        <!-- Main Content -->
        <div class="login-form animated fadeinup delay-2 z-depth-1">

          <h1>Register</h1>
          <div><?php echo $this->session->flashdata('msg'); ?></div>
          <?php $attributes = array("name" => "registrationform");
          echo form_open("registrasi/register", $attributes);?>
          <div class="input-field">
            <i class="ion-android-contact prefix"></i> 
            <label>Nama Depan *</label>
            <input type="text" name="nama_depan"  value="<?php echo set_value('nama_depan'); ?>" onfocus="" class="form-control" required/>
            <span class="text-danger"><?php echo form_error('nama_depan'); ?></span>
          </div>

          <div class="input-field">
            <i class="ion-android-contact prefix"></i> 
            <label>Nama Belakang *</label>
            <input name="nama_belakang" type="text" value="<?php echo set_value('nama_belakang'); ?>" onfocus="" class="form-control" required/>
            <span class="text-danger"><?php echo form_error('nama_belakang'); ?></span>
          </div>
          <div class="input-field">
            <i class="ion-android-contact prefix"></i> 
            <label>Email *</label>
            <input name="email"  type="text" value="<?php echo set_value('email'); ?>" onfocus="" class="form-control" required/>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          </div>
          <div class="input-field">
            <i class="ion-android-lock prefix"></i> 
            <label>Password *</label>
            <input name="password"  type="password" onfocus="" id="password" class="form-control" required/>
            <span class="text-danger"><?php echo form_error('password'); ?></span>
          </div>
          <div class="input-field">
            <i class="ion-android-lock prefix"></i> 
            <label>Confirm Password *</label>
            <input name="cpassword" type="password" onfocus="" class="form-control" id="password2" required onkeyup="checkPass(); return false;"/>
            <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
            <span id="confirmMessage" class="confirmMessage"></span>
          </div>

          
          
          <button name="submit" type="submit" class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4">Create Account </button>
          <button name="cancel" type="reset" class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4">Cancel</button>
          <a href="<?php echo base_url('index.php/login')?>" class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4" style="text-align: center;">Login here </a>
          
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
        </div><!-- End of Main Contents -->
        </div>
      




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


