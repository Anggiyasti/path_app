<div id="page-content" class="page-content header-clear bg bg-cover">
    <div id="page-content-scroll">
        
        <div class="mobileui-lockscreen">
            <div class="mobileui-lockscreen-notifications">
                <div class="mobileui-lockscreen-notifications-scroll">
                    <?php foreach ($mapel as $mapelitem): ?>
                        <a href="<?=base_url()?>index.php/linetopik/pilih_bab_report/<?=$mapelitem['nama_mapel'] ?>" class="animated fadeIn delay-100">
                        <i class="ion-social-whatsapp-outline bg-green-light"></i>
                        <em><strong><?=$mapelitem['nama_mapel'] ?></strong></em>
                    </a>  
                    <?php endforeach ?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        
    </div>  
</div>
</body>