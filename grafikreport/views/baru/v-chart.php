<script src="http://code.jquery.com/jquery-3.1.0.slim.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/style.css')?>">
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
        
        



<div class="row">
              <div class="col s12">
        <h4 class="uppercase" align="center"><?=$mapel ?> </h4>
        <h6 class="uppercase" align="center">Rata-rata <?=$total?> %</h6>
       <!--  <div class="sidebar-course-reviews"> -->
            <div class="skill-area">
                
                <?php if ($c== array()): ?>
          <h4 align="center">Tidak ada Grafik Workout.</h4>
        <?php else: ?>
   
          <?php foreach ($c as $key) : 
          $p = $key['score_grafik'];
          

          if ($p == 0) { ?>
                <div class="progress" style="height: 30px; background-color: #f5f5f5 ;">
                    <div class="lead"><?=$key['judul_bab'];?></div>
                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%;  visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft; height: 30px; background-color: #f5f5f5 ;" data-progress="0" class="progress-bar wow fadeInLeft animated"></div><span>0%</span>
                </div>
                
        <?php } else {?>
            <div class="progress" style="height: 30px; background-color: #f5f5f5 ;">
            <div class="lead"><?=$key['judul_bab'];?></div>
            <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft; height: 30px; background-color: #19305B;" data-progress="<?=$p?>" class="progress-bar wow fadeInLeft animated"></div><span><?=$p?>%</span> 
            </div>
                <?php } ?>
        <!-- End Skill Bar -->
        <?php endforeach ?>
   
    <!-- End Skill Bar -->
    <?php endif ?>
                                                
    </div>
<!-- </div> -->
</div>
</div>

  <script src="<?php echo base_url('assets/app/halo/js/jquery-2.1.0.min.js')?>"></script>
   <script src="<?php echo base_url('assets/plugins/jquery.barfiller.js')?>"></script>
    <script src="<?php echo base_url('assets/app/halo/js/jquery.swipebox.min.js')?>"></script>   
    <script src="<?php echo base_url('assets/app/halo/js/jquery.smoothState.min.js')?>"></script> 
    <script src="<?php echo base_url('assets/app/halo/js/materialize.min.js')?>"></script> 
    <script src="<?php echo base_url('assets/app/halo/js/swiper.min.js')?>"></script>  
    <script src="<?php echo base_url('assets/app/halo/js/jquery.mixitup.min.js')?>"></script>
    
    <script src="<?php echo base_url('assets/app/halo/js/masonry.min.js')?>"></script>

    <script src="<?php echo base_url('assets/app/halo/js/functions.js')?>"></script>

   
  </body>
</html>