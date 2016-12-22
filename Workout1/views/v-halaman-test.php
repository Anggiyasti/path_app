
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

<body class="bgcolor-white">
    <!-- START Template Main -->
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
    <section id="main" role="main">
        <!-- START page header -->
        <section class="page-header page-header-block nm" style="">
            <!-- pattern -->
            <!--/ pattern -->
            <div class="container pt15 pb15">
                <div class="">
                    <div class="page-header-section text-center">
                        <img src="<?= base_url('assets/back/img/logo.png') ?>" width="70px"  alt>
                        <p class="title font-alt">Latihan Online</p>
                    </div>
                </div>
            </div>
        </section>

        <!--/ END page header -->

        <!-- START Register Content -->
        <section class="section bgcolor-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1" style="">
                        <!--<div class="clear-fix"></div>-->
                        <form action="<?= base_url('index.php/tesonline/cekjawaban') ?>" method="post" id="hasil" onsubmit="return deleteAllCookies('seconds', 'minutes', 'hours')">
                            <div class="col-md-8" style="margin-bottom:30">
                                <row>
                                <?php
                                    $i = 1;
                                    $nosoal = 1;
                                ?>
                                <div id="my-slideshow" style="">
                                <!-- hello <?php foreach ($soal as $key) : ?>
                                    <h1><?=$key['soalid'] ?></h1>
                                    <div class="col-md-11">
                                        <h5><?= $key['soal'] ?></h5>
                                        <br>
                                    </div>
                                <?php endforeach; ?> -->
                                     <ul class="bjqs" style="display: block;list-style: none">
                                        <?php foreach ($soal as $key): ?>
                                        <li class="bjqs-slide" style="display: none;">
                                            <div class="">
                                                 <div class="panel panel-default" style="">
                                                    <div class="panel-heading">
                                                           <!-- <h1>Selamat datang</h1> -->
                                                        <div class="row">
                                                           <div class="col-md-6 center"><h4 class=""><h4 class="">ID Soal : <small> <?= $key['judul'] ?></small></h4></div>
                                                           <div class="col-md-2"></div>
                                                           <div class="col-md-4 text-right" style="margin-top:5"><a class="btn btn-sm btn-success" onclick="bataljawab('pil[<?= $key['soalid']?>]','<?=$i?>',<?= $key['soalid']?>)">Batal Jawab</a>&nbsp&nbsp&nbsp<a href="#" class="btn btn-sm btn-warning" onclick="raguColor(<?= $i ?>)">Ragu Ragu</a></div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-collapse">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-1 text-left">
                                                                    <p><h4><?= $i ?>.</h4></p>
                                                                </div>
                                                                <div class="col-md-11">
                                                                   
                                                                        <h5><?= $key['soal'] ?></h5>
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
                                        </l1>
                                        <?php
                                        $i++;
                                        $nosoal++;
                                        ?>
                                <?php endforeach; ?>
                                     </ul>
                                </div>
                                    <div style="margin-left:40">
                                        <div class="col-md-6">
                                            <button class="btn btn-info btn-block" id="btnPrev">Sebelumnya</button>
                                            <!--<button type="button" class="btn btn-primary btn-block">Selanjutnya</button>-->
                                        </div>
                                        <div class="col-md-6"> 
                                            <button class="btn btn-info btn-block" id="btnNext">Selanjutnya</button>
                                            <!--<button type="button" class="btn btn-teal btn-block">Sebelumnya</button>-->
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
                                            <div class="text-center"> <h4><span id="timer"></span></h4></div>
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
        </section>

        <!--/ END Register Content -->

        <!-- START To Top Scroller -->

        <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>

        <!--/ END To Top Scroller -->

    </section>
    <!--/ END Template Main -->
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

    <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery-migrate.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/bootstrap/js/bootstrap.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/library/core/js/core.min.js')?>"></script>
        <!--/ Library script -->

        <!-- App and page level script -->
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/plugins/sparkline/js/jquery.sparkline.min.js')?>"></script><!-- will be use globaly as a summary on sidebar menu -->
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/javascript/app.min.js')?>"></script>
        
        
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/plugins/flot/jquery.flot.min.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/plugins/flot/jquery.flot.categories.min.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/plugins/flot/jquery.flot.resize.min.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/plugins/flot/jquery.flot.spline.min.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/plugins/selectize/js/selectize.min.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/adminre/javascript/pages/dashboard.js')?>"></script>
        
        <!--/ App and page level script -->
         <!-- App and page level script -->
 <script type="text/javascript" src="<?= base_url('assets/adminre/plugins/sparkline/js/jquery.sparkline.min.js') ?>"></script><!-- will be use globaly as a summary on sidebar menu -->
 <script type="text/javascript" src="<?= base_url('assets/adminre/javascript/app.min.js') ?>"></script>

 <!--datatable-->
 <script type="text/javascript" src="<?= base_url('assets/adminre/plugins/datatables/js/jquery.datatables.min.js') ?>"></script>
 <script type="text/javascript" src="<?= base_url('assets/adminre/plugins/datatables/tabletools/js/tabletools.min.js') ?>"></script>
 <!--<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/zeroclipboard.js') ?>"></script>-->
 <script type="text/javascript" src="<?= base_url('assets/adminre/plugins/datatables/js/jquery.datatables-custom.min.js') ?>"></script>
 <script type="text/javascript" src="<?= base_url('assets/adminre/javascript/tables/datatable.js') ?>"></script>
        <!--/ END JAVASCRIPT SECTION -->

        <!-- ini footer -->

<script src="<?php echo base_url(); ?>assets/js/paginga.jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/soal_to.js"></script>

<script type="text/javascript">

    window.onbeforeunload = function () {
        return "Data yang dimasukan akan hilang, yakin keluar dari halaman?";
    };

</script>
    </body>
    <!--/ END Body -->
</html>