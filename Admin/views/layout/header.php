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
          <script src="<?= base_url('assets/sal/sweetalert-dev.js');?>"></script>
          <link rel="stylesheet" href="<?= base_url('assets/sal/sweetalert.css');?>">
        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/library/bootstrap/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/stylesheet/layout.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/stylesheet/uielement.min.css')?>">
        <link rel="stylesheet" href="<?= base_url('assets/sal/sweetalert.css');?>">
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
<script type="text/javascript">
  

  function add_to() {
 if (halaman) {
 $('#modalto').modal('show'); // show bootstrap modal
}else{
 var konfirm = window.confirm("Anda akan dialihkan pada halaman tryout?");
 if (konfirm) {
  document.location.href = base_url+"index.php/toback/listTo";
}
}

}

  $.ajax({
   type: "POST",
   url: "<?= base_url() ?>guru/get_avatar_guru",
   success: function (data) { 
    console.log(data);
    $('span.avatar').html(data);
  }
});

  function hide_e_crtTo() {
    $("#e_crtTo").hide();
  }
  function hide_e_tglTo() {
    $("#e_tglTo").hide();
  }
  function hide_e_wktTo() {
    $("#e_wktTo").hide();
  }
  function crtTo() {
    var nm_paket   =   $('#to_nm').val();
    var tgl_mulai  =   $('#to_tglmulai').val();
    var tgl_akhir  =   $('#to_tglakhir').val();
    var wkt_mulai  =   $('#to_wktmulai').val();
    var wkt_akhir  =   $('#to_wktakhir').val();
    var publish;
    if ($('#to_publish:checked')==true) {
     publish = 1;
   } else{
     publish = 0;
   }
// pengecekan inputan pembuatan to
// cek inputan kosong
if (nm_paket != "" && tgl_mulai != "" && tgl_akhir!= "" && wkt_mulai != "" && wkt_akhir != "" ) {
    // validasi tanggal mulai dan tanggal akhir
    if (tgl_mulai<tgl_akhir) {

      
     var url = base_url+"index.php/toback/buatTo";
     $.ajax({
      url : url,
      type: "POST",
      data: { nmpaket : nm_paket,
       tglmulai:tgl_mulai,
       tglakhir:tgl_akhir,
       wktmulai:wkt_mulai,
       wktakhir:wkt_akhir,
       publish :publish 

     },
       // cache: false,
       // dataType: "JSON",
       success: function(data,respone)
      {   
        reload_tblist();  
        $("#e_crtTo").hide(); 
        $('#modalto').modal('hide'); 
        $('#form_to')[0].reset(); // reset form on modals
        $('#modalto').removeClass('has-error'); // clear error class  

        },
        error: function (jqXHR, textStatus, errorThrown)
        {

                            // $("#e_crtTo").show();
        lert('Error adding / update data');
        }
        });
   }else if(tgl_mulai==tgl_akhir) {
    if (wkt_mulai>=wkt_akhir) {
      $("#e_wktTo").show();
    }else{
          var url = base_url+"index.php/toback/buatTo";
     $.ajax({
      url : url,
      type: "POST",
      data: { nmpaket : nm_paket,
       tglmulai:tgl_mulai,
       tglakhir:tgl_akhir,
       wktmulai:wkt_mulai,
       wktakhir:wkt_akhir,
       publish :publish 

     },
       // cache: false,
       // dataType: "JSON",
       success: function(data,respone)
      {   
        reload_tblist();  
        $("#e_crtTo").hide(); 
        $('#modalto').modal('hide'); 
        $('#form_to')[0].reset(); // reset form on modals
        $('#modalto').removeClass('has-error'); // clear error class  

        },
        error: function (jqXHR, textStatus, errorThrown)
        {

                            // $("#e_crtTo").show();
        lert('Error adding / update data');
        }
        });
    }
    
   }else {
     $("#e_tglTo").show();
   }
   
 }else{

   $("#e_crtTo").show();
 }



}
</script>

<script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script> 
!-- START Modal ADD TO -->
<div class="modal fade" id="modalto" tabindex="-1" role="dialog">
  <!--START modal dialog  -->
  <div class="modal-dialog" role="document">
   <!-- STRAT MOdal Content -->
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title">Buat TO</h4>
   </div>

   <!-- START Modal Body -->
   <div class="modal-body">

     <!-- START PESAN ERROR EMPTY INPUT -->
     <div class="alert alert-dismissable alert-danger" id="e_crtTo" hidden="true" >
      <button type="button" class="close" onclick="hide_e_crtTo()" >×</button>
      <strong>O.M.G.!</strong> Tolong di ISI semua.
    </div>
    <!-- END PESAN ERROR EMPTY INPUT -->
    <!-- START PESAN ERROR EMPTY INPUT -->
     <div class="alert alert-dismissable alert-danger" id="e_wktTo" hidden="true" >
      <button type="button" class="close" onclick="hide_e_wktTo()" >×</button>
      <strong>ilahkan cek kembali!</strong> Waktu mulai dan tanggal waktu tidak sesuai.
    </div>
    <!-- END PESAN ERROR EMPTY INPUT -->
    <!-- START PESAN ERROR EMPTY INPUT -->
    <div class="alert alert-dismissable alert-danger" id="e_tglTo" hidden="true" >
      <button type="button" class="close" onclick="hide_e_tglTo()" >×</button>
      <strong>Silahkan cek kembali!</strong> Tanggal mulai dan tanggal akhir tidak sesuai.
    </div>
    <!-- END PESAN ERROR EMPTY INPUT -->
    <form class="panel panel-default form-horizontal form-bordered" action="javascript:void(0);" method="post" id="form_to">
      <div  class="form-group">
       <label class="col-sm-3 control-label">Nama Tryout</label>
       <div class="col-sm-8">
        <input type="text" class="form-control" name="nmpaket" id="to_nm">
      </div>
    </div>
    <div  class="form-group">
     <label class="col-sm-3 control-label">Tanggal Mulai</label>
     <div class="col-sm-4">
      <input type="date" class="form-control" name="tglmulai" id="to_tglmulai">
    </div >
    <div class="col-sm-4">
      <input type="time" class="form-control" name="wktmulai" id="to_wktmulai" >
    </div>
  </div>
  <div  class="form-group">
   <label class="col-sm-3 control-label">Tanggal Berakhir</label>
   <div class="col-sm-4">
    <input type="date" class="form-control" name="tglakhir" id="to_tglakhir">
  </div>
  <div class="col-sm-4">
    <input type="time" class="form-control" name="wktakhir" id="to_wktakhir" >
  </div>
</div>

<div class="form-group">
 <label class="col-sm-3 control-label">Publish</label>
 <div class="col-sm-8">
  <div class="checkbox custom-checkbox">  
   <input type="checkbox" name="publish" id="to_publish" value="1">  
   <label for="to_publish" >&nbsp;&nbsp;</label>   
 </div>
</div>
</div> 

</div>
<!-- END Modal Body -->
<!-- START Modal Footer -->
<div class="modal-footer">
  <button type="submit" id="myFormSubmit" class="btn btn-primary" onclick="crtTo()"  >Proses</button>
</div>
</form>
<!-- START Modal Footer -->

</div>
<!-- END MOdal Content -->

</div>
<!--END modal dialog  -->
</div>



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
                                <a href="<?php echo base_url('index.php/banksoal/listsoal')?>">
                                    <span class="text">Daftar Soal 2</span>
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
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#learning" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Path</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="learning" class="submenu collapse">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?=base_url('index.php/learningline')?>">
                                    <span class="text">Part 1 (Mapping)</span>
                                </a>
                            </li>
                             <li >
                                <a href="#">
                                    <span class="text">Part 2 (Pendalaman)</span>
                                </a>
                            </li>
                            <li >
                                <a href="javascript:void(0);" data-target="#subbanksoal" data-toggle="submenu">
                                    <span class="text">Part 3 (Simulasi)</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul id="subbanksoal" class="submenu collapse ">
                                    <li ><a href="<?= base_url('index.php/paketsoal/tambahpaketsoal');?>"><span class="text">Tambah Paket</span>
                                    </a></li>
                                    <li><a href="javascript:void(0);" onclick="add_to()"><span class="text">Tambah Try Out</span>
                                    </a></li>
                                    <li><a href="<?= base_url('index.php/toback/listTo');?>" ><span class="text">Daftar Try Out</span>
                                    </a></li>


                                  </ul>
                            </li>
                            
                        </ul>
                        
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#token" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Token</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="token" class="submenu collapse">
                            <li class="submenu-header ellipsis">Forms</li>
                             <li >
                                <a href="<?php echo base_url('index.php/token')?>">
                                    <span class="text">Token</span>
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
                        <a href="<?php echo base_url('index.php/template/slide')?>" data-toggle="submenu"  data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Ubah Slider</span>
                            <span class="arrow"></span>
                        </a>
                        
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


