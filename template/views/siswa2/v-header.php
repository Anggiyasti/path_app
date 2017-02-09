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
    <script type="text/javascript" src="<?= base_url('assets/library/jquery/preview.js') ?>"></script>
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

      <!-- Sidebars -->
      <!-- Right Sidebar -->
      <ul id="slide-out" class="side-nav">
        <li class="sidenav-header">
          <!-- Srearch bar -->
          <nav class="transparent no-shadow">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input id="search" type="search" required>
                  <label for="search"><i class="ion-android-search"></i></label>
                  <i class="ion-android-close"></i>
                </div>
              </form>
            </div>
          </nav>
        </li>
        <!-- Tabs -->
        <li>
          <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#sidebar1">Social</a></li>
            <li class="tab col s3"><a href="#sidebar2">Chat</a></li>
          </ul>
        </li>
        <li id="sidebar1" class="p-20">
          <!-- Twitter -->
          <div class="twitter">
            <h6 class="follow-us"><i class="ion-social-twitter"></i> Follow us on Twitter</h6>
            <div class="tweet">
              <h3>@Codnauts</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <a href="#">#tempor</a>.</p>
            </div>
            <div class="tweet">
              <h3>@Codnauts</h3>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in <a href="#">#voluptate</a> culpa qui officia deserunt mollit anim.</p>
            </div>
            <div class="tweet">
              <h3>@Codnauts</h3>
              <p>At vero eos et accusamus et iusto odio <a href="#">#dignissimos</a> <a href="#">#ducimus</a> qui blanditiis praesentium.</p>
            </div>
          </div>
          <!-- Facebook -->
          <div class="facebook">
            <h6 class="follow-us">Notifications</h6>
            <div class="face-notification">
              <img src="img/user2.jpg" alt="" class="cricle">
              <div>
                <p>Mike Green</p>
                <span>Sent you a message</span>
                <span class="small">Today at 16:48</span>
              </div>
            </div>
            <div class="face-notification">
              <img src="img/user.jpg" alt="" class="cricle">
              <div>
                <p>Lara Connors</p>
                <span>Post a photo with you</span>
                <span class="small">Today at 14:26</span>
              </div>
            </div>
            <div class="face-notification">
              <img src="img/user3.jpg" alt="" class="cricle">
              <div>
                <p>Mike Green</p>
                <span>Post something...</span>
                <span class="small">Yesterday at 03:19</span>
              </div>
            </div>
          </div>

        </li>
        <li id="sidebar2" class="p-20">
          <!-- Chat -->
          <div class="chat-sidebar">
            <div class="chat-img">
              <img src="img/user.jpg" alt="" class="cricle">
              <span class="dot green"></span>
            </div>
            <div class="chat-message">
              <p>Mike Green</p>
              <span>Sent you a message</span>
              <span class="small">online</span>
            </div>
          </div>

          <div class="chat-sidebar">
            <div class="chat-img">
              <img src="img/user2.jpg" alt="" class="cricle">
              <span class="dot green"></span>
            </div>
            <div class="chat-message">
              <p>Lora Bell</p>
              <span>6 New messages</span>
              <span class="small">online</span>
            </div>
          </div>

          <div class="chat-sidebar">
            <div class="chat-img">
              <img src="img/user3.jpg" alt="" class="cricle">
              <span class="dot orange"></span>
            </div>
            <div class="chat-message">
              <p>Tony Lee</p>
              <span>Away from keyboard.</span>
              <span class="small">Away</span>
            </div>
          </div>

          <div class="chat-sidebar">
            <div class="chat-img">
              <img src="img/user4.jpg" alt="" class="cricle">
              <span class="dot grey"></span>
            </div>
            <div class="chat-message">
              <p>Jim Connor</p>
              <span>Is offline.</span>
              <span class="small">offline</span>
            </div>
          </div>

          <div class="chat-sidebar">
            <div class="chat-img">
              <img src="img/user5.jpg" alt="" class="cricle">
              <span class="dot green"></span>
            </div>
            <div class="chat-message">
              <p>Sara Lower</p>
              <span>Sent you a message</span>
              <span class="small">online</span>
            </div>
          </div>

          <div class="chat-sidebar">
            <div class="chat-img">
              <img src="img/user.jpg" alt="" class="cricle">
              <span class="dot grey"></span>
            </div>
            <div class="chat-message">
              <p>Mick Pole</p>
              <span>Is offline.</span>
              <span class="small">offline</span>
            </div>
          </div>

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
      <!-- Left Sidebar -->
      <ul id="slide-out-left" class="side-nav collapsible">
        <li>
          <div class="sidenav-header primary-color">
            <div class="nav-social">
              <i class="ion-social-facebook"></i>
              <i class="ion-social-twitter"></i>
              <i class="ion-social-tumblr"></i>
            </div>
            <div class="nav-avatar">
              <img class="circle avatar" src="img/user.jpg" alt="">
              <div class="avatar-body">
                <h3>Halo</h3>
                <p>Material Mobile</p>

              </div>
            </div>
          </div>
        </li>
        <li><a href="<?php echo base_url('index.php')?>" class="no-child"><i class="ion-android-home"></i> Home</a></li>
        <li><a href="<?php echo base_url('index.php/Siswa/Profilesiswa')?>" class="no-child"><i class="ion-android-person"></i> profile Setting</a></li>

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
