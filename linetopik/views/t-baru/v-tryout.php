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
            <li class="tab"><a class="active" href="#test1">TRYOUT</a></li>
            
          </ul>
          </div>
            
            <div id="test1">
              <div class="container activity p-l-r-20">
            <div class="row m-l-0">
              <div class="col">
              <?php   $i=0; 
                $nm_tryout=''; ?>
                <?php foreach ($to as $key ): ?>
                                
                  <?php if ($nm_tryout != $key['nm_tryout'] && $i==0): ?>
                    <!-- start header line-->
                    <!-- post item -->
                    <div class="contact">
                      <img alt="" src="<?php echo base_url('assets/app/halo/img/user.jpg')?>">
                      <div class="dot z-depth-1">
                      </div>
                      <p>
                        <a  href="<?=base_url()?>index.php/linetopik/daftar_paket/<?=$key['id_tryout'] ?>" id="font-<?=$i;?>" ><?=$key['nm_tryout']?></a>
                      </p>
                      
                   
                        
                    </div>
                     <!-- / post item -->
                      <?php endif ?>

                    
                                
  <?php endforeach ?>
                                
                        
                            
                        
                          </div>
                          </div>
                        <!-- / post item -->
                     
               
              </div>
            </div>
          </div>
        </div>
      
      
         
      </div> <!-- End of Page Content -->
