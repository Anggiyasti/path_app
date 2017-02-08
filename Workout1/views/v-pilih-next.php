<style type="text/css">
    @import url('http://fonts.googleapis.com/css?family=Lato');


/*.container ul{
  list-style: none;
  height: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden;
}*/




input[type="radio"] {
  display: none;
}

input[type="radio"] + label {
  background-image: url("https://developer.tizen.org/sites/default/files/images/5.3.2.d.png");
  background-position: -169px -31px;
  background-repeat: no-repeat;
  display: block;
  height: 37px;
  width: 37px;
}

input[type="radio"]:checked + label {
  background-position: -44px -31px;
}

label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 1.35em;
  padding: 0px 25px 25px 50px;
  margin: 0 auto;
  height: 10px;
}

.baru {
    float: left; padding-right: 50px;
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
                        <a href="" class="view-all-accent-btn">Step 2</a>
                    </div> -->
                        <form action="<?= base_url() ?>index.php/workout1/start" method="post">
                            <input type="text" name="id_bab" value="<?=$bab ?>" hidden="true">
                            <div>
                                <h3 class="item-title">Tingkat Kesulitan</h3>
                            </div>
                            <div>
                                <div class="baru">
                                    <input type="radio" id="1-option" name="kesulitan" value="1" checked>
                                    <label for="1-option">Mudah</label>
                                </div>

                                <div class="baru">        
                                    <input type="radio" id="2-option" name="kesulitan" value="2">
                                    <label for="2-option">Sedang</label>
                                </div>

                                <div class="baru">
                                    <input type="radio" id="3-option" name="kesulitan" value="3"s>
                                    <label for="3-option">Sulit</label>
                                </div>
                                        
                            </div>
                            <div style="clear:both"></div>
                            <br>
                            <div>
                                <h3 class="item-title">Jumlah Soal</h3>
                            </div>

                            <div class="baru">
                                <input type="radio" name="jumlahsoal" value="5" id="radio12344" checked="">
                                <label for="radio12344">5</label>
                            </div>
                            <div class="baru">
                                <input type="radio" name="jumlahsoal" value="10" id="radio12345">
                                <label for="radio12345">10</label>
                            </div>
                            <div class="baru">
                                <input type="radio" name="jumlahsoal" value="15" id="radio12346">
                                <label for="radio12346">15</label>
                            </div>
                                
                            <br>
                            <div class="news-btn-holder" style="float: right;">
                                <input type="submit" name="" value="Go" class="view-all-accent-btn">
                            </div>
                            
                        </form>                     
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