            <!-- Courses 1 Area Start Here -->
            <div class="courses1-area">
                <div class="container">    
                    <h2 class="title-default-left">
                        <?php foreach ($bab as $reportitem): ?>
                            <h3>Mapel : <?= $reportitem['nama_mapel'] ?></h3>
                            <h3>Bab : <?= $reportitem['judul_bab'] ?></h3>
                        <?php endforeach ?>
                    </h2> 
                </div>
                <div id="shadow-carousel" class="container"> 

                    <?php if ($report == array()): ?>
                        <h4>Tidak ada Report Latihan.</h4>
                    <?php else: ?>   
                    <?php foreach ($report as $reportitem): ?> 
                        <div class="media-body">
                            <ul class="course-feature">
                                <li>Time : <?= $reportitem['tgl_pengerjaan'] ?></li>
                                <?php if ($reportitem['kesulitan'] == '1') { ?>
                                    <li>Level : Mudah</li>
                                <?php } elseif ($reportitem['kesulitan'] == '2') { ?>
                                    <li>Level : Sedang</li>
                                <?php } else { ?>
                                    <li>Level : Sulit</li>
                                <?php } ?>
                                <li>Score : <?= $reportitem['score'] ?></li>
                                <li> <a href="<?=base_url()?>index.php/workout1/detailreport/<?=$reportitem['id_latihan'] ?>" class="btn btn-primary title="Lihat Detail"><i class="glyphicon glyphicon-list-alt"></i>Detail</a> <a href="<?=base_url()?>index.php/workout1/create_session_id_pembahasan/<?=$reportitem['id_latihan'] ?>" class="btn btn-primary title="Lihat Detail">Pembahasan</a></li>
                            
                            </ul>
                        </div>
                        <div class="section-divider"></div>
                        <?php endforeach ?>
                    <?php endif ?> 
                </div>  
            
            </div>  
            <!-- Courses 1 Area End Here -->

            <div id="shadow-carousel" class="container">  
                        <div class="course-details-inner">
                            <ul class="course-feature">
                            <?php foreach ($bab as $row): ?>
                                <li><a href="<?=base_url()?>index.php/workout1/reportmapel/<?=$row['id_bab'] ?>" class="animated fadeIn delay-100"><?=$row['judul_bab'] ?></a></li>
                            <?php endforeach ?>
                            </ul>
                        </div> 
                </div>  
            
            <!-- Footer Area Start Here -->
            <footer>
                <div class="footer-area-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="footer-box">
                                    <a href="index.html"><img class="img-responsive" src="img/logo-footer.png" alt="logo"></a>
                                    <div class="footer-about">
                                        <p>Praesent vel rutrum purus. Nam vel dui eu sus duis dignissim dignissim. Suspenetey disse at ros tecongueconsequat.Fusce sit amet rna feugiat.</p>
                                    </div>
                                    <ul class="footer-social">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="footer-box">
                                    <h3>Featured Links</h3>
                                    <ul class="featured-links">
                                        <li>
                                            <ul>
                                                <li><a href="#">Graduation</a></li>
                                                <li><a href="#">Admissions</a></li>
                                                <li><a href="#">International</a></li>
                                                <li><a href="#">FAQs</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li><a href="#">Courses</a></li>
                                                <li><a href="#">About Us</a></li>
                                                <li><a href="#">Book store</a></li>
                                                <li><a href="#">Alumni</a></li>
                                            </ul>
                                        </li>
                                    </ul>                             
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="footer-box">
                                    <h3>Information</h3>
                                    <ul class="corporate-address">
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Phone(01)800433633"> (01) 800 433 633 </a></li>
                                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i>info@bostonea.com</li>
                                    </ul>
                                    <div class="newsletter-area">
                                        <h3>Newsletter</h3>
                                        <div class="input-group stylish-input-group">
                                            <input type="text" placeholder="Enter your e-mail here" class="form-control">
                                            <span class="input-group-addon">
                                                <button type="submit">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                </button>  
                                            </span>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="footer-box">
                                    <h3>Flickr Photos</h3>
                                    <ul class="flickr-photos">
                                        <li><a href="#"><img class="img-responsive" src="img/footer/1.jpg" alt="flickr"></a></li>
                                        <li><a href="#"><img class="img-responsive" src="img/footer/2.jpg" alt="flickr"></a></li>
                                        <li><a href="#"><img class="img-responsive" src="img/footer/3.jpg" alt="flickr"></a></li>
                                        <li><a href="#"><img class="img-responsive" src="img/footer/4.jpg" alt="flickr"></a></li>
                                        <li><a href="#"><img class="img-responsive" src="img/footer/5.jpg" alt="flickr"></a></li>           
                                        <li><a href="#"><img class="img-responsive" src="img/footer/6.jpg" alt="flickr"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-area-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <p>&copy; 2017 Academics All Rights Reserved. &nbsp; Designed by<a target="_blank" href="http://radiustheme.com"> RadiusTheme</a></p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="payment-method">
                                    <li><a href="#"><img alt="payment-method" src="img/payment-method1.jpg"></a></li>
                                    <li><a href="#"><img alt="payment-method" src="img/payment-method2.jpg"></a></li>
                                    <li><a href="#"><img alt="payment-method" src="img/payment-method3.jpg"></a></li>
                                    <li><a href="#"><img alt="payment-method" src="img/payment-method4.jpg"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer Area End Here -->
        </div>
        <!-- Main Body Area End Here -->
        