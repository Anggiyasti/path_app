<!-- page content -->
<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
        <div class="page-login content">
        <div>hello
        <?php echo $this->session->flashdata('msg'); ?></div>
                     <?php $attributes = array("name" => "registrationform");
                    echo form_open("registrasi/register", $attributes);?>
                    <div class="pageapp-login-input">
                        <i class="login-icon ion-person"></i>
                        <input type="text" name="nama_depan" placeholder="Nama Depan" value="<?php echo set_value('nama_depan'); ?>" onfocus="" required/>
                        <span class="text-danger"><?php echo form_error('nama_depan'); ?></span>
                    </div>                   
                    <div class="pageapp-login-input">
                        <i class="login-icon ion-person"></i>
                        <input name="nama_belakang" placeholder="Nama Belakang" type="text" value="<?php echo set_value('nama_belakang'); ?>" onfocus="" required/>
                        <span class="text-danger"><?php echo form_error('nama_belakang'); ?></span>
                    </div>       
                    <div class="pageapp-login-input">
                        <i class="login-icon ion-at"></i>
                        <input name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" onfocus="" required/>
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>                  
                                   
                    <div class="pageapp-login-input full-bottom">
                        <i class="login-icon ion-locked"></i>
                        <input name="password" placeholder="Password" type="password" onfocus="" id="password" required/>
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                    <div class="pageapp-login-input full-bottom">
                        <i class="login-icon ion-locked"></i>
                        <input name="cpassword" placeholder="Confirm Password" type="password" onfocus="" id="password2" required onkeyup="checkPass(); return false;"/>
                        <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                         <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                   
                   <div class="form-group">
                   <button name="submit" type="submit" class="button button-green button-icon button-full half-top half-bottom">Create Account</button>
                   
                    <button name="cancel" type="reset" class="button button-green button-icon button-full half-top half-bottom">Cancel</button>
                    <a href="<?php echo base_url('index.php/login')?>" class="button button-blue button-icon button-full half-top full-bottom">Login Here</a>
                    </div>
                    <?php echo form_close(); ?>
                    <?php echo $this->session->flashdata('msg'); ?>

                    <!-- <a href="#" class="button button-green button-icon button-full half-top half-bottom"><i class="ion-log-in"></i>Create Account</a> -->
                   
            
        </div>        
    </div>  
</div>
        

 
    
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




</body>
<!-- <div class="pageapp-login-input">
                        <i class="login-icon ion-calendar"></i>
                        <input class="set-today" type="date">                
                    </div>  -->