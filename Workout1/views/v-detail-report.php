<html>



    <!-- START Head -->

    <head>

        <title>Workout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!-- Mini bar-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/minibar/dark/styles/style.css')?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/minibar/dark/styles/skin.css')?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/minibar/dark/styles/framework.css')?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/minibar/dark/styles/ionicons.min.css')?>">
        <script type="text/javascript" src="<?php echo base_url('assets/minibar/dark/scripts/jquery.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/minibar/dark/scripts/plugins.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/minibar/dark/scripts/custom.js')?>"></script>
    
    </head>

    <body>




<!--     </head> -->
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
        <a class="current-menu" href="<?= base_url('index.php/Login/cek_login_siswa') ?>""><i class="ion-ios-star-outline"></i><em>Welcome</em></a>       
        <a data-submenus="sub1" href="#"><i class="ion-ios-home-outline"></i><em>User</em></a>       
        <a data-submenus="sub2" href="#"><i class="ion-ios-gear-outline"></i><em>Workout</em></a>      
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

<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
        <div class="content">
        <h3>Daftar Report</h3>
            <?php if ($report == array()): ?>
                <h4>Tidak ada Report Latihan.</h4>
            <?php else: ?>
                <?php foreach ($report as $reportitem): ?>
                    <div>Pelajaran &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp<?= $reportitem['nama_mapel'] ?></div>
                    <div>Bab &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp :&nbsp&nbsp&nbsp<?= $reportitem['judul_bab'] ?></div>
                    <div>Level &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp&nbsp
                        <?php if ($reportitem['kesulitan'] = '1') { ?>
                            Mudah
                        <?php } elseif ($reportitem['kesulitan'] = '2') { ?>
                            Sedang
                        <?php } else { ?>
                            Sulit
                        <?php } ?>
                    </div>
                    <div>Tanggal Pengerjaan &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp<?= $reportitem['nama_mapel'] ?></div>
                    <div>Score &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp<?= $reportitem['nama_mapel'] ?></div>
                        
                <?php endforeach ?>

                <div id="chartContainer" style="height: 400px; width: 100%;">

                </div>
               
            <?php endif ?>
         </div>    
    </div>
</div>

<script type="text/javascript">

    window.onload = function() {
                    var data      = <?php echo json_encode($reportitem,JSON_NUMERIC_CHECK);?>;
                    var report = {
                        durasi: 0,
                        level: 0,
                        poin: 0,
                        konstanta: 0,
                        score: 0};



                    //report.durasi = 10;
                    report.jumlah_soal = parseInt(data.jumlahSoal);
                    report.level = parseInt(data.tingkatKesulitan);
                    report.poin = parseInt(data.jmlh_benar);
                    //report.konstanta =  report.durasi * report.jumlah_soal;
                    report.score = data.jmlh_benar;
                    var chart = new CanvasJS.Chart("chartContainer", {
                        title: {
                            text: "Bab : " + data.judul_bab + " - Score : " + report.score
                        },
                        animationEnabled: true,
                        theme: "theme1",
                        backgroundColor: "#2F4F4F",
                        data: [
                            {
                                type: "doughnut",
                                indexLabelFontFamily: "Garamond",
                                indexLabelFontSize: 20,
                                startAngle: 0,
                                indexLabelFontColor: "dimgrey",
                                indexLabelLineColor: "darkgrey",
                                toolTipContent: "Jumlah : {y} ",
                                dataPoints: [
                                    {y: data.jmlh_benar, indexLabel: "Poin {y}"},
                                    {y: data.jmlh_salah, indexLabel: "Salah {y}"},
                                    {y: data.jmlh_kosong, indexLabel: "Kosong {y}"}

                                ]

                            }

                        ]

                    });

                    chart.render();

                }

</script>

            <script src="<?= base_url('assets/plugins/canvasjs.min.js') ?>"></script>
            </body>

