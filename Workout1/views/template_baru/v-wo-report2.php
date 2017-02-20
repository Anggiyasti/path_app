      <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Report Workout</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Article Content -->
        <div class="animated fadeinup delay-1">
          <div class="page-content">
            <!-- With Left Icon -->
            <div class="blog-preview p-20">
            <?php foreach ($bab as $reportitem): ?>
                <h4 class="uppercase">Mapel&nbsp&nbsp&nbsp: <?= $reportitem['nama_mapel'] ?></h4>
                <h4 class="uppercase">Bab&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp: <?= $reportitem['judul_bab'] ?></h4>
            <?php endforeach ?>
            </div>
            <div class="blog-preview p-20">
                <?php if ($report == array()): ?>
                  <h4 class="p-20">Tidak ada Report Latihan.</h4>
                <?php else: ?> 
                <?php foreach ($report as $reportitem): ?>
                  <div class="media-body">
                    <ul class="course-feature">
                        <li>Time&nbsp&nbsp&nbsp:&nbsp<?= $reportitem['tgl_pengerjaan'] ?></li>
                        <?php if ($reportitem['kesulitan'] == '1') { ?>
                            <li>Level&nbsp&nbsp&nbsp:&nbspMudah</li>
                        <?php } elseif ($reportitem['kesulitan'] == '2') { ?>
                            <li>Level : Sedang</li>
                        <?php } else { ?>
                            <li>Level : Sulit</li>
                        <?php } ?>
                        <li>Score : <?= $reportitem['score'] ?></li>
                        <li> <a href="<?=base_url()?>index.php/workout1/detailreport/<?=$reportitem['id_latihan'] ?>" class="waves-effect waves-light btn primary-color"><i class="glyphicon glyphicon-list-alt"></i>Detail</a> <a href="<?=base_url()?>index.php/workout1/create_session_id_pembahasan/<?=$reportitem['id_latihan'] ?>" class="waves-effect waves-light btn primary-color">Pembahasan</a></li>
                    </ul>
                </div>
                <div class="section-divider"></div>
                <?php endforeach ?>
                <?php endif ?> 
            </div>
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->