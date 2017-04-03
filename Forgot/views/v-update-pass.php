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
        <?php $attributes = array("name" => "registrationform");
                        echo form_open("forgot/updatepassword", $attributes);?>
          <h1>Reset Password</h1>
            <?php if (isset($email_hash, $email_code)) { ?>
                <input type="hidden" value="<?php echo $email_hash; ?>" name="email_hash"/>
                <input type="hidden" value="<?php echo $email_code; ?>" name="email_code"/>
            <?php } ?>

          <div class="input-field" style="margin-bottom:20px;">
            <i class="ion-android-mail prefix"></i> 
            <input type="email" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>" hidden="true">
            <input class="validate" id="login-email" type="email" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>" disabled> 
            <label for="login-email">Email</label>
          </div>

          <div class="input-field" style="margin-bottom:20px;">
            <i class="ion-android-lock prefix"></i> 
            <input class="validate" id="login-psw" type="password" name="password"> 
            <label for="login-psw">Password</label>
          </div>

          <div class="input-field" style="margin-bottom:20px;">
            <i class="ion-android-done prefix"></i> 
            <input class="validate" id="login-psw-2" type="password" name="password_conf" required onkeyup="checkPass(); return false;"> 
            <label for="login-psw-2">Confirm</label>
            <span id="confirmMessage" class="confirmMessage"></span>
          </div>

          <button class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4" type="submit">Submit</button>

          <?php echo form_close(); ?>
        </div><!-- End of Main Contents -->
      
       
      </div> <!-- End of Page Content -->

<script type="text/javascript">

    function checkPass() {

        //Store the password field objects into variables ...

        var pass1 = document.getElementById('login-psw');

        var pass2 = document.getElementById('login-psw-2');

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