 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
                
        <div class="content">
            <h2><a href="<?=base_url('index.php/linetopik/learningline/').$UUID?>"><?= $datMateri['namaTopik']; ?></a></h2>
            <input type="text" value="" id="tes" hidden="true" />
        </div>
        <div class="page-timeline-2 content">
        <?php 
                            $i=0;
                            foreach ($datline as $key ):           
                            ?>
            <div class="timeline-deco"></div>
            <div class="timeline-block">
                <div class="timeline-icon">
                    <i href="<?=$key['link'];?>" class="<?=$key['icon']?> id="ico-<?=$i;?>"></i>
<!--                     <i href="<?=$key['link'];?>"  class="<?=$key['icon']?> " id="ico-<?=$i;?>"></i>
 -->                </div>
                <div class="timeline-content">
                <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>" hidden="true">
                    <h1 class="timeline-heading"><a href="<?=$key['link'];?>" class="media-heading"  id="font-<?=$i;?>" ><?=$key['namaStep']?></a></h1>
                    
                </div>
            </div>  
            
            <?php 
            $i ++;
            endforeach ?> 
            <div class="timeline-content"> 
                <!-- menampung nilai panjang array -->
                <input id="n" type="text"  value="<?=$i;?>" hidden="true">
                <div class="date-post"><div class="day"><?=$tgl?></div><div class="month"><?=$bulan?></div></div>
                nama Materi:' <?= $datMateri['judulMateri']; ?> ' <br>
                Isi Materi : <p><?= $datMateri['isiMateri']; ?></p>
                <div class="tags-post">
                    <a href="#" rel="tag"><?=$bab;?></a>
                    <a href="#" rel="tag">Topik : <?=$topik;?> </a>
                </div>
            </div>
                        
        </div>
                    
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

    // Strat  event untuk pilihan jenis input  
        $(document).ready(function () {
            $("#tes").hide();
            $("#n").hide();
            $("#status-"+i).hide();
        });

</script>
</body>