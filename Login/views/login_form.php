<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="header-top-right">
                                       
                                                
                                                
                                                    <h1 class="title-default-left-bold">Login</h1>
                                                   <!-- <form> -->
                                                    <?php echo form_open('Login/login_user'); ?>
                                                    <?php echo validation_errors(); ?>
                                                        <label>Username or email address *</label>
                                                        <input type="text" type="text" name="username" value="<?php echo set_value('email') ?>" onfocus="if (this.value=='Username/Email') this.value = ''" onblur="if (this.value=='') this.value = 'Username/Email'"/>
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

</body>
</html>