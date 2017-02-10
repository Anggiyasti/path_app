<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Halo - Mobile Template</title>
    <meta content="IE=edge" http-equiv="x-ua-compatible">
    <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <!-- Icons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" media="all" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="<?php echo base_url('assets/app/halo/css/keyframes.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/app/halo/css/materialize.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/app/halo/css/swiper.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/app/halo/css/swipebox.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/app/halo/css/style.css')?>" rel="stylesheet" type="text/css">

    <script src="<?= base_url('assets/sal/sweetalert-dev.js');?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/sal/sweetalert.css');?>">
    
    <script>
     var base_url = "<?php echo base_url();?>" ;
 </script>
  </head>

  <body>
    <div class="m-scene" id="main"> <!-- Main Container -->
      
      <!-- Left Sidebar -->
      <ul id="slide-out-left" class="side-nav collapsible">
        <li>
          <div class="sidenav-header primary-color">
            
            <div class="nav-avatar">
            <?php foreach ($siswa as $s): ?>
              <img class="circle avatar" src="<?= base_url('./assets/images/siswa/'. $s->photo) ?>" alt="">
              <div class="avatar-body">
                <h3>Halo <?=$this->session->userdata['username'];?></h3>
                <p><?=$s->jurusan?> <?=$s->univ ?></p>

              </div>
              <?php endforeach ?>   
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
</div>