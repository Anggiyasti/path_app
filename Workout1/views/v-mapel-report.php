<div id="page-content" class="page-content header-clear bg bg-cover">
    <div id="page-content-scroll">
        
        <div class="mobileui-lockscreen">
            <div class="mobileui-lockscreen-header animated fadeIn">
                <h3><!--Time--></h3>
                <p></p>
            </div>
            <div class="mobileui-lockscreen-notifications">
                <div class="mobileui-lockscreen-notifications-scroll">
                    <?php foreach ($mapel as $mapelitem): ?>
                        <a href="<?=base_url()?>index.php/workout1/pilih_bab_report/<?=$mapelitem['nama_mapel'] ?>" class="animated fadeIn delay-100">
                        <i class="ion-social-whatsapp-outline bg-green-light"></i>
                        <em><strong><?=$mapelitem['nama_mapel'] ?></strong></em>
                    </a>  
                    <?php endforeach ?>
                    <div class="clear"></div>
                </div>
            </div>
            <a href="#" class="mobileui-lockscreen-home animated fadeIn delay-300"><i class="ion-ios-home-outline"></i></a>
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