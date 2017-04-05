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
          <?php echo $this->session->flashdata('msg'); ?>
          <?php if ($sp == '0') : ?>
            <h1 class="title black-text" align="center">COMING SOON!!!</h1>
          <?php else : ?>
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
                      <span class="date"><a href="<?=base_url()?>index.php/linetopik/reportpart1/<?=$pel['id_mapel']?>">Report 1</a></span>
                      <div class="dot z-depth-1" style="border-color: green">
                      </div>
        
                    </div>

                     <div class="contact">
                      <span class="date"><a href="<?=base_url()?>index.php/linetopik/part2/<?=$pel['id_mapel']?>">Part 2</a></span>
                      <div class="dot z-depth-1">
                      </div>
                      
                    </div>

                    <div class="contact">
                      <span class="date"><a href="<?=base_url()?>index.php/linetopik/report_part2/<?=$pel['id_mapel'] ?>">Report 2</a></span>
                      <div class="dot z-depth-1" style="border-color: green">
                      </div>
                      
                    </div>

                    <div class="contact">
                      <span class="date"><a href="<?=base_url()?>index.php/linetopik/hitung_log_part2">Cek Part 2</a></span>
                      <div class="dot z-depth-1" style="border-color: green">
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
                    $nm_try=''; ?>
                    <?php foreach ($to as $key ): ?>
                                    
                      <?php if ($nm_try != $key['nm_try'] && $i==0): ?>
                    <div class="contact">
                      <span class="date"><a href="<?=base_url()?>/linetopik/part3/<?=$key['id_try'] ?>" id="font-<?=$i;?>"><?=$key['nm_try']?></a></span>
                      <span > <a style="margin-left: 80px;" class="waves-effect waves-light btn primary-color " href="<?=base_url()?>index.php/linetopik/report_tryout/<?=$key['id_try'] ?>" id="font-<?=$i;?>">Report</a></span>


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
            <?php endif; ?>  


            <h4 class="p-20">Part 4</h4>
              <ul class="faq collapsible animated fadeinright delay-3" data-collapsible="accordion">
             
                <li>
                  <div class="collapsible-header"><i class="ion-android-options"></i>Part 4</div>
                  <div class="collapsible-body">
                  <div id="test1">
                  <div class="container activity p-l-r-20">
                <div class="row m-l-0">
                  <div class="col">
                   <?php   $i=0; 
                    $nm_try=''; ?>
                    <?php foreach ($to as $key ): ?>
                                    
                      <?php if ($nm_try != $key['nm_try'] && $i==0): ?>
                    <div class="contact">
                      <span class="date"><a href="<?=base_url()?>/linetopik/part3/<?=$key['id_try'] ?>" id="font-<?=$i;?>"><?=$key['nm_try']?></a></span>
                      <span > <a style="margin-left: 80px;" class="waves-effect waves-light btn primary-color " href="<?=base_url()?>index.php/linetopik/report_tryout/<?=$key['id_try'] ?>" id="font-<?=$i;?>">Report</a></span>


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
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->


