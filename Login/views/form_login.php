<!-- page content -->
<div id="page-content" class="page-content">
    <!-- page-content-scroll -->
    <div id="page-content-scroll">
        <!-- page-fullscreen bg-2 -->
        <div class="page-fullscreen bg-2">
            <!-- page-fullscreen-content -->
            <div class="page-fullscreen-content">
                <!-- pageapp-login -->
                <div class="pageapp-login">
                <!-- Alert message -->
                    <?php if ($this->session->flashdata('pesan1')) :?>
                    <div class="alert alert-warning">
                        <?php echo $this->session->flashdata('pesan2'); ?>
                        <!-- <span class="semibold">Note :</span>&nbsp;&nbsp;Just put anything and hit 'sign-in' button. -->
                    </div>
                    <?php endif; ?>
                    <!--/ Alert message -->
                <?php echo form_open('Login/login_user'); ?>
                    <?php echo validation_errors(); ?>
                    <a href="#" class="pageapp-login-logo">
                        <img src="<?php echo base_url('assets/minibar/dark/images/preload-logo.png')?>">
                    </a>
                    <div class="pageapp-login-input">
                        <i class="login-icon ion-ios-person-outline"></i>
                        <input type="text" name="username" value="<?php echo set_value('email') ?>" onfocus="if (this.value=='Username/Email') this.value = ''" onblur="if (this.value=='') this.value = 'Username/Email'">
                    </div>                
                    <div class="pageapp-login-input">
                        <i class="login-icon ion-ios-close-empty"></i>
                        <input type="password" name="password" onfocus="if (this.value=='password') this.value = ''" onblur="if (this.value=='') this.value = 'password'">
                    </div>
                    <div class="pageapp-login-links">
                        <a href="<?php echo base_url('index.php/forgot')?>" class="page-login-forgot"><i class="ion-ios-eye"></i>Forgot Credentials</a>
                        <a href="<?php echo base_url('index.php/registrasi')?>" class="page-login-create">Create Account<i class="ion-android-create"></i></a>
                        <a href="<?php echo base_url('index.php/registrasi/resend_code')?>" class="page-login-create">Resend Code<i class="ion-android-create"></i></a>
                        <div class="clear"></div>
                    </div>
                    <button type="submit" class="button button-green button-icon button-full half-top full-bottom">Login</button>
                    <!-- <a href="#" type="submit" class="button button-green button-icon button-full half-top full-bottom"><i class="ion-log-in"></i>Login</a> -->

                    <div class="decoration"></div>
                <?php echo form_close(); ?>
                <!-- /pageapp-login -->
                </div>
            <!-- /page-fullscreen-content -->
            </div>
            <!-- overlay dark-overlay -->
            <div class="overlay dark-overlay">
            <!-- /overlay dark-overlay -->
            </div>
        <!-- /page-fullscreen bg-2 -->
        </div> 
    <!-- /page-content-scroll -->    
    </div> 
<!-- /page content -->    
</div>

    

<div class="share-bottom share-dark">
    <h3>Share Page</h3>
    <div class="share-socials-bottom">
        <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.themeforest.net/">
            <i class="ion-social-facebook-outline icon-ghost facebook-bg"></i>
            Facebook
        </a>
        <a href="https://twitter.com/home?status=Check%20out%20ThemeForest%20http://www.themeforest.net">
            <i class="ion-social-twitter-outline twitter-bg"></i>
            Twitter
        </a>
        <a href="https://plus.google.com/share?url=http://www.themeforest.net">
            <i class="ion-social-googleplus-outline icon-ghost google-bg"></i>
            Google
        </a>
        <a href="https://pinterest.com/pin/create/button/?url=http://www.themeforest.net/&media=https://0.s3.envato.com/files/63790821/profile-image.jpg&description=Themes%20and%20Templates">
            <i class="ion-social-pinterest-outline icon-ghost pinterest-bg"></i>
            Pinterest
        </a>
        <a href="sms:">
            <i class="ion-ios-chatboxes-outline icon-ghost sms-bg"></i>
            Text
        </a>
        <a href="mailto:?&subject=Check this page out!&body=http://www.themeforest.net">
            <i class="ion-ios-email-outline icon-ghost mail-bg"></i>
            Email
        </a>
        <div class="clear"></div>
    </div>
</div>
 
    
</div>
</body>