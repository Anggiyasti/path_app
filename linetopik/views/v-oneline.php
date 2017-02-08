 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <div class="courses1-area">
    <div class="container">    
        <h2 class="title-default-left">Path - Topik</h2> 
    </div>
    <div id="shadow-carousel" class="container">
    <div class="page-content grid-row">
        <div class=" grid-col-row clear-fix" >
            <div class="grid-col grid-col-3 sidebar" >
                          <h2>Nama Topik : <?= $datMateri['namaTopik']; ?></h2>
                          <hr class="divider-big">
                                               <!-- Start Time Line -->

                            <ul class="media-list media-list-feed grid-col grid-col-3" >
                            <?php 
                            $i=0;
                            foreach ($datline as $key ):           
                            ?>
                                <li  class="media">
                                     <div class="media-object pull-left ">
                                        <i href="<?=$key['link'];?>"  class="<?=$key['icon']?> " id="ico-<?=$i;?>"></i>
                                    </div>
                                    <div class="media-body">
                                        <!-- Untuk menampung staus step disable or enable -->
                                        <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>" hidden="true" >
                                        <!-- // Untuk menampung staus step disable or enable  -->
                                        <a href="<?=$key['link'];?>" class="media-heading"  id="font-<?=$i;?>" ><?=$key['namaStep']?></a>

                                        <main>
                    <!-- post item -->
                    <div class="blog-post" id="l" hidden="true">
                        <article>
                        <div class="post-info">
                            <div class="date-post"><div class="day"><?=$tgl?></div><div class="month"><?=$bulan?></div></div>
                            <div class="post-info-main">
                                <div class="author-post">nama Materi:' <?= $datMateri['judulMateri']; ?> '</div>
                            </div>
                            <div class="comments-post">Materi</div>
                        </div>
                         <p><?= $datMateri['isiMateri']; ?></p>
                            
                        </article>
                       
                    </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                  

                </main>
                                      <!--   <p class="media-text"><span class="text-primary semibold">Service Page</span> has been edited by Tamara Moon.</p>
                                        <p class="media-meta">Just Now</p> -->
                                    </div>
                                </li>       
                            <?php 
                            $i ++;
                            endforeach ?>
                            </ul>
                            <!-- menampung nilai panjang array -->
                            <input id="n" type="text"  value="<?=$i;?>" hidden="true">
                            <!-- END Tieme line -->
                
            </div>
            <div class="grid-col grid-col-9">
                <main>
                    <!-- post item -->
                    <div class="blog-post">
                        <article>
                        <div class="post-info">
                            <div class="date-post"><div class="day"><?=$tgl?></div><div class="month"><?=$bulan?></div></div>
                            <div class="post-info-main">
                                <div class="author-post">nama Materi:' <?= $datMateri['judulMateri']; ?> '</div>
                            </div>
                            <div class="comments-post">Materi</div>
                        </div>
                         <p><?= $datMateri['isiMateri']; ?></p>
                            
                        </article>
                       
                    </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                  

                </main>
            </div>

        </div>
    </div>
    <!-- / content -->
</div>
</div>
    <!-- END Page Content -->
<script type="text/javascript">
    $(document).ready(function() { 
        var n = $("#n").val();
        // console.log(n);
        // $("#ico-0").css("background","#00082E");
        for (i = 0; i < n; i++) {
        var status = $("#status-"+i).val();
        
            if (status=="disable") {
                 $("#ico-"+i).css("background","#00082E");
                 $("#font-"+i).css("color","#00082E");
            } 
           
        }
    });

    $(document).ready(function () {
        var status = $("#status-"+i).val();
        $("#status").click(function () {
            $("#l").show();
        });

</script>