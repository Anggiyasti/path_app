     <div id="content">

        <!-- Toolbar -->
        <div id="toolbar" class="halo-nav box-shad-none">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Halo</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Main Content -->
        <div class="animated fadeinup fullscreen">
          
          <!-- Slider -->         
          <div class="swiper-container slider slider-fullscreen">
            <div class="swiper-wrapper">
              <div class="swiper-slide ">
              <?php foreach ($data as $d ) :?>
              <img src="<?= base_url('./assets/app/halo/img/'. $d['gambar']) ?>">
             <?php endforeach ?>
                <div class="opacity-overlay-black"></div>
                <div class="bottom-abs left-align">
                  <h4 class="slider-title uppercase white-text">while the lovely valley teems</h4>
                  <p class="slider-text small white-text">I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms.</p>
                  <a class="waves-effect waves-light btn-large primary-color block animated bouncein delay-4" href="article.html">Read More</a> 
                </div>
              </div>

              <div class="swiper-slide ">
               <?php foreach ($dataa as $d ) :?>
              <img src="<?= base_url('./assets/app/halo/img/'. $d['gambar']) ?>">
             <?php endforeach ?>
                <div class="opacity-overlay-black"></div>
                <div class="bottom-abs center-align">
                  <h4 class="slider-title uppercase white-text">while the lovely valley teems</h4>
                  <p class="slider-text small white-text">I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms.</p>
                  <a class="waves-effect waves-light btn-large primary-color block animated bouncein delay-4" href="article.html">Read More</a> 
                </div>
              </div>

              <div class="swiper-slide">
              <?php foreach ($dataaa as $d ) :?>
              <img src="<?= base_url('./assets/app/halo/img/'. $d['gambar']) ?>">
             <?php endforeach ?>
                <div class="opacity-overlay-black"></div>
                <div class="bottom-abs right-align">
                  <h4 class="slider-title uppercase white-text">while the lovely valley teems</h4>
                  <p class="slider-text small white-text">I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms.</p>
                  <a class="waves-effect waves-light btn-large primary-color block animated bouncein delay-4" href="article.html">Read More</a> 
                </div>
              </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination white-bullet"></div>
          <!-- End of Slider -->
          </div>
        </div> <!-- End of Main Contents -->
      
       
      </div> <!-- End of Page Content -->