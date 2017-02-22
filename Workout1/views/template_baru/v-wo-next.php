

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
              <div class="activities">
              <div class="activity animated fadeinright delay-1">
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
        </div>
        </div>
      
      </div> <!-- End of Page Content -->
