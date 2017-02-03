            <!-- Slider 1 Area Start Here -->               
            <div class="slider1-area overlay-default index1">
                <div class="bend niceties preview-1">
                    <div id="ensign-nivoslider-3" class="slides">   
                        <img src="<?php echo base_url('assets/main-academics/academics-placeholder/img/slider/1-1.jpg')?>" alt="slider" title="#slider-direction-1"/>
                        <img src="<?php echo base_url('assets/main-academics/academics-placeholder/img/slider/1-2.jpg')?>" alt="slider" title="#slider-direction-2"/>
                        <img src="<?php echo base_url('assets/main-academics/academics-placeholder/img/slider/1-3.jpg')?>" alt="slider" title="#slider-direction-3"/>
                    </div>
                    <div id="slider-direction-1" class="t-cn slider-direction">
                        <div class="slider-content s-tb slide-1">
                            <div class="title-container s-tb-c">
                                <h1 class="title1">Best Education For Design</h1>
                                <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard<br>dummy text ever sinceprinting and typesetting industry. </p>
                                <div class="slider-btn-area">
                                    <a href="#" class="default-big-btn">Start a Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="slider-direction-2" class="t-cn slider-direction">
                        <div class="slider-content s-tb slide-2">
                             <div class="title-container s-tb-c">
                                <h1 class="title1">Best Education For HTML Template</h1>
                                <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard<br>dummy text ever sinceprinting and typesetting industry. </p>
                                <div class="slider-btn-area">
                                    <a href="#" class="default-big-btn">Start a Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="slider-direction-3" class="t-cn slider-direction">
                        <div class="slider-content s-tb slide-3">
                             <div class="title-container s-tb-c">
                                <h1 class="title1">Best Education Into PHP</h1>
                                <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard<br>dummy text ever sinceprinting and typesetting industry. </p>
                                <div class="slider-btn-area">
                                    <a href="#" class="default-big-btn">Start a Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- Slider 1 Area End Here -->
            <!-- Service 1 Area Start Here -->
            <div class="service1-area">                                
                <div class="service1-inner-area">                                
                    <div class="container">
                         <div class="row service1-wrapper">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                                <div class="service-box-content">
                                    <h3><a href="#">Scholarship Facility</a></h3>
                                    <p>Eimply dummy text printing ypese tting industry.</p>
                                </div>
                                <div class="service-box-icon">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                                <div class="service-box-content">
                                    <h3><a href="#">Skilled Lecturers</a></h3>
                                    <p>Eimply dummy text printing ypese tting industry.</p>
                                </div>
                                <div class="service-box-icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                                <div class="service-box-content">
                                    <h3><a href="#">Book Library & Store</a></h3>
                                    <p>Eimply dummy text printing ypese tting industry.</p>
                                </div>
                                <div class="service-box-icon">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service 1 Area End Here -->

            <!-- Courses 1 Area Start Here -->
            <div class="courses1-area">
                <div class="container">    
                    <h2 class="title-default-left">Workout - Mata Pelajaran</h2> 
                    <button style="background-color: #00082E;">Hello</button>
                </div>
                <div id="shadow-carousel" class="container">    
                    <div class="rc-carousel"
                        data-loop="true"
                        data-items="4"
                        data-margin="20"
                        data-autoplay="false"
                        data-autoplay-timeout="10000"
                        data-smart-speed="2000"
                        data-dots="false"
                        data-nav="true"
                        data-nav-speed="false"
                        data-r-x-small="1"
                        data-r-x-small-nav="true"
                        data-r-x-small-dots="false"
                        data-r-x-medium="2"
                        data-r-x-medium-nav="true"
                        data-r-x-medium-dots="false"
                        data-r-small="2"
                        data-r-small-nav="true"
                        data-r-small-dots="false"
                        data-r-medium="3"
                        data-r-medium-nav="true"
                        data-r-medium-dots="false"
                        data-r-large="4"
                        data-r-large-nav="true"
                        data-r-large-dots="false"> 
                        <?php foreach ($mapel as $mapelitem): ?>
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                                <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                    <img class="img-responsive" src="<?php echo base_url('assets/main-academics/academics-placeholder/img/course/1.jpg')?>" alt="courses">
                                    <a href="<?=base_url()?>index.php/workout1/pilih_bab/<?=$mapelitem['nama_mapel'] ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                                <div class="courses-content-wrapper">
                                    <h3 class="item-title"><a href="<?=base_url()?>index.php/workout1/pilih_bab/<?=$mapelitem['nama_mapel'] ?>"><?=$mapelitem['nama_mapel'] ?></a></h3>
                                </div>                            
                            </div>                            
                        </div>
                        <?php endforeach ?>                      
                    </div> 
                </div>  
            </div>  
            <!-- Courses 1 Area End Here -->
            
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
        