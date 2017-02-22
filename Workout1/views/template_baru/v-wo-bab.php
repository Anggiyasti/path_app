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
        <div class="row">
              <div class="col s12">

            <!-- With Left Icon -->
          <h4  align="center" style="padding-top: 10px; padding-bottom: 10px;">Mata Pelajaran</h4>
          <ul class="faq collapsible animated fadeinright delay-3" data-collapsible="accordion">
          <?php $ke=0; ?>
          <?php $mp; ?>
          <?php foreach ($mapel as $pel) : ?>
            <?php $mp=$pel['nama_mapel']; ?>
            <?php if ($ke==0): ?>
            <!-- Header Info -->
            <li>
              <div class="collapsible-header">
                <i >
                <img src="<?= base_url('./assets/icon/'. $pel['gambar']) ?>" style="margin-top: 7px;"></i>
                <?=$pel['nama_mapel']?>
              </div>
              <div class="collapsible-body"></div>
            <!-- /Header Info -->
            <?php $ke=1; ?>
            <?php elseif($mp!=$olduniversitas): ?>
            <!-- Footer info -->
            </li>
            <!-- Footer Info -->
            <!-- Header Info -->            
            <li>
              <div class="collapsible-header">
              <i >
                <img src="<?= base_url('./assets/icon/'. $pel['gambar']) ?>" style="margin-top: 7px;"></i>
              <?=$pel['nama_mapel']?></div>
               <!-- /Header Info -->
              <?php endif ?>
              <!-- Body Info -->
              <!-- <div class="collapsible-body"><p><?=$pel['judul_bab']?></p></div> -->
              <div class="collapsible-body">
                <h6><a href="<?= base_url() ?>index.php/workout1/next/<?=$pel['id_bab']?>" style="margin-left: 55px;"><?=$pel['judul_bab']?></a></h6>
              </div>
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
