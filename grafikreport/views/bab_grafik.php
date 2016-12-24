<div id="page-content" class="page-content header-clear bg bg-cover">
    <div id="page-content-scroll">
        
        <div class="mobileui-lockscreen">
            <div class="mobileui-lockscreen-header animated fadeIn">
                <h1><?=$mapel ?></h1>
            </div>
            <div class="mobileui-lockscreen-notifications">
                <div class="mobileui-lockscreen-notifications-scroll">
                    <?php foreach ($bab as $row): ?>
                        <a href="<?=base_url()?>index.php/grafikreport/greport/<?=$row['id_bab'] ?>" class="animated fadeIn delay-100">
                        <i class="ion-social-whatsapp-outline bg-green-light"></i>
                        <em><strong><?=$row['judul_bab'] ?></strong></em>
                    </a>  
                    <?php endforeach ?>
                    <div class="clear"></div>
                </div>
            </div>
            <a href="#" class="mobileui-lockscreen-home animated fadeIn delay-300"><i class="ion-ios-home-outline"></i></a>
        </div>
        
    </div>  
</div>
    

 
    
</div>
</body>