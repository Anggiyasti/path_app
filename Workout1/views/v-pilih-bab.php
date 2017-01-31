        <style type="text/css">
            input[type=radio].css-checkbox {
                display:none;
            }
            .quiz-question-block.qhidden {
                display:none;
            }
            input[type=radio].css-checkbox + label.css-label {
                padding-left:45px;
                height:32px;
                display:inline-block;
                line-height:30px;
                background-repeat:no-repeat;
                background-position: 0 0;
                font-size:20px;
                vertical-align:middle;
                cursor:pointer;
            }
            input[type=radio].css-checkbox:checked + label.css-label {
                background-position: 0 -32px;
            }
            label.css-label {
                background-image:url('http://i.stack.imgur.com/KLQO2.png');
            /*    background-color: #0B0B3B;
                color: white;*/
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
        </style>
<!-- Courses 1 Area Start Here -->
            <div class="courses1-area">
                <div class="container">    
                    <h2 class="title-default-left">Workout - Bab</h2> 
                </div>
                <div id="shadow-carousel" class="container"> 
                    <!-- <div class="news-btn-holder">
                        <a href="" class="view-all-accent-btn">Step 1</a>
                        <a href="<?= base_url() ?>index.php/workout1/next" class="view-all-accent-btn" style="background-color: white; border: 1px solid black; color: black;">Step 2</a>
                    </div> <br> -->  
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
                        <form action="<?= base_url() ?>index.php/workout1/next" method="post">
                            <div>
                                <?php 
                            $i=1;
                            foreach ($bab as $row) { ?>
                                <input type="radio" name="id_bab" id="radio1234<?=$i?>" class="css-checkbox" value="<?=$row['id_bab']?>" checked/>
                                <label for="radio1234<?=$i?>" class="css-label radGroup1"><?php echo $row['judul_bab']; ?></label> <br>
                            <?php  
                            $i++;
                            } 
                           ?>
                            </div><br>
                            <div class="news-btn-holder">
                                <input type="submit" name="" value="Next" class="view-all-accent-btn">
                            </div>
                        </form>                     
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