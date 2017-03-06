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
          <h4 class="p-20">Hasil Part 1</h4>
          <h4>Contoh Pelajaran <?=$pel?></h4>
          Rumus Nilai total = (jumlah benar / jumlah soal yang dikerjakan) x 100% <br>
          <ul>
          <?php foreach ($tot as $key) : ?>
            <li>Jumlah Benar = <?=$key['benar']?></li> 
            <li>Jumlah Soal = <?=$key['jum_soal']?></li> 
            <li>Score = <?=$key['tot_path']?></li>
            <li>Nilai total = <?=$nilai?> %</li>
          <?php endforeach ?>
          <li>Jumlah bab untuk part 2 = <?=$bab?> bab</li>
          </ul>          
         <!--  <div>
            <ul>
              <li>Rumus jumlah soal untuk part 2 = jumlah soal / jumlah bab</li>
              <li>Contoh : </li>
              <?php foreach ($jum_soal as $key) : ?>
                <li>Jumlah soal : <?=$key['jumlah_soal']?></li>
                <li>Jumlah bab : <?=$bab?> bab</li>
                <li>Jadi <?=$key['jumlah_soal']?> / <?=$bab?> = <?=$t_akhir?></li>
              <?php endforeach ?>
            </ul>
          </div> -->
          <div>
            Jumlah Soal untuk part 2 adalah <?=$jum_soal?> soal
          </div>
          <div>
          <h2>Daftar Soal</h2>
          <?php $i = 1;
                                    $nosoal = 1; ?>
          <ul>
            <?php foreach ($soal as $key) : ?>
              <li><?=$nosoal?>. <?=$key['soal']?> id bab : <?=$key['id_bab']?></li>
              <!-- <li><?=$key['jaw']?></li> -->
            <?php 
            $nosoal++;
            endforeach ?>
          </ul>
          </div>
          </div>

          <div class="page-content">
            <!-- With Left Icon -->
          <h4 class="p-20">Report Part 1</h4>
          <h4>Contoh Pelajaran <?=$pel?></h4>
          
          <ul>
          <?php foreach ($report as $key) : ?>
            <li>Id bab <?=$key['id_bab']?>, score tertingginya = <?=$key['top']?></li>
          <?php endforeach ?>
          
          </ul>          
         <!--  <div>
            <ul>
              <li>Rumus jumlah soal untuk part 2 = jumlah soal / jumlah bab</li>
              <li>Contoh : </li>
              <?php foreach ($jum_soal as $key) : ?>
                <li>Jumlah soal : <?=$key['jumlah_soal']?></li>
                <li>Jumlah bab : <?=$bab?> bab</li>
                <li>Jadi <?=$key['jumlah_soal']?> / <?=$bab?> = <?=$t_akhir?></li>
              <?php endforeach ?>
            </ul>
          </div> -->
         
          
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->
