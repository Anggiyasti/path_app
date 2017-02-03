<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Academics | Home 1</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/main-academics/academics-placeholder/img/favicon.png')?>"> -->
                <!-- Favicon -->
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/logofix.png')?>">

        <!-- Normalize CSS --> 
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/normalize.css')?>">

        <!-- Main CSS -->         
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/main.css')?>">

        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/bootstrap.min.css')?>">

        <!-- Animate CSS --> 
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/animate.min.css')?>">

        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/font-awesome.min.css')?>">
        
        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/vendor/OwlCarousel/owl.carousel.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/vendor/OwlCarousel/owl.theme.default.min.css')?>">
        
        <!-- Main Menu CSS -->      
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/meanmenu.min.css')?>">

        <!-- nivo slider CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/vendor/slider/css/nivo-slider.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/vendor/slider/css/preview.css')?>" type="text/css" media="screen" />

        <!-- Datetime Picker Style CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/jquery.datetimepicker.css')?>">

        <!-- Magic popup CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/magnific-popup.css')?>">

        <!-- Switch Style CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/css/hover-min.css')?>">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/main-academics/academics-placeholder/style.css')?>">

        <!-- Modernizr Js -->
        <script src="<?php echo base_url('assets/main-academics/academics-placeholder/js/modernizr-2.8.3.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script>
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
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <!-- Add your site or application content here -->
        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <!-- Main Body Area Start Here -->
        <div id="wrapper">
            <!-- Header Area Start Here -->
            <header>
            <div style=" height: 130px;"></div>                
                <div id="header1" class="header1-area">
                    <div class="main-menu-area bg-primary" id="sticker">
                        <div class="container">
                            <div class="row">                         
                                <div class="col-lg-2 col-md-2 col-sm-3">
                                    <div class="logo-area">

                                        <a href="index.html"><img class="img-responsive" src="<?php echo base_url('assets/images/logofix.png')?>" style="width:80px; height: 80px;" alt="logo"></a>
                                    </div>
                                </div>  
                                <div class="col-lg-8 col-md-8 col-sm-9">
                                    <nav>
                                        <ul>
                                            <li class="active"><a href="#">Home</a>
                                                <ul>
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index2.html">Home 2</a></li>
                                                    <li><a href="index3.html">Home 3</a></li>
                                                    <li><a href="index4.html">Home 4</a></li>
                                                </ul>   
                                            </li>
                                            <li><a href="#">Profile</a>
                                                <ul>
                                                    <li><a href="<?php echo base_url('index.php/Siswa/Profilesiswa')?>">User Setting</a></li>        
                                                </ul>   
                                            </li>
                                            <li><a href="#">Workout</a>
                                                <ul>
                                                    <li><a href="<?= base_url('index.php/workout1') ?>">Workout</a></li>     
                                                    <li><a href="<?= base_url('index.php/workout1/pilihreport') ?>">Report</a></li> 
                                                    <li><a href="<?= base_url('index.php/grafikreport') ?>">Grafik Report</a></li> 
                                                </ul>
                                            </li> 
                                            <li><a href="#">Passing Grade</a>
                                                <ul>
                                                    <li><a href="<?= base_url('index.php/passinggrade/univ') ?>">Universitas</a></li>     
                                                    <li><a href="<?= base_url('index.php/passinggrade/pilih_prodi') ?>">Prodi</a></li> 
                                                    <li><a href="<?= base_url('index.php/passinggrade/passing') ?>">Passing Grade</a></li> 
                                                </ul>
                                            </li> 
                                             <li><a href="#">Path</a>
                                                <ul>
                                                    <li><a href="<?= base_url('index.php/linetopik') ?>">Path</a></li>     
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo base_url('index.php/Login/logout_siswa')?>">Logout</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>   
                                <div class="col-lg-2 col-md-2 hidden-sm">
                                    <div class="apply-btn-area">
                                        <a href="#" class="apply-now-btn">Apply Now</a>
                                    </div> 
                                </div> 
                            </div>                          
                        </div> 
                    </div>
                </div>
                <!-- Mobile Menu Area Start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mobile-menu">
                                
                                    <nav id="dropdown">
                                        <ul>
                                            <li><a href="#">Home</a>
                                                <ul>
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index2.html">Home 2</a></li>
                                                    <li><a href="index3.html">Home 3</a></li>                                                       
                                                    <li><a href="index4.html">Home 4</a></li>                                                       
                                                </ul>   
                                            </li>
                                                    <li><a href="#">Profile</a>
                                                <ul>
                                                    <li><a href="<?php echo base_url('index.php/Siswa/Profilesiswa')?>">User Setting</a></li>        
                                                </ul>   
                                            </li>
                                            <li><a href="#">Workout</a>
                                                <ul>
                                                    <li><a href="<?= base_url('index.php/workout1') ?>">Workout</a></li>     
                                                    <li><a href="<?= base_url('index.php/workout1/pilihreport') ?>">Report</a></li> 
                                                    <li><a href="<?= base_url('index.php/grafikreport') ?>">Grafik Report</a></li> 
                                                </ul>
                                            </li> 
                                            <li><a href="#">Passing Grade</a>
                                                <ul>
                                                    <li><a href="<?= base_url('index.php/passinggrade/univ') ?>">Universitas</a></li>     
                                                    <li><a href="<?= base_url('index.php/passinggrade/pilih_prodi') ?>">Prodi</a></li> 
                                                    <li><a href="<?= base_url('index.php/passinggrade/passing') ?>">Passing Grade</a></li> 
                                                </ul>
                                            </li> 
                                            <li><a href="#">Path</a>
                                                <ul>
                                                    <li><a href="<?= base_url('index.php/linetopik') ?>">Path</a></li>     
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo base_url('index.php/Login/logout_siswa')?>">Logout</a>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                </div>           
                            </div>
                        </div>
                    </div>
                </div>  
                <!-- Mobile Menu Area End -->
            </header>
            <!-- Header Area End Here -->