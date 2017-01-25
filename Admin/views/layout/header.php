<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adminre backend</title>
        <meta name="author" content="pampersdry.info">
        <meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap 3.1.1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-144x144-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-144x144-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-114x114-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-72x72-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-57x57-precomposed.png')?>">
        <link rel="shortcut icon" href="<?php echo base_url('assets/adminre/image/favicon.ico')?>">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/plugins/selectize/css/selectize.min.css')?>">
         <link rel="stylesheet" href="<?php echo base_url('assets/adminre/plugins/datatables/css/jquery.datatables.min.css')?>">
        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/library/bootstrap/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/stylesheet/layout.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/stylesheet/uielement.min.css')?>">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->

        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="<?php echo base_url('assets/adminre/library/modernizr/js/modernizr.min.js')?>"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
    <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script>

<!--js buat menampilakan priview video sebelum di upload  -->

    <script type="text/javascript" src="<?= base_url('assets/library/jquery/preview.js') ?>"></script>

    <!-- js untuk progres bar file yg di upload -->

    <script type="text/javascript" src="<?= base_url('assets/library/jquery/upbar.js') ?>"></script>

    <script type="text/javascript" src="<?= base_url('assets/library/jquery/jequery.form.js') ?>"></script>
  <script type="text/x-mathjax-config">
       MathJax.Hub.Config({
         showProcessingMessages: false,
         tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] }
       });
     </script>
<script type="text/javascript" src="<?= base_url('assets/adminre/plugins/MathJax-master/MathJax.js?config=TeX-MML-AM_HTMLorMML') ?>"></script>

<script>
var base_url = "<?php echo base_url();?>" ;
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
<script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script> 



       <header id="header" class="navbar navbar-fixed-top">
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <a class="navbar-brand" href="javascript:void(0);">
                    <span class="logo-figure"></span>
                    <span class="logo-text"></span>
                </a>
                <!--/ Brand -->
            </div>
            <!--/ END navbar header -->

            <!-- START Toolbar -->
            <div class="navbar-toolbar clearfix">
                <!-- START Left nav -->
                <ul class="nav navbar-nav navbar-left">
                    <!-- Sidebar shrink -->
                    <li class="hidden-xs hidden-sm">
                        <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                            <span class="meta">
                                <span class="icon"></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Sidebar shrink -->

                    <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main hidden-lg hidden-md hidden-sm">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas left -->

                    <!-- Message dropdown -->
                    
                    <!--/ Message dropdown -->

                    <!-- Notification dropdown -->
                    
                    <!--/ Notification dropdown -->

                    <!-- Search form toggler  -->
                    <li>
                        
                    </li>
                    <!--/ Search form toggler -->
                </ul>
                <!--/ END Left nav -->

                <!-- START navbar form -->
                <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                    <form action="" role="search">
                        <div class="has-icon">
                            <input type="text" class="form-control" placeholder="Search application...">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                    </form>
                </div>
                <!-- START navbar form -->

                <!-- START Right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Profile dropdown -->
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="avatar"><img src="<?php echo base_url('assets/adminre/image/avatar/avatar7.jpg')?>" class="img-circle" alt="" /></span>
                                <span class="text hidden-xs hidden-sm pl5"><?=$this->session->userdata['username'];?></span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            
                            <li class="divider"></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-user-plus2"></i></span> My Accounts</a></li>
                            <li><a href="<?=base_url('index.php/admin/Profileadmin');?>"><span class="icon"><i class="ico-cog4"></i></span> Profile Setting</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('index.php/Login/logout_admin')?>"><span class="icon"><i class="ico-exit"></i></span> Sign Out</a></li>
                        </ul>
                    </li>
                    <!-- Profile dropdown -->

                    <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    
                    <!--/ Offcanvas right -->
                </ul>
                <!--/ END Right nav -->
            </div>
            <!--/ END Toolbar -->
        </header>

        <!--/ END Template Sidebar (Left) -->
        
        
        <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
                <!-- START Template Navigation/Menu -->
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                    <li >
                        <a href="<?php echo base_url('assets/adminre/gh_frontend')?>">
                            <span class="figure"><i class="ico-trophy"></i></span>
                            <span class="text">Frontend</span>
                        </a>
                    </li>
                    <li class="active open">
                        <a href="javascript:void(0);" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-home2"></i></span>
                            <span class="text">Dashboard </span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                       
                        <!--/ END 2nd Level Menu -->
                    </li>
                     <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#mapel1" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Mata Pelajaran</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="mapel1" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/tambahmapel')?>">
                                    <span class="text">Tambah Mata pelajaran</span>
                                </a>
                            </li>
                            
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/daftarmapel')?>">
                                    <span class="text">Daftar Mata Pelajaran</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/daftarmapelicon')?>">
                                    <span class="text">Tambah Icon</span>
                                </a>
                            </li>
                            
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>

                    <li >
                        <a href="javascript:void(0);" data-target="#bab1" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">BAB</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="bab1" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/tambahbab')?>">
                                    <span class="text">Tambah BAB</span>
                                </a>
                            </li>
                            
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/daftarbab')?>">
                                    <span class="text">Daftar BAB</span>
                                </a>
                            </li>
                            
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>

                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#soal" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Bank Soal</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="soal" class="submenu collapse">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/form_tambahsoal')?>">
                                    <span class="text">Tambah Soal</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/daftarsoal')?>">
                                    <span class="text">Daftar Soal</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/filter')?>">
                                    <span class="text">Filter Soal</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#video" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Video</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="video" class="submenu collapse">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?php echo base_url('index.php/Videoback')?>">
                                    <span class="text">Tambah Video</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('index.php/Videoback/daftarvideo')?>">
                                    <span class="text">Lihat Video</span>
                                </a>
                            </li>
                            
                        </ul>
                        
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#materi" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Materi</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="materi" class="submenu collapse">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?=base_url('index.php/materi/form_materi')?>">
                                    <span class="text">Tambah materi</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?=base_url('index.php/materi/list_all_materi')?>">
                                    <span class="text">Lihat materi</span>
                                </a>
                            </li>
                            
                        </ul>
                        
                        <!--/ END 2nd Level Menu -->
                    </li>
                     <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#guru" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Guru</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="guru" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li>
                                <a href="<?php echo base_url('index.php/user/d_guru')?>">
                                    <span class="text">Daftar Guru</span>
                                </a>
                            </li>
                             <li >
                                <a href="<?php echo base_url('index.php/user/t_guru')?>">
                                    <span class="text">Tambah Guru</span>
                                </a>
                            </li>
                           
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#siswa" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Siswa</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="siswa" class="submenu collapse">
                            <li class="submenu-header ellipsis">Forms</li>
                             <li >
                                <a href="<?php echo base_url('index.php/user/d_siswa')?>">
                                    <span class="text">Daftar Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/user/t_siswa')?>">
                                    <span class="text">Tambah Siswa</span>
                                </a>
                            </li>
                            
                           
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                     <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#pass" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Passing Grade</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="pass" class="submenu collapse">
                            <li class="submenu-header ellipsis">Passing Garde</li>
                             <li >
                                <a href="<?php echo base_url('index.php/Passinggrade/t_pass')?>">
                                    <span class="text">Tambah Passing Grade</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/Passinggrade/daftar_pass')?>">
                                    <span class="text">Daftar Passing Grade</span>
                                </a>
                            </li>
                            
                           
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>

              
                <!--/ Summary -->
                <!--/ END Sidebar summary -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>
