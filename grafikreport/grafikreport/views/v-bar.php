<script src="http://code.jquery.com/jquery-3.1.0.slim.min.js" type="text/javascript"></script>
 <style>

.barfiller {
  width: 100%;
  height: 12px;
  background: #fcfcfc;
  border: 1px solid #ccc;
  position: relative;
  margin-bottom: 20px;
  box-shadow: inset 1px 4px 9px -6px rgba(0,0,0,.5);
  -moz-box-shadow: inset 1px 4px 9px -6px rgba(0,0,0,.5);
}

.barfiller .fill {
  display: block;
  position: relative;
  width: 0px;
  height: 100%;
  background: #333;
  z-index: 1;
}

.barfiller .tipWrap { display: none; }

.barfiller .tip {
  margin-top: -30px;
  padding: 2px 4px;
  font-size: 11px;
  color: #fff;
  left: 0px;
  position: absolute;
  z-index: 2;
  background: #333;
}

.barfiller .tip:after {
  border: solid;
  border-color: rgba(0,0,0,.8) transparent;
  border-width: 6px 6px 0 6px;
  content: "";
  display: block;
  position: absolute;
  left: 9px;
  top: 100%;
  z-index: 9
}

</style>

<!-- <script type="text/javascript">

$(document).ready(function(){

  $('#bar1').barfiller();
  // $('#bar2').barfiller();
  // $('#bar3').barfiller({ barColor: '#fc6' });
  // $('#bar4').barfiller({ barColor: '#900', duration: 3000 });
  
});

</script> -->
<script>

$('#bar1').barfiller();

$('#bar1').barfiller({

  // color of bar
  barColor: '#16b597',

  // shows a tooltip
  tooltip: true,

  // duration in ms
  duration: 1000,

  // re-animate on resize
  animateOnResize: true
  
});

$(document).ready(function(){
  
  $('.skillbar').skillBars({
    from: 0,
    speed: 4000, 
    interval: 100,
    decimals: 0,
  });
  
});

</script>
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


          <h4 class="p-20">Grafik Workout</h4>

          <?php if ($c== array()): ?>
            <h4 align="center">Tidak ada Grafik Workout.</h4>
            <?php else: ?>

            <?php foreach ($bab as $row): ?>
                        <a href="" class="animated fadeIn delay-100">
                        <i></i>
                        <em><strong><h2><?=$row['judul_bab'] ?></h2></strong><div id="bar1" class="barfiller">
                        
  <div class="tipWrap">
  <span class="tip"></span>
  </div>
  <?php foreach ($c as $key) {
    $p = $key['score_grafik'];
  } ?>
  <span class="fill" data-percentage="<?=$p?>"></span>
</div></em>
                    </a>  
                    <?php endforeach ?>
        <!-- End Skill Bar -->
        <?php endif ?>
          </div>
        </div>
      </div>
</div>

  <script src="<?php echo base_url('assets/app/halo/js/jquery-2.1.0.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/jquery.barfiller.js')?>"></script>
    <script src="<?php echo base_url('assets/app/halo/js/jquery.swipebox.min.js')?>"></script>   
    <script src="<?php echo base_url('assets/app/halo/js/jquery.smoothState.min.js')?>"></script> 
    <script src="<?php echo base_url('assets/app/halo/js/materialize.min.js')?>"></script> 
    <script src="<?php echo base_url('assets/app/halo/js/swiper.min.js')?>"></script>  
    <script src="<?php echo base_url('assets/app/halo/js/jquery.mixitup.min.js')?>"></script>
    
    <script src="<?php echo base_url('assets/app/halo/js/masonry.min.js')?>"></script>

    <script src="<?php echo base_url('assets/app/halo/js/functions.js')?>"></script>

   
  </body>
</html>