

<div class="courses-page-area3" >
                <div class="container" >
                    <div class="row" > 
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12" style="width: 100%;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="section-divider" ></div>
                                    <div class="course-details-inner" >
                                        <div class="leave-comments" >
                                            <h3 class="sidebar-title">Registrasi</h3>
                                            <div class="row">
                                                <div class="contact-form" id="review-form"> 
                                                <div><?php echo $this->session->flashdata('msg'); ?></div>
                                                    <?php $attributes = array("name" => "registrationform");
                                                    echo form_open("registrasi/register", $attributes);?>
                                                        <fieldset>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Nama Depan *</label>
                                                                    <input type="text" name="nama_depan" placeholder="Nama Depan" value="<?php echo set_value('nama_depan'); ?>" onfocus="" class="form-control" required/>
                                                                    <span class="text-danger"><?php echo form_error('nama_depan'); ?></span>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Nama Belakang *</label>
                                                                    <input name="nama_belakang" placeholder="Nama Belakang" type="text" value="<?php echo set_value('nama_belakang'); ?>" onfocus="" class="form-control" required/>
                                                                    <span class="text-danger"><?php echo form_error('nama_belakang'); ?></span>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Email *</label>
                                                                    <input name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" onfocus="" class="form-control" required/>
                                                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Password *</label>
                                                                    <input name="password" placeholder="Password" type="password" onfocus="" id="password" class="form-control" required/>
                                                                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Confirm Password *</label>
                                                                    <input name="cpassword" placeholder="Confirm Password" type="password" onfocus="" class="form-control" id="password2" required onkeyup="checkPass(); return false;"/>
                                                                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                                                                    <span id="confirmMessage" class="confirmMessage"></span>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <button name="submit" type="submit" class="default-full-width-btn">Create Account </button>
                                                                     
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                <button name="cancel" type="reset" class="default-full-width-btn">Cancel</button>
                                                                     
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                <a href="<?php echo base_url('index.php/login')?>" class="default-full-width-btn" style="text-align: center;">Login here </a>
                                                                    
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    <?php echo form_close(); ?>
                                                    <?php echo $this->session->flashdata('msg'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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


