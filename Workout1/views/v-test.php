<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<title>Epsilon 7.0</title>
    
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/minibar/dark/styles/style.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/minibar/dark/styles/skin.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/minibar/dark/styles/framework.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/minibar/dark/styles/ionicons.min.css')?>">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


<script type="text/javascript" src="<?php echo base_url('assets/minibar/dark/scripts/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/minibar/dark/scripts/plugins.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/minibar/dark/scripts/custom.js')?>"></script>

<style>
    .pager li > a, .pager li > span{
        display: inline-block;
        padding: 5px 14px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 0px;
        margin: 5px;
    }

    #jwb_sisJ {
        border-radius: 12px;
        /*background: #fff;*/
        padding: 2px 4px 2px 4px; 
        width: 20px;
        height: 20px;
        color : #06C;
        font-size: 12px;
        text-align: center;
        text-decoration: none;
        border: 1px solid #63d3e9; 
        margin-left: 27px;
        margin-top: 4px;
    }

    #flex-item {
        float:left;
        width: 48px;
        height: 48px;
        /*margin: 1px;*/
        padding: 2px;
        margin-top: 12px; 

    }


    #lihatStatus{
        /*position: fixed;*/
        /*top: 0;*/
        /*left: 10px;*/
        /*z-index: 99;*/
        /*border-bottom: 1px solid #ddd;*/
        min-width: 10%;
        /*padding: 9px;*/
        /*background-color: #fff;*/
        /*border: 1px solid #555;*/
    }
    #lihat{
        margin: 5px;
    }
    #kotak{
        width: 30px;
        height: 30px;
        border: 1px solid aqua;
        margin: 5px;
        float: left;
        padding: 5px;
        /*position: absolute;*/
    }
</style>


</head>

    <script src="<?= base_url('assets/js/bjqs-1.10.js') ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#my-slideshow').bjqs({
//                'height': 400,
                // 'width': 600,
                // 'responsive': false
            });
        });
    </script>
<div class="header header-dark">
    <div class="row">
    <!--<div class="text-center"><h4>Lembar Jawaban</h4></div>-->
        <div class="text-center"> 
        	<h4><span class="color-red-dark" id="timer"></span></h4>
        </div>
        <input type="text" hidden="true" id="durasi" value="" name="durasi" />
    </div>
    <a href="#" class="header-icon header-icon-1 close-sidebar-mask"></a>
    <a href="#" class="header-icon header-icon-1 open-sidebar" disabled>
        <em class="line-1"></em>
        <em class="line-2"></em>
        <em class="line-3"></em>    
    </a>
    <a href="#" class="header-icon header-icon-4"><i class="ion-ios-email-outline"></i></a>
    <div class="row">
    <!--<div class="text-center"><h4>Lembar Jawaban</h4></div>-->
        <div class="text-center"> 
        	<h4><span class="color-red-dark" id="timer"></span></h4>
        </div>
        <input type="text" hidden="true" id="durasi" value="" name="durasi" />
    </div>
</div>

<!-- Main Small Icon Sidebar -->
<div class="sidebar-menu sidebar-dark">
    <div class="sidebar-menu-scroll">
        <a class="current-menu" href="<?= base_url('index.php/Login/cek_login_siswa') ?>""><i class="ion-ios-star-outline"></i><em>Welcome</em></a>       
        <a data-submenus="sub1" href="#"><i class="ion-ios-home-outline"></i><em>User</em></a>       
        <a data-submenus="sub2" href="#"><i class="ion-ios-gear-outline"></i><em>Workout</em></a>      
        <a data-submenus="sub3" href="#"><i class="ion-ios-camera-outline"></i><em>Report</em></a>       
    </div>
</div>
<!-- Home Submenus -->
<div class="submenu submenu-dark" id="sub1">
    <div class="submenu-scroll">
        <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>User Setting</em></a>        
        <a href="index.html"><i class="ion-ios-star-outline"></i><em>Logout</em></a>         
    </div>
</div>
<!-- Features Submenus -->
<div class="submenu submenu-dark" id="sub2">
    <div class="submenu-scroll">
        <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>Workout</em></a>          
    </div>
</div>    
<!-- Gallery Submenus -->    
<div class="submenu submenu-dark" id="sub3">
    <div class="submenu-scroll">
        <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>Report</em></a>         
    </div>
</div>    

<div id="page-content" class="header-clear-large">
    <div id="page-content-scroll"><!--Enables this element to be scrolled -->
        <div class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1" style="">
                        <!--<div class="clear-fix"></div>-->
                        <form action="<?= base_url('index.php/workout1/cekjawaban') ?>" method="post" id="hasil" onsubmit="return deleteAllCookies('seconds', 'minutes', 'hours')">
                            <div class="col-md-8" style="margin-bottom:30">
                                <row>
                                <?php
                                    $i = 1;
                                    $nosoal = 1;
                                ?>
                                <div id="my-slideshow" style="">
                                     <ul class="bjqs" style="display: block;list-style: none">
                                        <?php foreach ($soal as $key): ?>
                                        <li class="bjqs-slide" style="display: none;">
                                            <div class="">
                                                 <div class="panel panel-default" style="">
                                                    <div class="panel-heading">
                                                           <!-- <h1>Selamat datang</h1> -->
                                                        <div class="row">
                                                           <div class="col-md-6 center"><h4 class=""><h4 class="color-red-dark
                                                           ">ID Soal : <small> <?= $key['judul'] ?></small></h4></div>
                                                           <div class="col-md-2"></div>
                                                           <div class="col-md-4 text-right" style="margin-top:5">
                                                           <a class="btn btn-sm btn-success" onclick="bataljawab('pil[<?= $key['soalid']?>]','<?=$i?>',<?= $key['soalid']?>)">Batal Jawab</a>&nbsp&nbsp&nbsp
                                                           <a href="#" class="btn btn-sm btn-warning" onclick="raguColor(<?= $i ?>)">Ragu Ragu</a></div>
                                                        <!-- </div>
                                                    </div> -->
                                                    <div class="panel-collapse">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-1 text-left">
                                                                    <p><h4><?= $i ?>.</h4></p>
                                                                </div>
                                                                <div class="col-md-11">
                                                                   
                                                                        <h5 class="color-red-dark
                                                           "><?= $key['soal'] ?></h5>
                                                                        <br>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-10 col-md-offset-1">  
                                                                    <?php
                                                                        $k = $key['soalid'];
                                                                        $pilihan = array("A", "B", "C", "D", "E");
                                                                        $indexpil = 0;
                                                                    ?>

                                                                    <?php foreach ($pil as $row): ?>
                                                                        <?php if ($row['pilid'] == $k) { ?>
                                                                            <div class="mb10">
                                                                                <input type="radio" id="<?= $i ?>" value="<?= $row['pilpil'] ?>" name="pil[<?= $row['pilid'] ?>]" onclick="updateColor(<?= $i ?>)">
                                                                                <?php
                                                                                    if (empty($row['pilgam'])) {
                                                                                        echo '';
                                                                                    } else { 
                                                                                ?>
                                                                                <img src="<?= base_url('./assets/image/soal/' . $row['pilgam']) ?>">
                                                                                <?php } ?>
                                                                                <?= $row['piljaw'] ?>
                                                                            </div>
                                                                            <?php
                                                                                } else {
                                                                                    $indexpil = 0;
                                                                                }
                                                                            ?>
                                                                    <?php endforeach ?>
                                                                </div>   
                                                            </div>
                                                        </div>   
                                                    </div>
                                                 </div>
                                            </div>
                                        </li>
                                        <?php
                                        $i++;
                                        $nosoal++;
                                        ?>
                                <?php endforeach; ?>
                                     </ul>
                                </div>
                                    <div class="decoration decoration-margins"></div>
                                        <div class="content">
                                            <button class="button button-green" id="btnPrev">Sebelumnya</button>
                                            <button class="button button-green" id="btnNext">Selanjutnya</button>
                                        </div>
                                    </div>
                            </row>  
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default"  style="min-height:170px;">
                                    <!--panel heading/header--> 
                                    <div class="panel-heading">
                                        <div class="row">
                                            <!--<div class="text-center"><h4>Lembar Jawaban</h4></div>-->
                                            <div class="text-center"> <h4><span class="color-red-dark"id="timer"></span></h4></div>
                                            <input type="text" hidden="true" id="durasi" value="" name="durasi" />
                                        </div>
                                    </div>
                                    <!--/ panel heading/header--> 
                                    <!--panel body with collapse capabale--> 
                                    <div class="panel-collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                            <h1>Hello</h1>
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <!--<li class="pageNumbers"></li>-->
                                                        <div class="ljk" style="margin-top:-20">
                                                        <?php
                                                        $nojwb = 1;
                                                        foreach ($soal as $jwb) {
                                                            ?>
                                                            <div id ="flex-item" >
                                                                <div id ="jwb_sisJ" class ="jwb<?= $nojwb ?>"></div>
                                                                <a href ="#" id ="nom_sisS" class ="go_slide btn" style ="border:1px solid #63d3e9" alt="<?= $nojwb ?>"><?= $nojwb ?></a>
                                                            </div>
                                                            <?php
                                                            $nojwb++;
                                                        }
                                                        ?>
                                                        </div>

                                                    </div>
                                                    <!--</ul>-->  

                                                <div class="clear" style="clear:both"></div>

                                                <div class="col-md-12" style="">
                                                    <hr> 
                                                    <button type="submit" class="btn btn-info btn-block" onclick="return confirm('Yakin sudah selesai mengerjakan latihan?');">Kumpulkan Jawaban</button>
                                                </div>

                                            </div>
                                        </div> 
                                        <!--/ panel body with collapse capabale--> 
                                    </div>
                                    <!--/ END panel--> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>    
 <script>
        function updateColor(id) {
            $(".jwb" + id).html($('input[id="' + id + '"]:checked').val());
            $('a[alt="' + id + '"]').css({"background-color": "#5bc0de", "color": "#fff", "border": "none"});
        }

        function raguColor(id) {
            $('a[alt="' + id + '"]').css({"background-color": "#ffd66a", "color": "#fff", "border": "none"});
        }

        function bataljawab(idsoal,idpil,grouppil){
             clearRadioGroup(idsoal);
             clearpiljaw(idpil,grouppil);
        }

        function clearRadioGroup(GroupName)
        {
          var ele = document.getElementsByName(GroupName);
            for(var i=0;i<ele.length;i++)
            ele[i].checked = false;
        }

        function clearpiljaw(id,groupname){
            $(".jwb" + id).html("");
            $('a[alt="' + id + '"]').css({"background-color": "#fff", "color": "#00b1e1", "border": "1px solid #63d3e9"});
            $('label[alt="' + groupname + '"]').removeClass( "terpilih" );
        }

        function changeColor(pilid,groupname){
            console.log(pilid,groupname);
            $('label[alt="' + groupname + '"]').removeClass( "terpilih" );
            var d = document.getElementById(pilid);
            d.className = "terpilih";
        }
    </script>    