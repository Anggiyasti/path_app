      <!-- Page Content -->
      <div id="content" class="page">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Path</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        
        <!-- Activity Content -->
        <div class="animated fadeinup delay-1">
          
          <div class="p-t-20">
          <ul class="tabs">
            <li class="tab"><a class="active" href="#test1">Season</a></li>
            
          </ul>
          </div>
            
            <div id="test1">
              <div class="container activity p-l-r-20">
            <div class="row m-l-0">
              <div class="col">
              <?php   $i=0; 
                $namaTopik=''; ?>
                <?php foreach ($datline as $key ): ?>
                                
                  <?php if ($namaTopik != $key['namaTopik'] && $i==0): ?>
                    <!-- start header line-->
                    <!-- post item -->
                    <div class="contact">
                      <img alt="" src="<?php echo base_url('assets/app/halo/img/user.jpg')?>">
                      <div class="dot z-depth-1">
                      </div>
                      <p>
                        <a  href="<?=$key['link'];?>" id="font-<?=$i;?>" >Season <?=$key['namaTopik']?></a>
                      </p>
                      <span>
                        Nama Topik:' <?=$key['namaTopik']?> ' <br>
                        Deskripsi:' <?=$key['deskripsi']?> '
                      </span>
                      <!-- Start Time Line -->
                      <!-- <h4>Time Line</h4> -->
                        <ul class="media-list media-list-feed " >
                        <!-- end header line-->
                          <?php elseif($namaTopik != $key['namaTopik']) : ?>
                          <!-- END body line -->
                        </ul>
                        <!-- END Tieme line -->
                    </div>
                     <!-- / post item -->
                    
                    <!-- END body line -->
                    <!-- start header line-->
                    <!-- post item -->
                    <div class="contact">
                      <span class="date">6 - 7 pm</span>
                      <div class="dot z-depth-1">
                      </div>
                      <p>
                        <a  href="<?=$key['link'];?>" class="media-heading" id="font-<?=$i;?>" >Season <?=$key['namaTopik']?></a>
                      </p>
                      <span>
                        Nama Topik:' <?=$key['namaTopik']?> ' <br>
                        Deskripsi:' <?=$key['deskripsi']?> '
                        <!-- Start Time Line -->
                        <!-- <h4>Time Line</h4> -->
                      </span>

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
                          </div>
                          </div>
                        <!-- / post item -->
                            <?php else: ?>
                              <div class="contact">
                                <h2>
                                      <div class="number">U<span>P</span>S</div>
                                        <p><span>Maaf:(</span><br>Season Belum Tersedia.</p>
                                      </div></h2>
                              </div>
                               <!--  <div class="container-404">
                                  <div class="timeline-item">
                                    <div class="timeline-icon"> <img src="<?php echo base_url('assets/timeline/dev/images/book.svg')?>" alt=""> </div>
                                    <div class="timeline-content">
                                      <h2>
                                      <div class="number">U<span>P</span>S</div>
                                        <p><span>Maaf:(</span><br>Step Line Belum Tersedia.</p>
                                      </div></h2>
                                  </div> -->
                            <?php endif ?>
                    </div>
              
               
              </div>
            </div>
          </div>
        </div>
      
      
         
      </div> <!-- End of Page Content -->
