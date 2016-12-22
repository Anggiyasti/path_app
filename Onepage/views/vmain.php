<html>
    <head>
        <title>Try Out Online - Cermat Institute</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Kementrian Pendidikan dan Budaya">
        <meta name="author" content="Penaorange">
        <link href="<?php echo base_url($murl . 'css/bootstrap.min.css') ?>" rel="stylesheet">

        <link href="<?php echo base_url($murl . 'font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url($murl . 'font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

        <!-- jQuery (Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url($murl . 'js/jquery.min.js'); ?>"></script>
        <!-- Custom Theme files -->
        <link href="<?php echo base_url($murl . 'home/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <link href="<?php echo base_url($murl . 'home/styles.css'); ?>" rel="stylesheet" type="text/css" media="all" />

        <!--        Favicon
        -->                
        <link rel="shortcut icon" href="<?php echo base_url($murl . 'images/favicon.ico'); ?>" type="image/png">
        <link rel="icon" href="<?php echo base_url($murl . 'images/favicon.ico'); ?>" type="image/png">

    </head>
    <!--<body>-->
    <body onload="myFunction()" style="margin:0;">
        <div id="loader"></div>
        <div id="myDiv" style="" class="animate-bottom">
            <div id="beranda"></div>
            <!-- Navbar -->
            <!-- Add class ".navbar-sticky" to make navbar stuck when it hits the top of the page. You can also use modifier class like: "navbar-light" to change navbar apperance. The screen width at which navbar collapses can be controlled through the variable "$nav-collapse" in sass/variables.scss -->
            <header class="navbar navbar-light navbar-sticky">
                <div class="container">
                    <a href="#" class="site-logo">
                        <img src="<?php echo base_url($murl . 'images/logo-blue.png'); ?>" class="logo-default" alt="KEMENDIKBUD">
                        <img src="<?php echo base_url($murl . 'images/logo-white.png'); ?>" class="logo-alt" alt="KEMENDIKBUD">
                    </a><!-- .site-logo -->

                    <!-- Mobile Menu Toggle -->
                    <div class="nav-toggle"><span></span></div>

                    <div class="clearfix">

                        <div class="toolbar text-right">
                            <a href="#" class="btn btn-sm btn-ghost btn-default">FAQ</a>
                            <a href="<?php echo site_url('Login'); ?>" class="btn btn-sm btn-primary">MASUK</a>
                        </div><!-- .toolbar -->

                        <!-- Use modifier class to apply different submenu (dropdown) animations. Possible options: .submenu-slideUp, .submenu-slideDown, .submenu-flipIn. Please note if no class added to .main-navigation default fadeIn animation will be applied. Note: this is applicable only for Desktop. -->
                        <nav class="main-navigation submenu-flipIn">
                            <ul class="menu">
                                <li class="current"><a href="#beranda">Beranda</a></li>
                                <li class="has-submenu"><a href="#mengapa">Mengapa?</a>
<!--                                    <ul class="submenu">
                                        <li><a target="_blank" href="http://beasiswaunggulan.kemdiknas.go.id/">Beasiswa Unggulan</a></li>
                                        <li><a target="_blank" href="http://darmasiswa.kemdikbud.go.id/darmasiswa/">Darmasiswa</a></li>
                                        <li><a target="_blank" href="http://badanbahasa.kemdikbud.go.id/glosarium/">Glosarium Bahasa Indonesia</a></li>
                                        <li><a target="_blank" href="http://badanbahasa.kemdikbud.go.id/kbbi/">Kamus Besar Bahasa Indonesia (KBBI)</a></li>
                                    </ul>-->
                                </li>
                                <li class="has-submenu"><a href="#daftar">Cara</a>
<!--                                    <ul class="submenu">
                                        <li><a target="_blank" href="http://beasiswaunggulan.kemdiknas.go.id/">Beasiswa Unggulan</a></li>
                                        <li><a target="_blank" href="http://darmasiswa.kemdikbud.go.id/darmasiswa/">Darmasiswa</a></li>
                                        <li><a target="_blank" href="http://badanbahasa.kemdikbud.go.id/glosarium/">Glosarium Bahasa Indonesia</a></li>
                                        <li><a target="_blank" href="http://badanbahasa.kemdikbud.go.id/kbbi/">Kamus Besar Bahasa Indonesia (KBBI)</a></li>
                                    </ul>-->
                                </li>
                                <li class="has-submenu"><a href="#testimonial">Testimoni</a>
<!--                                    <ul class="submenu">
                                        <li><a target="_blank" href="http://beasiswaunggulan.kemdiknas.go.id/">Beasiswa Unggulan</a></li>
                                        <li><a target="_blank" href="http://darmasiswa.kemdikbud.go.id/darmasiswa/">Darmasiswa</a></li>
                                        <li><a target="_blank" href="http://badanbahasa.kemdikbud.go.id/glosarium/">Glosarium Bahasa Indonesia</a></li>
                                        <li><a target="_blank" href="http://badanbahasa.kemdikbud.go.id/kbbi/">Kamus Besar Bahasa Indonesia (KBBI)</a></li>
                                    </ul>-->
                                </li>
                            </ul>
                        </nav><!-- .main-navigation -->
                    </div><!-- .clearfix -->
                </div><!-- .container -->
            </header><!-- .navbar -->

            <!-- Device Slider -->
            <section class="device-slider">
    <!--            <span class="angle"></span>-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 padding-top mobile-center">
                            <div class="block-title light-skin">
                                <h3 style="text-align: left">Try Out SNMPTN Online</h3>
                            </div>
                            <p class="text-light" style="text-align: left">
                                Quisque libero metus, viverra ut sapien vitae, 
                                accumsan posuere lacus. Donec est felis, aliquam nec eros consectetur, tincidunt egestas ante. 
                                Fusce nec elit a nulla egestas pharetra. Maecenas eu mattis felis.
                                <br>
                                <button type="button" class="btn btn-sm btn-success">Coba Gratis !</button></p>
                            </p>
                        </div>
                        <div class="col-sm-5">
                            <!--<div class="phone-carousel" data-loop="true" data-autoplay="true" data-interval="4000">-->
                            <img src="<?php echo base_url($murl . 'images/TryOut.png'); ?>">
                        </div>
                        <!--                    <div class="col-sm-3">
                                                <div class="phone-carousel" data-loop="true" data-autoplay="true" data-interval="4000">
                                                    <img src="<?php echo base_url($murl . 'views/images/TryOut.png'); ?>" class="phone-mask" alt="Phone">
                                            </div>>-->
                    </div><!-- .row -->
                </div><!-- .container -->
            </section><!-- .device-slider -->
            <div id="mengapa"></div>
                <section class="wrapper-mengapa">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <h5>Mengapa Memilih Try Out Kami?</h5>
                                    <hr>
                                    <!--<i> consectetur adipiscing elit.</i>-->
                                </div><!-- .block-title.featured-title -->
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="kotak">
                                    <img src="<?php echo base_url($murl . 'images/simulasi.png'); ?>" class="phone-mask" alt="Phone">
                                </div>
                                <Strong>Simulasi SNMPTN</Strong>
                                <br>
                                <p style="font-size:12px; text-align:center;">
                                    Quisque libero metus, viverra ut sapien vitae, accumsan posuere lacus.
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <div class="kotak">
                                    <img src="<?php echo base_url($murl . 'images/simulasi.png'); ?>" class="phone-mask" alt="Phone">
                                </div>
                                <Strong>Tolak Ukur</Strong>
                                <br>
                                <p style="font-size:12px; text-align:center;">
                                    Quisque libero metus, viverra ut sapien vitae, accumsan posuere lacus.
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <div class="kotak">
                                    <img src="<?php echo base_url($murl . 'images/simulasi.png'); ?>" class="phone-mask" alt="Phone">
                                </div>
                                <Strong>Soal Terverifikasi</Strong>
                                <br>
                                <p style="font-size:12px; text-align:center;">
                                    Quisque libero metus, viverra ut sapien vitae, accumsan posuere lacus.
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <div class="kotak">
                                    <img src="<?php echo base_url($murl . 'images/simulasi.png'); ?>" class="phone-mask" alt="Phone">
                                </div>
                               <Strong>Fleksibel</Strong>
                                <br>
                                <p style="font-size:12px; text-align:center;">
                                    Quisque libero metus, viverra ut sapien vitae, accumsan posuere lacus.
                                </p>
                            </div>
                        </div>
                    </div>
                </section> 
            <section class="wrapper-lulus">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div style="text-align: center">
                                <p><b>Lulus Seleksi Nasional Masuk Perguruan Tinggi Negeri bersama Cermat Institute!</b>
                                    <button type="button" class="btn btn-sm btn-warning">Daftar</button></p>
                                   <!--<i> consectetur adipiscing elit.</i>-->
                            </div><!-- .block-title.featured-title -->
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </section>
            <div id="daftar"></div>
            <section class="fw-section parallax-bg padding-top-3x padding-bottom-3x" style="background-image: url(<?php echo base_url($murl . 'images/4.jpg'); ?>);">
                <span class="overlay" style="opacity: .77;"></span>
                <div class="container">
                    <div class="clients-carousel space-bottom-3x">
                        <div class="row space-bottom">
                            <div class="col-md-12">
                                <h3 class="text-light">Cara Pendaftaran</h3>
                            </div>
                            <div class="col-md-4"></div>
                        </div><!-- .row -->
                    </div><!-- .clients-carousel -->
                </div><!-- .container -->
            </section><!-- .fw-section.parallax-bg -->
            <div id="testimonial"></div>
            <section class="fw-section gray-bg angle-top mobile-center">
                <div class="container padding-top-3x padding-bottom-3x">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Block Title -->
                            <!-- Use modifier classes: ".featured-title" - to enable fancy animation on hover; ".text-center" and "text-right" - for title alignment. Apply ".light-skin" class for changing appearance. -->
                            <div class="double-strike">
                               <h5>Testimonial <br> Try Out Cermat Institute</h5>
                                <hr>
                            </div><!-- .block-title.featured-title -->
                        </div><!-- .col-lg-9.col-md-10 -->
                    </div><!-- .row -->

                    <!-- Features -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="testi"> 
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <br>

                            <div class="testi-detail" style="text-align:left; border-left:4px solid gray; padding-left:15px;">
                                <p style="font-size:13px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Integer<b> condimentum ante mauris.</b>
                                </p> 

                            </div>

                            <div class="mar-b20 bordered full-rounded">
                                <img class="img-circle" src="<?php echo base_url($murl . 'images/male.png'); ?>" alt="image"/>
                            </div>
                            <br>
                            <p style="font-size:13px;"><b>Nama Orang</b></p>                            
                        </div>
                       <div class="col-md-4">
                            <div class="testi"> 
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <br>

                            <div class="testi-detail" style="text-align:left; border-left:4px solid gray; padding-left:15px;">
                                <p style="font-size:13px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Integer<b> condimentum ante mauris.</b>
                                </p> 

                            </div>

                            <div class="mar-b20 bordered full-rounded">
                                <img class="img-circle" src="<?php echo base_url($murl . 'images/male.png'); ?>" alt="image"/>
                            </div>
                            <br>
                            <p style="font-size:13px;"><b>Nama Orang</b></p>                            
                        </div>
                        <div class="col-md-4">
                            <div class="testi"> 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <br>

                            <div class="testi-detail" style="text-align:left; border-left:4px solid gray; padding-left:15px;">
                                <p style="font-size:13px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Integer<b> condimentum ante mauris.</b>
                                </p> 

                            </div>

                            <div class="mar-b20 bordered full-rounded">
                                <img class="img-circle" src="<?php echo base_url($murl . 'images/male.png'); ?>" alt="image"/>
                            </div>
                            <br>
                            <p style="font-size:13px;"><b>Nama Orang</b></p>                            
                        </div>
                    </div><!-- .row -->


                </div><!-- .container -->
            </section><!-- .fw-section -->
            <section class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 pull-left">
                            <strong>Lebih dekat dengan kami..</strong>
                            <br>
                            <br>
                            <div class="sosmed"><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-2x"></i></a></div>
                            <div class="sosmed"><a href="https://twitter.com/"> <i class="fa fa-twitter fa-2x"></i></a></div>
                            <div class="sosmed"><a href="https://www.instagram.com/"><i class="fa fa-instagram fa-2x"></i></a></div>
                            <div class="sosmed"><a href="https://plus.google.com/"><i class="fa fa-google-plus fa-2x"></i></a></div>
                        
                            <div class="clear"></div>
                        </div>
                        <div class="col-md-7 text-right">
                            <address>
                                <strong>Cermat Institute</strong><br>
                                Jalan Cikole Dalam, No 27<br>
                                Kota Sukabumi, 43113<br>
                                <abbr title="Phone">P:</abbr> (+62) 85723294808
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="col-md-12 pull-left">
                            <p class="text-muted">
                                Designed and built with all the love <b>because Allah</b> by <b>@Penaorange.</b>
                                <br>
                                Copyright © 2015 <b>Cermat Institute</b>. All Rights Reserved. 
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script>
            var myVar;

            function myFunction() {
                myVar = setTimeout(showPage, 1500);
            }

            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
            }

            $(document).ready(function () {
                $('a[href^="#"]').on('click', function (e) {
                    e.preventDefault();

                    var target = this.hash;
                    var $target = $(target);

                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top
                    }, 900, 'swing', function () {
                        window.location.hash = target;
                    });

                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top
                    }, 900, 'swing');
                });
            });


        </script>

        <script src="<?php echo base_url($murl . 'js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url($murl . 'js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url($murl . 'js/scripts.js') ?>"></script>
    </body>
</html>


