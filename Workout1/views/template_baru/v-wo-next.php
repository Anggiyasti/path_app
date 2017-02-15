<div class="m-scene" id="main"> <!-- Main Container -->
      
      <!-- Left Sidebar -->
      <ul id="slide-out-left" class="side-nav collapsible">
        <li>
          <div class="sidenav-header primary-color">
            
            <div class="nav-avatar">
           <!--  <?php foreach ($siswa as $s): ?> -->
              <img class="circle avatar" src="" alt="">
              <div class="avatar-body">
                <!-- <h3>Halo <?=$this->session->userdata['username'];?></h3>
                <p><?=$s->jurusan?> <?=$s->univ ?></p> -->

              </div>
              <!-- <?php endforeach ?> -->   
            </div>
          </div>
        </li>
        <li><a href="<?php echo base_url('index.php')?>" class="no-child"><i class="ion-android-home"></i> Home</a></li>
        <li><a href="<?php echo base_url('index.php/Siswa/Profilesiswa')?>" class="no-child"><i class="ion-android-person"></i> Profile Setting</a></li>

        <li>
          <div class="collapsible-header">
            <i class="ion-android-list"></i>Workout 
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="<?= base_url('index.php/workout1') ?>">Workout</a>
                <a href="<?= base_url('index.php/workout1/pilihreport') ?>">Report</a>
                <a href="<?= base_url('index.php/grafikreport') ?>">Grafik Report</a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
            <i class="ion-android-document"></i> Passing Grade 
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="<?= base_url('index.php/passinggrade/univ') ?>">Universitas</a>   
                <a href="<?= base_url('index.php/passinggrade/pilih_prodi') ?>">Prodi</a> 
                <a href="<?= base_url('index.php/passinggrade/passing') ?>">Passing Grade</a>
              </li>
            </ul>
          </div>  
        </li>
        
        <li><a href="<?= base_url('index.php/linetopik') ?>" class="no-child"><i class="ion-social-rss"></i> Path </a></li>
        <li><a href="<?php echo base_url('index.php/Login/logout_siswa')?>" class="no-child"><i class="ion-android-exit"></i> Logout</a></li>
        
      </ul>
      <!-- End of Sidebars -->

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
          <!-- <h4 class="p-20">Workout</h4> -->
          <form action="<?= base_url() ?>index.php/workout1/start" method="post">
            <input type="text" name="id_bab" value="<?=$bab ?>" hidden="true">
            <div>
                <h3 class="item-title">Tingkat Kesulitan</h3>
            </div>
            <div>
                <div class="baru">
                    <input type="radio" id="1-option" name="kesulitan" value="1" checked>
                    <label for="1-option">Mudah</label>
                </div>

                <div class="baru">        
                    <input type="radio" id="2-option" name="kesulitan" value="2">
                    <label for="2-option">Sedang</label>
                </div>

                <div class="baru">
                    <input type="radio" id="3-option" name="kesulitan" value="3"s>
                    <label for="3-option">Sulit</label>
                </div>

                <div>
                    <h3 class="item-title">Jumlah Soal</h3>
                </div>

                <div class="baru">
                    <input type="radio" name="jumlahsoal" value="5" id="radio12344" checked="">
                    <label for="radio12344">5</label>
                </div>
                <div class="baru">
                    <input type="radio" name="jumlahsoal" value="10" id="radio12345">
                    <label for="radio12345">10</label>
                </div>
                <div class="baru">
                    <input type="radio" name="jumlahsoal" value="15" id="radio12346">
                    <label for="radio12346">15</label>
                </div>
                <br>
                <button type="submit" class="waves-effect waves-light btn-large primary-color width-100">GO</button>
                                        
            </div>
          </form>
          </div>
        </div> 
      
         <div id="canvas"></div>

      </div> <!-- End of Page Content -->
      </div>