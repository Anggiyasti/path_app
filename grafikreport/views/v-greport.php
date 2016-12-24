<script src="<?= base_url('assets/js/jquery-3.1.0.slim.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/jquery.barfiller.js')?>"></script>
<style type="text/css">
    .barfiller {
  background-color:#cacaca;
    height:25px;
    border-radius:40px;
    box-shadow:inset 0px 2px 0px 0px rgba(0,0,0,0.1);
    margin-bottom:30px;

}

.barfiller .fill {
  position:absolute;
    margin-top:2px;
    margin-left:2px;
    display:block;
    height:21px;
    width:75%;
    border-radius:40px;
    border:solid 1px rgba(0,0,0,0.1);
    border-bottom:solid 2px rgba(0,0,0,0.2);
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

</head>

<body>
<div id="page-transitions">
    
<div class="page-preloader page-preloader-dark">
    <div class="spinner"></div>
</div>
    
<div class="header header-dark">
    <a href="index.html" class="header-logo"><span class="color-red-dark">WORKOUT</span></a>
    <a href="#" class="header-icon header-icon-1 close-sidebar-mask"></a>
    <a href="#" class="header-icon header-icon-1 open-sidebar" disabled>
        <em class="line-1"></em>
        <em class="line-2"></em>
        <em class="line-3"></em>    
    </a>
    <a href="#" class="header-icon header-icon-4"><i class="ion-ios-email-outline"></i></a>
</div>
    
<!-- Main Small Icon Sidebar -->
<div class="sidebar-menu sidebar-dark">
    <div class="sidebar-menu-scroll">
        <a class="current-menu" href="<?= base_url('index.php/Login/cek_login_siswa') ?>""><i class="ion-ios-star-outline"></i><em>Welcome</em></a>       
        <a data-submenus="sub1" href="#"><i class="ion-ios-home-outline"></i><em>User</em></a>       
        <a data-submenus="sub2" href="#"><i class="ion-ios-gear-outline"></i><em>Workout</em></a>      
    </div>
</div>
<!-- Home Submenus -->
<div class="submenu submenu-dark" id="sub1">
    <div class="submenu-scroll">
        <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>User Setting</em></a>        
        <a href="index.html"><i class="ion-ios-star-outline"></i><em>Logout</em></a>         
    </div>
</div>
<!-- Features Submenus -->
<div class="submenu submenu-dark" id="sub2">
    <div class="submenu-scroll">
        <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>Workout</em></a> 
        <a href="<?= base_url('index.php/workout1/pilihreport') ?>"><i class="ion-ios-star-outline"></i><em>Report</em></a>         
    </div>
</div>    
<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 

         
        <div class="content">
            <div class="portfolio portfolio-one-item">  
                <?php if ($report == array()): ?>
                    <h4>Tidak ada Report Latihan.</h4>
                <?php else: ?>
                    <div class="portfolio-item">
                    <?php foreach ($report as $reportitem): ?>
                            Mata Pelajaran : <?= $reportitem['nama_mapel'] ?> <br>
                            Bab : <?= $reportitem['judul_bab'] ?> <br>

                            Score : <?= $reportitem['score'] ?> <br>
                            Total : <?= $reportitem['total'] ?> <br>
                            <div id="bar1" class="barfiller">
  <div class="tipWrap">
  <span class="tip"></span>
  </div>
  <?php foreach ($c as $key) {
    $p = $key['score_grafik'];
  } ?>
  <span class="fill" data-percentage="<?=$p?>"></span>
</div>
                            
                    <?php endforeach ?>
                    </div>
                <?php endif ?>
            </div>
        </div>



    </div>
</div>
</div>

<script type="text/javascript">
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
</script>
</body>