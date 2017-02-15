      <!-- Page Content -->
      <div id="content" class="page">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Workout</span>
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
          <?php $ke=0; ?>
          <?php $mp; ?>
          <li>
          <?php foreach ($mapel as $pel) : ?>
            <?php $mp=$pel['nama_mapel']; ?>
            <?php if ($ke==0): ?>
            <!-- Header Info -->
            
              <div class="collapsible-header"><i class="ion-android-options"></i><a href="<?=base_url()?>index.php/grafikreport/pilih_bab_report/<?=$pel['nama_mapel'] ?>"><?=$pel['nama_mapel']?></a></div>
              <div class="collapsible-body"></div>
            <!-- /Header Info -->
            <?php $ke=1; ?>
            <?php elseif($mp!=$olduniversitas): ?>
            <!-- Footer info -->
            </li>
            <!-- Footer Info -->
            <!-- Header Info -->            
            <li>
              <div class="collapsible-header"><i class="ion-android-cloud"></i><?=$pel['nama_mapel']?></div>
               <!-- /Header Info -->
              <?php endif ?>
              <!-- Body Info -->
              <div class="collapsible-body"><a href="<?=base_url()?>index.php/grafikreport/pilih_bab_report/<?=$pel['nama_mapel'] ?>"><?=$pel['judul_bab']?></a></div>
              <!-- /Body info -->
              <?php $olduniversitas=$mp; ?>
             <?php endforeach ?>
              <!-- Footer info -->

            </li>
             <!-- Footer Info --> 
          </ul>          
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->
