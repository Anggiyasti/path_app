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
          <h4 class="p-20">Part <?=$p?></h4>
          <ul class="faq collapsible animated fadeinright delay-3" data-collapsible="accordion">
<!--           <li>
              <div class="collapsible-header"><i class="ion-android-options"></i><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$p?>/1">1</a></div>
              <div class="collapsible-body"></div>
            </li>

            <li>
              <div class="collapsible-header"><i class="ion-android-options"></i><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$p?>/2">2</a></div>
              <div class="collapsible-body"></div>
            </li>

            <li>
              <div class="collapsible-header"><i class="ion-android-options"></i><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$p?>/3">3</a></div>
              <div class="collapsible-body"></div>
            </li>

            <li>
              <div class="collapsible-header"><i class="ion-android-options"></i><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$p?>/4">4</a></div>
              <div class="collapsible-body"></div>
            </li> -->
          <?php 
          foreach ($mapel as $pel) : ?>
            <li>
              <div class="collapsible-header"><i class="ion-android-options"></i><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$pel['id_mapel'] ?>/<?=$pel['part']?>"><?=$pel['part']?></a></div>
              <div class="collapsible-body"></div>
            </li>
             <?php
              endforeach

              ?>
          
              <!-- Footer info -->

          </ul>  

               
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->
