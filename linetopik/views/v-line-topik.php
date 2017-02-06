 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
        <div class="content"> 
            <?php if ($datline!='' || $datline!=''): ?>
                     <!-- widget Topik -->
                
                    <h2>Topik</h2>
                    <hr class="divider-big" />
                    <ul>
                   
                      <?php   $x=0; ?>
                    <?php foreach ($topik as $rows): ?>
                        <li class="cat-item cat-item-1 current-cat"><a href="#topik<?=$x?>"><?=$rows['namaTopik']?><span></span></a>
                        <?php $x++; ?>
                    <?php endforeach ?>
                    </ul>
                  
              
                <!--/ widget Topik -->
                <?php endif ?>
        
        </div>
        <?php   $i=0; 
        $namaTopik=''; ?>
        <div class="page-timeline-1 content">
        <?php foreach ($datline as $key ): ?>
            <?php if ($namaTopik != $key['namaTopik'] && $i==0): ?>
            <h1 align="center">Nama Topik:' <?=$key['namaTopik']?> '</h1>
            <h2 align="center">Deskripsi:' <?=$key['deskripsi']?> '</h2>
            <h3>Timeline</h3>
            <div class="timeline-deco"></div>
            <div class="timeline-block-left">
                <i class="ion-edit"></i>
            </div>
            <div class="timeline-block-right">
                <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>" hidden="true">
                <h1 class="timeline-heading"></h1>
                <h3 class="timeline-subheading"></h3>
                <h2 class="timeline-subheading"></h2>
                <a href="<?=$key['link'];?>"><?=$key['namaStep']?></a>
                <p>
                    This is a simple timeline text post. You can add any
                    variation from the ones you'll see below.
                </p>
            </div>
            <?php elseif($namaTopik != $key['namaTopik']) : ?>
                <div class="tags-post">
                    <a href="#" rel="tag"><?=$key['mapel']?></a>
                    <a href="#" rel="tag"><?=$key['bab']?></a>
                </div>
                <a  href="<?=$key['link'];?>" class="media-heading" id="font-<?=$i;?>" ><?=$key['namaStep']?></a>
            <?php endif ?>
            <?php $i++;  ?>
            <?php  $namaTopik=$key['namaTopik'];  ?>
        <?php endforeach ?>      
        </div>
         <?php if ($datline!= array()): ?>
                        </article>
                        <div class="tags-post">
                                <a href="#" rel="tag"><?=$key['bab']?></a>
                          </div>
                          </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                            <?php else: ?>
                                <div class="container-404">
                                <div class="number">U<span>P</span>S</div>
                                    <p><span>Maaf:(</span><br>Step Line Belum Tersedia.</p>
                                   
                                </div>
                            <?php endif ?>
                    
        <div class="decoration decoration-margins"></div>
        <div class="decoration decoration-margins"></div>
        
    </div>  
</div>
 
    
</div>

<script type="text/javascript">
    $(document).ready(function() { 
        var n = $("#n").val();
        // console.log(n);
        // $("#ico-0").css("background","black");
        for (i = 0; i < n; i++) {
        var status = $("#status-"+i).val();
        
            if (status=="disable") {
                 $("#ico-"+i).css("background","#b0b0b0");
                 $("#font-"+i).css("color","#b0b0b0");
            } 
           
        }
    });
</script>
</body>