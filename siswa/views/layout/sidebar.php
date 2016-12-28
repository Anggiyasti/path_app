<body>
<div id="page-transitions">
    
<div class="page-preloader page-preloader-dark">
    <div class="spinner"></div>
</div>
    
<div class="header header-dark">
    <a href="index.html" class="header-logo"><span class="color-red-dark">PATH</span></a>
    <a href="#" class="header-icon header-icon-1 close-sidebar-mask"></a>
    <a href="#" class="header-icon header-icon-1 open-sidebar" disabled>
        <em class="line-1"></em>
        <em class="line-2"></em>
        <em class="line-3"></em>    
    </a>
</div>
    
<!-- Main Small Icon Sidebar -->
<div class="sidebar-menu sidebar-dark">
    <div class="sidebar-menu-scroll">
        <a class="current-menu" href="<?= base_url('index.php/Login/cek_login_siswa') ?>""><i class="ion-ios-star-outline"></i><em>Home</em></a>       
        <a data-submenus="sub1" href="#"><i class="ion-ios-home-outline"></i><em>User</em></a>       
        <a data-submenus="sub2" href="#"><i class="ion-ios-gear-outline"></i><em>Workout</em></a> 
        <a data-submenus="sub2" href="#"><i class="ion-ios-gear-outline"></i><em>PassingGrade</em></a>     
    </div>
</div>
<!-- Home Submenus -->
<div class="submenu submenu-dark" id="sub1">
    <div class="submenu-scroll">
        <a class="close-sidebar" href="<?php echo base_url('index.php/Siswa/Profilesiswa')?>"><i class="ion-ios-close-empty"></i><em>User Setting</em></a>        
        <a href="<?php echo base_url('index.php/Login/logout_siswa')?>"><i class="ion-ios-star-outline"></i><em>Logout</em></a>         
    </div>
</div>
<!-- Features Submenus -->
<div class="submenu submenu-dark" id="sub2">
    <div class="submenu-scroll">
        <a class="close-sidebar" href="<?= base_url('index.php/workout1') ?>"><i class="ion-ios-close-empty"></i><em>Workout</em></a> 
        <a href="<?= base_url('index.php/workout1/pilihreport') ?>"><i class="ion-ios-star-outline"></i><em>Report</em></a>         
    </div>
</div>   
<!-- Home Submenus -->
<div class="submenu submenu-dark" id="sub3">
    <div class="submenu-scroll">
        <a class="close-sidebar" href="<?php echo base_url('index.php/passinggrade/univ')?>"><i class="ion-ios-close-empty"></i><em>Universitas</em></a>        
        <a href="<?php echo base_url('index.php/passinggrade/pilih_prodi')?>"><i class="ion-ios-star-outline"></i><em>Prodi</em></a> 
        <a href="<?php echo base_url('index.php/passinggrade/passing')?>"><i class="ion-ios-star-outline"></i><em>PassGrade</em></a>         
    </div>
</div> 
