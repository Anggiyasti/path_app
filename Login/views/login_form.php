
<div class="why-choose-area">                                
                <div class="container">
                    <h2 class="about-title"> <h1 class="title-default-left-bold">Login</h1></h2>
                    
                </div>
                <div class="container">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="header-top-right">
                                       
                                                
                                                
                                                    
                                                   <!-- <form> -->
                                                    <?php echo form_open('Login/login_user'); ?>
                                                    <?php echo validation_errors(); ?>
                                                    <table>
                                                        <label>Username or email address *</label>
                                                        <input type="text" type="text" name="username" value="<?php echo set_value('email') ?>" onfocus="if (this.value=='Username/Email') this.value = ''" onblur="if (this.value=='') this.value = 'Username/Email'"/>
                                                        <br>
                                                        <label>Password *</label>
                                                        <input type="password" name="password" onfocus="if (this.value=='password') this.value = ''" onblur="if (this.value=='') this.value = 'password'"/>
                                                        <label class="check">Lost your password?</label>
                                                        <span><input type="checkbox" name="remember"/>Remember Me</span>
                                                        <button class="default-big-btn" type="submit" value="Login">Login</button>
                                                        <button class="default-big-btn form-cancel" type="submit" value="">Cancel</button>
                                                        
                                                    <!-- </form> -->
                                                    <?php echo form_close(); ?>
                                               
                                            
                                    </div>
                                </div>
                            </div>
                </div>
            </div>

