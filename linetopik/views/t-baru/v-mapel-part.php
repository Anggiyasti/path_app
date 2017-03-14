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
        
        <!-- Article Content -->
        <div class="animated fadeinup delay-1">
          <div class="page-content">
            <!-- With Left Icon -->
          <h4 class="p-20">Mata Pelajaran</h4>
          <ul class="faq collapsible animated fadeinright delay-3" data-collapsible="accordion">
          <?php foreach ($mapel as $pel) : ?>
            <li>
              <div class="collapsible-header"><i class="ion-android-options"></i><?=$pel['nama_mapel']?></div>
              <div class="collapsible-body">
                   <div id="test1">
              <div class="container activity p-l-r-20">
            <div class="row m-l-0">
              <div class="col">
               
                <div class="contact">
                  <span class="date"><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$pel['id_mapel'] ?>/1">Part 1</a></span>
                  <div class="dot z-depth-1">
                  </div>
    
                </div>

                 <div class="contact">
                  <span class="date"><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$pel['id_mapel'] ?>/2">Part 2</a></span>
                  <div class="dot z-depth-1">
                  </div>
                  
                </div>

              </div>
            </div>
          </div>
        </div>
              </div>
            </li>
             <?php endforeach ?>
              <!-- Footer info -->

          </ul> 
          <h4 class="p-20">Part 3</h4>
          <ul class="faq collapsible animated fadeinright delay-3" data-collapsible="accordion">
         
            <li>
              <div class="collapsible-header"><i class="ion-android-options"></i>Part 3</div>
              <div class="collapsible-body">
              <div id="test1">
              <div class="container activity p-l-r-20">
            <div class="row m-l-0">
              <div class="col">
               <?php   $i=0; 
                $nm_tryout=''; ?>
                <?php foreach ($to as $key ): ?>
                                
                  <?php if ($nm_tryout != $key['nm_tryout'] && $i==0): ?>
                <div class="contact">
                  <span class="date"><a href="<?=base_url()?>index.php/linetopik/daftar_paket/<?=$key['id_tryout'] ?>" id="font-<?=$i;?>"><?=$key['nm_tryout']?></a></span>
                  <span > <a style="margin-left: 80px;" class="waves-effect waves-light btn primary-color " href="<?=base_url()?>index.php/linetopik/report_tryout/<?=$key['id_tryout'] ?>" id="font-<?=$i;?>">Report</a></span>


                  <div class="dot z-depth-1">
                  </div>
    
                </div>
                <?php endif ?>
                                    
  <?php endforeach ?>

                 
              </div>
            </div>
          </div>
        </div>
              </div>
                   
              </div>
            </li>
            

          </ul>                  
      
