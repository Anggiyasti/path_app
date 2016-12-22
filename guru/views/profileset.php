<?php 

  foreach ($guru as $row) {
    $id_guru = $row['id_guru'];

    $nama_guru = $row['nama_guru'];

    $username = $row['username'];

    $password = $row['password'];

    $email = $row['email'];

    // $biografi = $row['biografi'];

    // $photo=base_url().'assets/image/photo/guru/'.$row['photo'];

    // $oldphoto=$row['photo'];

} ;



?> 
       

        <!-- START Template Header -->
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
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-cog4"></i></span> Profile Setting</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('index.php/Login/logout_guru')?>"><span class="icon"><i class="ico-exit"></i></span> Sign Out</a></li>
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
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
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
                            <span class="text">Dashboard</span>
                            <!-- <span class="arrow"></span> -->
                        </a>
                        <!-- START 2nd Level Menu -->
                        
                        <!--/ END 2nd Level Menu -->
                    </li>
                     <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#mapel" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Mata Pelajaran</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="mapel" class="submenu collapse ">
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
                            
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>

                    <li >
                        <a href="javascript:void(0);" data-target="#bab" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">BAB</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="bab" class="submenu collapse ">
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
                            <span class="text">Tambah Soal</span>
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
                                <a href="<?php echo base_url('index.php/banksoal/filtersoal')?>">
                                    <span class="text">Filter Soal</span>
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
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Dashboard</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar clearfix">
                            
                            
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>

                <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Profile / account settings</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="#">Page</a></li>
                                <li class="active">Profile</li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <!-- Left / Top Side -->
                    <div class="col-lg-3">
                        <!-- tab menu -->
                        <ul class="list-group list-group-tabs">
                            <li class="list-group-item active"><a href="#profile" data-toggle="tab"><i class="ico-user2 mr5"></i> Profile</a></li>
                            <li class="list-group-item"><a href="#account" data-toggle="tab"><i class="ico-archive2 mr5"></i> Account</a></li>
                            <li class="list-group-item"><a href="#security" data-toggle="tab"><i class="ico-shield3 mr5"></i> Security &amp; privacy</a></li>
                            <li class="list-group-item"><a href="#password" data-toggle="tab"><i class="ico-key2 mr5"></i> Password</a></li>
                        </ul>
                        <!-- tab menu -->

                        <hr><!-- horizontal line -->

                        <!-- figure with progress -->
                        <ul class="list-table">
                            <li style="width:70px;">
                                <img class="img-circle img-bordered" src="../image/avatar/avatar7.jpg" alt="" width="65px">
                            </li>
                            <li class="text-left">
                                <h5 class="semibold ellipsis mt0"><?=$this->session->userdata['username'];?></h5>
                                
                            </li>
                        </ul>
                        <!--/ figure with progress -->

                        <hr><!-- horizontal line -->

                        <!-- follower stats -->
                       
                        <!--/ follower stats -->
                    </div>
                    <!--/ Left / Top Side -->

                    <!-- Left / Bottom Side -->
                    <div class="col-lg-9">
                        <!-- START Tab-content -->
                        <div class="tab-content">
                            <!-- tab-pane: profile -->
                            <div class="tab-pane active" id="profile">
                                <!-- form profile -->
                                <?php echo $this->session->flashdata('msg'); ?>
                                <form class="panel form-horizontal form-bordered" name="form-profile" action="<?=base_url()?>index.php/guru/edit_guru" method="post">
                                    <div class="panel-body pt0 pb0">
                                        <div class="form-group header bgcolor-default">
                                            <div class="col-md-12">
                                                <h4 class="semibold text-primary mt0 mb5">Profile</h4>
                                                <p class="text-default nm">This information appears on your public profile, search results, and beyond.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 ">ID Guru</label>
                                            <div class="col-sm-5">
                                                <input class="form-control" name="id_guru" type="text" value="<?=$id_guru; ?>" disabled/>
                                            <span class="text-danger"><?php echo form_error('id_guru'); ?></span>
                                                <p class="help-block">Enter your real name.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">Nama</label>
                                            <div class="col-sm-5">
                                                <input class="form-control" name="nama_guru" placeholder="Nama Guru" type="text" value="<?=$nama_guru; ?>" />
                                            <span class="text-danger"><?php echo form_error('nama_guru'); ?></span>
                                                <p class="help-block">Where in the world are you?</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">Username</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="username" class="form-control" value="<?=$username; ?>" >
                                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                                                <p class="help-block">Have a homepage or a blog? Put the address here.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">Email</label>
                                            <div class="col-sm-5">
                                                <input type="email" name="email" class="form-control" value="<?=$email; ?>" >
                                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                <p class="help-block">Have a homepage or a blog? Put the address here.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">Email</label>
                                            <div class="col-sm-5">
                                                <input type="password" name="password" class="form-control" value="<?=$password; ?>" >
                                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                                                <p class="help-block">Have a homepage or a blog? Put the address here.</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-sm-2">Status</label>
                                        <div class="col-sm-5">
                                            <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                                <input type="checkbox" name="status" id="customcheckbox1" value="1" />
                                                <label for="customcheckbox1">&nbsp;&nbsp;Aktif</label>
                                            </span>
                                        </div>
                                    </div>
                                        
                                    </div>
                                    <div class="panel-footer">
                                    <input type="hidden" name="id_guru" value="<?=$id_guru;?>">
                                            <input type="submit" class="btn" name="update"  value="Update" class="btn btn-primary">
                                            <!-- <h1>selamat datang <?=$this->session->userdata['username'];?></h1> -->

                                        <!-- <button type="reset" class="btn btn-default">Reset</button>
                                        <button type="submit" class="btn btn-primary">Save change</button> -->
                                    </div>
                                </form>
                                <!--/ form profile -->
                            </div>
                            <!--/ tab-pane: profile -->

                            <!-- tab-pane: account -->
                            <div class="tab-pane" id="account">
                                <!-- form account -->
                                <form class="panel form-horizontal form-bordered" name="form-account">
                                    <div class="panel-body pt0 pb0">
                                        <div class="form-group header bgcolor-default">
                                            <div class="col-md-12">
                                                <h4 class="semibold text-primary mt0 mb5">Account</h4>
                                                <p class="text-default nm">Change your basic account and language settings.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Username</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="username" value="erich.reyes">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="email">
                                                <p class="help-block">Email will not be publicly displayed. <a href="javascript:void(0);">Learn more.</a></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">language</label>
                                            <div class="col-sm-5">
                                            <select class="form-control" name="language">
                                                    <option>Select Language...</option>
                                                    <option value="eu">Basque - Euskara (beta)</option>
                                                    <option value="ca">Catalan - català (beta)</option>
                                                    <option value="cs">Czech - Čeština (beta)</option>
                                                    <option value="da">Danish - Dansk</option>
                                                    <option value="nl">Dutch - Nederlands</option>
                                                    <option value="en" selected="">English</option>
                                                    <option value="en-gb">English UK - EnglishUK</option>
                                                    <option value="fil">Filipino - Filipino</option>
                                                    <option value="fi">Finnish - Suomi</option>
                                                    <option value="fr">French - français</option>
                                                    <option value="gl">Galician - Galego (beta)</option>
                                                    <option value="de">German - Deutsch</option>
                                                    <option value="el">Greek - Ελληνικά (beta)</option>
                                                    <option value="hu">Hungarian - Magyar</option>
                                                    <option value="id">Indonesian - Bahasa Indonesia</option>
                                                    <option value="it">Italian - Italiano</option>
                                                    <option value="xx-lc">Lolcat - LOLCATZ (beta)</option>
                                                    <option value="msa">Malay - Bahasa Melayu</option>
                                                    <option value="no">Norwegian - Norsk</option>
                                                    <option value="pl">Polish - Polski</option>
                                                    <option value="pt">Portuguese - Português</option>
                                                    <option value="ro">Romanian - română (beta)</option>
                                                    <option value="ru">Russian - Русский</option>
                                                    <option value="es">Spanish - Español</option>
                                                    <option value="sv">Swedish - Svenska</option>
                                                    <option value="tr">Turkish - Türkçe</option>
                                                    <option value="uk">Ukrainian - Українська мова (beta)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Timezone</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="timezone">
                                                    <option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
                                                    <option data-offset="-32400" value="Alaska">(GMT-09:00) Alaska</option>
                                                    <option data-offset="-28800" value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                    <option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
                                                    <option data-offset="-25200" value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                    <option data-offset="-21600" value="Central Time (US &amp; Canada)">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                    <option data-offset="-18000" value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                    <option data-offset="-18000" value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group header bgcolor-default">
                                            <div class="col-md-12">
                                                <h4 class="semibold text-primary mt0 mb5">Content</h4>
                                                <p class="text-default nm">Change your change settings.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Country</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="country">
                                                    <option value="xx" selected="">Worldwide</option>
                                                    <option value="af">Afghanistan</option>
                                                    <option value="dz">Algeria</option>
                                                    <option value="ar">Argentina</option>
                                                    <option value="au">Australia</option>
                                                    <option value="bd">Bangladesh</option>
                                                    <option value="br">Brazil</option>
                                                    <option value="cm">Cameroon</option>
                                                    <option value="ca">Canada</option>
                                                    <option value="co">Colombia</option>
                                                    <option value="dk">Denmark</option>
                                                    <option value="eg">Egypt</option>
                                                    <option value="et">Ethiopia</option>
                                                    <option value="fr">France</option>
                                                    <option value="de">Germany</option>
                                                    <option value="gh">Ghana</option>
                                                    <option value="gr">Greece</option>
                                                    <option value="in">India</option>
                                                    <option value="id">Indonesia</option>
                                                    <option value="iq">Iraq</option>
                                                    <option value="ie">Ireland</option>
                                                    <option value="il">Israel</option>
                                                    <option value="it">Italy</option>
                                                    <option value="jp">Japan</option>
                                                    <option value="ke">Kenya</option>
                                                    <option value="mg">Madagascar</option>
                                                    <option value="my">Malaysia</option>
                                                    <option value="mx">Mexico</option>
                                                    <option value="ma">Morocco</option>
                                                    <option value="mz">Mozambique</option>
                                                    <option value="np">Nepal</option>
                                                    <option value="nl">Netherlands</option>
                                                    <option value="nz">New Zealand</option>
                                                    <option value="ng">Nigeria</option>
                                                    <option value="pk">Pakistan</option>
                                                    <option value="pe">Peru</option>
                                                    <option value="ph">Philippines</option>
                                                    <option value="pl">Poland</option>
                                                    <option value="ro">Romania</option>
                                                    <option value="ru">Russia</option>
                                                    <option value="sa">Saudi Arabia</option>
                                                    <option value="sg">Singapore</option>
                                                    <option value="za">South Africa</option>
                                                    <option value="kr">South Korea</option>
                                                    <option value="es">Spain</option>
                                                    <option value="lk">Sri Lanka</option>
                                                    <option value="se">Sweden</option>
                                                    <option value="ch">Switzerland</option>
                                                    <option value="tw">Taiwan</option>
                                                    <option value="tz">Tanzania</option>
                                                    <option value="th">Thailand</option>
                                                    <option value="tr">Turkey</option>
                                                    <option value="ug">Uganda</option>
                                                    <option value="ua">Ukraine</option>
                                                    <option value="gb">United Kingdom</option>
                                                    <option value="us">United States</option>
                                                    <option value="uz">Uzbekistan</option>
                                                    <option value="ve">Venezuela</option>
                                                    <option value="vn">Vietnam</option>
                                                    <option value="ye">Yemen</option>
                                                </select>
                                                <p class="help-block">Select your country. This setting is saved to this browser.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Media</label>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span class="checkbox custom-checkbox">
                                                            <input type="checkbox" name="customcheckbox1" id="customcheckbox1">
                                                            <label for="customcheckbox1">&nbsp;&nbsp;You will see all photos or videos even if they contain sensitive media.</label>
                                                        </span>
                                                        <p class="help-block">You will see all photos or videos even if they contain sensitive media.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span class="checkbox custom-checkbox">
                                                            <input type="checkbox" name="customcheckbox2" id="customcheckbox2">
                                                            <label for="customcheckbox2">&nbsp;&nbsp;Mark media containing material that may be sensitive</label>
                                                        </span>
                                                        <p class="help-block">Please check this box so that users can be informed prior to viewing.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <button type="submit" class="btn btn-primary">Save change</button>
                                    </div>
                                </form>
                                <!--/ form account -->
                            </div>
                            <!--/ tab-pane: account -->

                            <!-- tab-pane: security -->
                            <div class="tab-pane" id="security">
                                <!-- form security -->
                                <form class="panel form-horizontal form-bordered" name="form-security">
                                    <div class="panel-body pt0 pb0">
                                        <div class="form-group header bgcolor-default">
                                            <div class="col-md-12">
                                                <h4 class="semibold text-primary mt0 mb5">Security</h4>
                                                <p class="text-default nm">Change your security settings.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Login verification</label>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span class="radio custom-radio">
                                                            <input type="radio" name="loginverification" id="loginverification1">
                                                            <label for="loginverification1">&nbsp;&nbsp;Send login verification requests to my phone</label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span class="radio custom-radio">
                                                            <input type="radio" name="loginverification" id="loginverification2">
                                                            <label for="loginverification2">&nbsp;&nbsp;Send login verification requests to my phone</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password reset</label>
                                            <div class="col-sm-9">
                                                <span class="checkbox custom-checkbox">
                                                    <input type="checkbox" name="passwordreset" id="passwordreset">
                                                    <label for="passwordreset">&nbsp;&nbsp;Require personal information to reset my password</label>
                                                </span>
                                                <p class="help-block">By default, you can initiate a password reset by entering only your @username. If you check this box, you will be prompted to enter your email address or phone number if you forget your password.</p>
                                            </div>
                                        </div>
                                        <div class="form-group header bgcolor-default">
                                            <div class="col-md-12">
                                                <h4 class="semibold text-primary mt0 mb5">Privacy</h4>
                                                <p class="text-default nm">Change your privacy settings.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Photo tagging</label>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span class="radio custom-radio">
                                                            <input type="radio" name="phototagging" id="phototagging1">
                                                            <label for="phototagging1">&nbsp;&nbsp;Allow anyone to tag me in photos</label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span class="radio custom-radio">
                                                            <input type="radio" name="phototagging" id="phototagging2">
                                                            <label for="phototagging2">&nbsp;&nbsp;Only allow people I follow to tag me in photos</label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span class="radio custom-radio">
                                                            <input type="radio" name="phototagging" id="phototagging3">
                                                            <label for="phototagging3">&nbsp;&nbsp;Do not allow anyone to tag me in photos</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Discoverability</label>
                                            <div class="col-sm-9">
                                                <span class="checkbox custom-checkbox">
                                                    <input type="checkbox" name="discoverability" id="discoverability">
                                                    <label for="discoverability">&nbsp;&nbsp;Let others find me by my email address</label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Personalization</label>
                                            <div class="col-sm-9">
                                                <span class="checkbox custom-checkbox">
                                                    <input type="checkbox" name="personalization" id="personalization">
                                                    <label for="personalization">&nbsp;&nbsp;Tailor content based on my recent website visits</label>
                                                </span>
                                                <p class="help-block"><a href="javascript:void(0);">Learn more</a> about how this works and your additional privacy controls.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Promoted content</label>
                                            <div class="col-sm-9">
                                                <span class="checkbox custom-checkbox">
                                                    <input type="checkbox" name="ads" id="ads">
                                                    <label for="ads">&nbsp;&nbsp;Tailor ads based on information shared by ad partners.</label>
                                                </span>
                                                <p class="help-block"><a href="javascript:void(0);">Learn more</a> about how this works and your additional privacy controls.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <button type="submit" class="btn btn-primary">Save change</button>
                                    </div>
                                </form>
                            </div>
                            <!--/ tab-pane: security -->

                            <!-- tab-pane: password -->
                            <div class="tab-pane" id="password">
                                <!-- form password -->
                                <form class="panel form-horizontal form-bordered" name="form-password">
                                    <div class="panel-body pt0 pb0">
                                        <div class="form-group header bgcolor-default">
                                            <div class="col-md-12">
                                                <h4 class="semibold text-primary mt0 mb5">Password</h4>
                                                <p class="text-default nm">Change your password or recover your current one.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Current password</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="currentpass">
                                                <p class="help-block"><a href="javascript:void(0);">Forgot password?</a></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">New password</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="newpass">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Verify password</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="verifypass">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <button type="submit" class="btn btn-primary">Save change</button>
                                    </div>
                                </form>
                            </div>
                            <!--/ tab-pane: password -->
                        </div>
                        <!--/ END Tab-content -->
                    </div>
                    <!--/ Left / Bottom Side -->
                </div>
                <!--/ END row -->
            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
