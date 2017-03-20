<style type="text/css">
  .cc {
    width: 600px;
    padding-top: 1px;
  }
  .dd tr th {
    height: 50px;
  }
</style>    
      <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Report Part 2</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Article Content -->
        <div class="animated fadeinup delay-1">
          <div class="page-content">
          
            <!-- With Left Icon -->
            <div class="blog-preview p-20">

                <?php if ($datline == array()): ?>
                  <h4 class="p-20">Tidak ada Report.</h4>
                <?php else: ?> 
                <table>
                  <thead>
                      <th>TO</th>
                      <th>Jumlah Soal</th>
                      <th>Detail</th>
                  </thead>                     
                  <tbody>
                    <?php foreach ($datline as $key) :?>
                      <tr>
                        <td>TO <?=$key['simulasi']?></td>
                        <td><?=$key['jml_soal']?> </td>
                        <td>Benar : <?=$key['jmlh_benar']?>, Salah : <?=$key['jmlh_salah']?>, Kosong : <?=$key['jmlh_kosong']?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <?php endif ?> 
            </div>
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->