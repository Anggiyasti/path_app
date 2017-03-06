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
              <div class="collapsible-header"><i class="ion-android-options"></i><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$pel['id_bab'] ?>"><?=$pel['urutan']?></a></div>
              <div class="collapsible-body"></div>
            </li>
             <?php endforeach ?>
          
              <!-- Footer info -->

          </ul>    
               
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->
