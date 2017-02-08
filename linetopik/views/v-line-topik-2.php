
<!-- Courses 1 Area Start Here -->
            <div class="courses1-area">
                <div class="container">    
                    <h2 class="title-default-left">Path - Topik</h2> 
                </div>
                <div id="shadow-carousel" class="container"> 
                        <div id="timeline">
                        
                        <main> <?php   $i=0; 
                                    $namaTopik=''; ?>
                            <?php foreach ($datline as $key ): ?>
                                
                                <?php if ($namaTopik != $key['namaTopik'] && $i==0): ?>

                    <!-- start header line-->
                    <!-- post item -->
                    <div class="timeline-item">
                        <div class="timeline-icon"> <img src="<?php echo base_url('assets/timeline/dev/images/star.svg')?>" alt=""> </div>
                        <div class="timeline-content">

                        <h2><a  href="<?=$key['link'];?>" class="media-heading" id="font-<?=$i;?>" ><?=$key['namaTopik']?></a></h2>
                        <h3>Nama Topik:' <?=$key['namaTopik']?> '</h3>
                        <h3>Deskripsi:' <?=$key['deskripsi']?> '</h3>
                        <a href="<?=$key['link'];?>" class="btn">STEP 1</a>
                         <!-- Start Time Line -->
                         <!-- <h4>Time Line</h4> -->
                            <ul class="media-list media-list-feed " >
                            <!-- end header line-->
                                <?php elseif($namaTopik != $key['namaTopik']) : ?>
                            <!-- END body line -->
                            </ul>
                            <!-- END Tieme line -->
                        
                        </div>
                    </div>
                    <!-- / post item -->
                    <!-- END body line -->
                    <!-- start header line-->
                    <!-- post item -->
                    <div class="timeline-item">
                    <div class="timeline-icon"> <img src="<?php echo base_url('assets/timeline/dev/images/star.svg')?>" alt=""> </div>
                    <div class="timeline-item" id="topik1">
                        <!-- <article> -->
                        <div class="timeline-content">
                            
                            <h2><a  href="<?=$key['link'];?>" class="media-heading" id="font-<?=$i;?>" ><?=$key['namaTopik']?></a></h2>
                            <h3>Nama Topik:' <?=$key['namaTopik']?> '</h3>
                            <h3>Deskripsi:' <?=$key['deskripsi']?> '</h3>
                            <a href="<?=$key['link'];?>" class="btn">STEP 1</a>
                            <!-- Start Time Line -->
                            <!-- <h4>Time Line</h4> -->
                            <hr>
                                <ul class="media-list media-list-feed " >
                                <!-- end header line-->
                                <?php endif ?>
                                <li for class="media">
                                     <div class="media-object pull-left " >
                                        <i  class="<?=$key['icon']?> " id="ico-<?=$i;?>"></i>
                                    </div>
                                    <div class="media-body">
                                    <!-- Untuk menampung staus step disable or enable -->
                                     <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>" hidden="true">
                                     <!-- // Untuk menampung staus step disable or enable  -->
                                        <!-- <a  href="<?=$key['link'];?>" class="media-heading" id="font-<?=$i;?>" ><?=$key['namaStep']?></a> -->
                                
                                    </div>
                             
                                </li> 

                                <!-- </a>       -->
                                 <?php $i++;  ?>
                                <?php  $namaTopik=$key['namaTopik'];  ?>
                                

                                
                            <?php endforeach ?>
                            
                            </ul>

                            <!-- END Tieme line -->
                        <!-- menampung nilai panjang array -->
                      <input id="n" type="text"  value="<?=$i;?>" hidden="true">
                            <?php if ($datline!= array()): ?>
                        <!-- </article> -->
                        <div class="tags-post">
                                <a href="#" rel="tag"><?=$key['bab']?></a>
                          </div>
                          </div>
                          </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                            <?php else: ?>

                                <div class="container-404">
                                  <div class="timeline-item">
                                    <div class="timeline-icon"> <img src="<?php echo base_url('assets/timeline/dev/images/book.svg')?>" alt=""> </div>
                                    <div class="timeline-content">
                                      <h2>
                                      <div class="number">U<span>P</span>S</div>
                                        <p><span>Maaf:(</span><br>Step Line Belum Tersedia.</p>
                                      </div></h2>
                                  </div>
                            <?php endif ?>

                            







                          <div class="timeline-item">
                            <div class="timeline-icon"> <img src="<?php echo base_url('assets/timeline/dev/images/book.svg')?>" alt=""> </div>
                            <div class="timeline-content right">
                              <h2>LOREM IPSUM DOLOR</h2>
                              <div class="grid-col grid-col-9">
                <main> <?php   $i=0; 
                                    $namaTopik=''; ?>
                            <?php foreach ($datline as $key ): ?>
                                
                                <?php if ($namaTopik != $key['namaTopik'] && $i==0): ?>
                <!-- start header line-->
                    <!-- post item -->
                    <div class="blog-post">
                        <article>
                        <div class="post-info">
                            
                            <div class="post-info-main">
                                <div class="author-post" >nama Topik:' <?=$key['namaTopik']?> '</div>
                            </div>
                            <div class="comments-post"><i class="fa fa-comment"></i>Line</div>
                        </div>
                         <h3>Deskripsi:' <?=$key['deskripsi']?> '</h3>
                         <!-- Start Time Line -->
                         <h4>Time Line</h4>
                            <ul class="media-list media-list-feed " >
                <!-- end header line-->
                                <?php elseif($namaTopik != $key['namaTopik']) : ?>
                <!-- END body line -->
                            </ul>
                            <!-- END Tieme line -->
                        </article>
                        
                    </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                <!-- END body line -->
                <!-- start header line-->
                    <!-- post item -->
                    <div class="blog-post" id="topik1">
                        <article>
                        <div class="post-info">
                            
                            <div class="post-info-main">
                                <div class="author-post" >nama Topik:' <?=$key['namaTopik']?> '</div>
                            </div>
                            <div class="comments-post"><i class="fa fa-comment"></i>Line</div>
                        </div>
                         <h3>Deskripsi:' <?=$key['deskripsi']?> '</h3>
                         <!-- Start Time Line -->
                         <h4>Time Line</h4>
                         <hr>
                            <ul class="media-list media-list-feed " >
                <!-- end header line-->
                                <?php endif ?>
                                <li for class="media">
                                     <div class="media-object pull-left " >
                                        <i  class="<?=$key['icon']?> " id="ico-<?=$i;?>"></i>
                                    </div>
                                    <div class="media-body">
                                    <!-- Untuk menampung staus step disable or enable -->
                                     <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>" hidden="true">
                                     <!-- // Untuk menampung staus step disable or enable  -->
                                        <a  href="<?=$key['link'];?>" class="media-heading" id="font-<?=$i;?>" ><?=$key['namaStep']?></a>
                                
                                    </div>
                             
                                    <hr>
                                </li> 
                                <!-- </a>       -->
                                 <?php $i++;  ?>
                                <?php  $namaTopik=$key['namaTopik'];  ?>
                                

                                
                            <?php endforeach ?>
                            
                            </ul>
                            <!-- END Tieme line -->
                        <!-- menampung nilai panjang array -->
                      <input id="n" type="text"  value="<?=$i;?>" hidden="true">
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
                </main>
            </div>
          
                              <a href="#" class="btn">button</a> </div>
                          </div>
                        </div>
                                           
                </div>  
            </div>  
            <!-- Courses 1 Area End Here -->
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