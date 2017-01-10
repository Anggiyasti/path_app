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
                            <li><a href="<?php echo base_url('index.php/login/logout_guru')?>"><span class="icon"><i class="ico-exit"></i></span> Sign Out</a></li>
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
                            <li class="list-group-item"><a href="#account" data-toggle="tab"><i class="ico-archive2 mr5"></i> ubah Password</a></li>
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
                                <form class="panel form-horizontal form-bordered" name="form-account" action="<?=base_url()?>index.php/guru/ubahkatasandi">
                                    <div class="panel-body pt0 pb0">
                                        <div class="form-group header bgcolor-default">
                                            <div class="col-md-12">
                                                <h4 class="semibold text-primary mt0 mb5">Password Lama</h4>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">ID Guru</label>
                                            <div class="col-sm-5">
                                                <input class="form-control" name="id_guru" type="text" value="<?=$id_guru; ?>" />
                                            <span class="text-danger"><?php echo form_error('id_guru'); ?></span>
                                                <p class="help-block">Enter your real name.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">Password</label>
                                            <div class="col-sm-5">
                                                <input type="password" name="" class="form-control">
                                           
                                                <p class="help-block">Have a homepage or a blog? Put the address here.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group header bgcolor-default">
                                            <div class="col-md-12">
                                                <h4 class="semibold text-primary mt0 mb5">Password Baru</h4>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">Password Baru</label>
                                            <div class="col-sm-5">
                                                <input type="password" name="password" class="form-control">
                                           
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">Ulangi Password</label>
                                            <div class="col-sm-5">
                                                <input type="password" name="password2" class="form-control" id="password2" name="password_conf"  required onkeyup="checkPass(); return false;">
                                               
                                           
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="panel-footer">
                                    <input type="hidden" name="id_guru" value="<?=$id_guru;?>">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <input type="submit" class="btn" name="update"  value="Update" class="btn btn-primary">
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

<script type="text/javascript">

    function checkPass() {

        //Store the password field objects into variables ...

        var pass1 = document.getElementById('password');

        var pass2 = document.getElementById('password2');

        //Store the Confimation Message Object ...

        var message = document.getElementById('confirmMessage');

        //Set the colors we will be using ...

        var goodColor = "#66cc66";

        var badColor = "#ff6666";

        var blank = "#fff"

        //Compare the values in the password field

        //and the confirmation field



        if (pass2.value == "") {

            message.style.color = blank;

            message.innerHTML = ""

        } else if (pass1.value == pass2.value) {

            //The passwords match.

            //Set the color to the good color and inform

            //the user that they have entered the correct password

            message.style.color = goodColor;

            message.innerHTML = "Passwords Cocok!"

        } else {

            //The passwords do not match.

            //Set the color to the bad color and

            //notify the user.

            message.style.color = badColor;

            message.innerHTML = "Passwords Tidak Cocok!"

        }

    }



</script>