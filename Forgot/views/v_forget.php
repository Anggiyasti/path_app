
<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
                
       
        
        <div class="decoration decoration-margins"></div>
        <div class="heading-strip bg-7">
            <h3>Input Fields</h3>
            <i class="ion-compose"></i>
            <div class="overlay dark-overlay"></div>
        </div>
        <div class="decoration decoration-margins"></div>
        
       
      
        <div class="clear"></div>
        <form class="login-form" name="form-register" action="<?= base_url() ?>index.php/forgot/cobalupa" method="post"> 
            
        <div class="one-half-responsive">
        <div class="content">
            <?php if ($this->session->flashdata('notif') != '') {
                        ?>
                        <div class="alert alert-warning">
                            <span class="semibold">Note :</span><?php echo $this->session->flashdata('notif'); ?>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-warning">
                            <span class="semibold">Note :</span>&nbsp;&nbsp;Kami akan kirimkan kode reset password ke email akun mu.
                        </div>
            <?php }; ?>
        </div>
        <div class="content">
            <input type="email" class="input-text-box input-red-border" name="email" placeholder="xxx@mail.com" required>                
        </div>
        <div class="content">
            <button type="submit" class="button button-ghost button-green"><span class="semibold">Submit</span></button>
            <a href="<?php echo base_url('index.php/login')?>" class="button button-ghost button-green">Kembali</a>
            
        </div> 
            
        </div>
        </form>
        <div class="clear"></div>

        <div class="decoration decoration-margins"></div>
        
        <div class="footer footer-dark">
            <a href="index.html" class="footer-logo scale-hover"></a>
            <p>
                Simplicity and complexity packed into a beautiful, 
                feature filled, powerful, gorgeous mobile template.
            </p>
            <div class="footer-socials">
                <a href="#" class="icon icon-round icon-ghost icon-xs facebook-bg"><i class="ion-social-facebook"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs twitter-bg"><i class="ion-social-twitter"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs google-bg"><i class="ion-social-googleplus"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs phone-bg"><i class="ion-ios-telephone"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs show-share-bottom border-magenta-dark"><i class="ion-android-share"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs back-to-top border-blue-light"><i class="ion-arrow-up-b"></i></a>
            </div>
            <div class="decoration"></div>
            <p class="copyright-text">Copyright <span id="copyright-year"></span>. All Rights Reserved.</p>
        </div>
    </div>  
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

