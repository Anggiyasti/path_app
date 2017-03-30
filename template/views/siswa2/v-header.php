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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/sal/sweetalert-dev.js');?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/sal/sweetalert.css');?>">
    <script type="text/javascript" src="<?= base_url('assets/library/jquery/preview.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>">
    // kkkkk
      
    </script>
    
    <script>
     var base_url = "<?php echo base_url();?>" ;
 </script>
 <script>
var Preview = {
  delay: 150,        // delay after keystroke before updating

  preview: null,     // filled in by Init below
  buffer: null,      // filled in by Init below

  timeout: null,     // store setTimout id
  mjRunning: false,  // true when MathJax is processing
  mjPending: false,  // true when a typeset has been queued
  oldText: null,     // used to check if an update is needed

  //
  //  Get the preview and buffer DIV's
  //
  Init: function () {
    this.preview = document.getElementById("MathPreview");
    this.buffer = document.getElementById("MathBuffer");
  },

  //
  //  Switch the buffer and preview, and display the right one.
  //  (We use visibility:hidden rather than display:none since
  //  the results of running MathJax are more accurate that way.)
  //
  SwapBuffers: function () {
    var buffer = this.preview, preview = this.buffer;
    this.buffer = buffer; this.preview = preview;
    buffer.style.visibility = "hidden"; buffer.style.position = "absolute";
    preview.style.position = ""; preview.style.visibility = "";
  },

  //
  //  This gets called when a key is pressed in the textarea.
  //  We check if there is already a pending update and clear it if so.
  //  Then set up an update to occur after a small delay (so if more keys
  //    are pressed, the update won't occur until after there has been 
  //    a pause in the typing).
  //  The callback function is set up below, after the Preview object is set up.
  //
  Update: function () {
    if (this.timeout) {clearTimeout(this.timeout)}
    this.timeout = setTimeout(this.callback,this.delay);
  },

  //
  //  Creates the preview and runs MathJax on it.
  //  If MathJax is already trying to render the code, return
  //  If the text hasn't changed, return
  //  Otherwise, indicate that MathJax is running, and start the
  //    typesetting.  After it is done, call PreviewDone.
  //  
  CreatePreview: function () {
    Preview.timeout = null;
    if (this.mjPending) return;
    var text = document.getElementById("MathInput").value;
    if (text === this.oldtext) return;
    if (this.mjRunning) {
      this.mjPending = true;
      MathJax.Hub.Queue(["CreatePreview",this]);
    } else {
      this.buffer.innerHTML = this.oldtext = text;
      this.mjRunning = true;
      MathJax.Hub.Queue(
 ["Typeset",MathJax.Hub,this.buffer],
 ["PreviewDone",this]
      );
    }
  },

  //
  //  Indicate that MathJax is no longer running,
  //  and swap the buffers to show the results.
  //
  PreviewDone: function () {
    this.mjRunning = this.mjPending = false;
    this.SwapBuffers();
  }

};

//
//  Cache a callback to the CreatePreview action
//
Preview.callback = MathJax.Callback(["CreatePreview",Preview]);
Preview.callback.autoReset = true;  // make sure it can run more than once

</script>
  </head>


  <body>
    <div class="m-scene" id="main"> <!-- Main Container -->
    <!-- Right Sidebar -->
      <ul id="slide-out" class="side-nav">
        <li class="sidenav-header">
        </li>
        <!-- Tabs -->
        <li>
          <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#sidebar1">Log Activity</a></li>
            <li class="tab col s3"><a href="#sidebar2">Score</a></li>
          </ul>
        </li>
        <li id="sidebar1" class="p-20">
          <!-- Twitter -->
          <div class="twitter">
            <h6 class="follow-us"><i class="ion-social-twitter"></i> Follow us on Twitter</h6>
          </div>
          <!-- Facebook -->
          <div class="facebook">
            <h6 class="follow-us">Notifications</h6>
            <?php foreach ($log as $l) : ?>
            
            <div class="face-notification">
              
              <div>
              <?php $selesai = $l['tgl_selesai'];
                    $mulai =$l['tgl_mulai'];


              ?>
                
                
                <!--  <span><?=$l['id_siswa'] ?> mulai <?=$l['tgl_mulai']?></span> -->
                <!-- <span><?=$l['nama_depan'] ?> selesai belajar <?=$l['tgl_selesai']?></span> -->
                <span><?=$l['nama_depan'] ?> Selesai Belajar Bab <?=$l['judul_bab']?></span>
               
              </div>
            </div>
            <div class="face-notification">
              
              <div>
                 <span><?=$l['nama_depan'] ?> Mulai Belajar Bab <?=$l['judul_bab']?></span>
                 
                  
                                 
              </div>
            </div>
            
            <?php endforeach ?>
            <div class="face-notification">
              <img src="img/user3.jpg" alt="" class="cricle">
              <div>
                
            </div>
          </div>

        </li>
        <li id="sidebar2" class="p-20">
          <!-- Chat -->
          <?php foreach ($nilai as $key) : ?>
          <div class="chat-sidebar">
            
            <div class="chat-message">
                <p><?=$key['judul_bab']?></p> 
                <p><?=$key['create_by']?></p>             
              <span><?=$key['n']?></span>
              <span class="small">online</span>
            </div>            
          </div>
          <?php endforeach ?>

          <div class="chat-sidebar">
            <div class="chat-img">
              <img src="img/user3.jpg" alt="" class="cricle">
              <span class="dot green"></span>
            </div>
            <div class="chat-message">
              <p>James Tree</p>
              <span>Awaiting your reply.</span>
              <span class="small">online</span>
            </div>
          </div>
        </li>
      </ul>
      
      <!-- Modal Path -->
        <div id="modal2" class="modal">
          <div class="modal-content">
            <h4>Modal Header</h4>
            <p>Apakah anda yakin memilih jurusan <?=$jur?> ?</p>
            <p>Jika ya, jurusan tidak dapat diubah hingga path selesai dikerjakan!</p>
          </div>
          <div class="modal-footer">
            <a href="<?= base_url('index.php/linetopik') ?>" class="modal-action modal-close waves-effect waves-green btn-flat ">Ya</a>
            <a href="<?= base_url('login') ?>" class="modal-action modal-close waves-effect waves-green btn-flat ">Tidak</a>
          </div>
        </div>

      
      <!-- Left Sidebar -->
      <ul id="slide-out-left" class="side-nav collapsible">
      
          <div class="sidenav-header primary-color">
           <?php foreach ($siswa as $s): ?>
          <div class="nav-social">

              <a href="<?= $s->facebook ?>" class="ion-social-facebook " style="padding-right: 20px; color: white; float: left;" ></a>
           <a href="<?= $s->twitter ?>" class="ion-social-twitter" style="padding-right: 20px; color: white; float: left; " ></a>
           <a href="<?= $s->instagram ?>" class="ion-social-tumblr" style="padding-right: 20px; color: white; float: left; " ></a>
           <div style="clear: both;"></div>
            </div>
            
            
            <div class="nav-avatar" >

           
              <img class="circle avatar" src="<?= base_url('./assets/images/siswa/'. $s->photo) ?>" >
              <div class="avatar-body">
                <h3><?=$this->session->userdata['username'];?></h3>
                <p><?=$s->jurusan?> </p>
                <p><?=$s->univ ?></p>

              </div>
                
            </div>
            <?php endforeach ?> 
          </div>
        </li>
        <li><a href="<?php echo base_url('index.php')?>" class="no-child"><i class="ion-android-home"></i> Home</a></li>
        <li><a href="<?php echo base_url('index.php/Siswa/Profilesiswa')?>" class="no-child"><i class="ion-android-person"></i> Profile Setting</a></li>
        <li><a href=" http://www.sanaksaindonesia.com/baper" class="no-child"><i class="ion-information"></i> Bantuan Penjurusan</a></li>

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
                <a href="<?= base_url('index.php/passinggrade/cari') ?>">Cari Program Studi</a>
              </li>
            </ul>
          </div>  
        </li>
        
        <li>
          <!-- Modal Trigger Fixed Footer-->
          <a class="modal-trigger no-child" href="#modal2"><i class="ion-social-rss"></i>Path</a>
        </li>
        <li><a href="<?php echo base_url('index.php/Login/logout_siswa')?>" class="no-child"><i class="ion-android-exit"></i> Logout</a></li>
        
      </ul>
      <!-- End of Sidebars -->
