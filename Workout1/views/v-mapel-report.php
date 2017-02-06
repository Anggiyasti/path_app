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
                    <h2 class="title-default-left">Report - Mata Pelajaran</h2> 
                </div>
                <div id="shadow-carousel" class="container">    
                        <?php foreach ($mapel as $mapelitem): ?>
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                                <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                    <img class="img-responsive" src="<?php echo base_url('assets/main-academics/academics-placeholder/img/course/1.jpg')?>" alt="courses">
                                    <a href="<?=base_url()?>index.php/workout1/pilih_bab_report/<?=$mapelitem['nama_mapel'] ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                                <div class="courses-content-wrapper">
                                    <h3 class="item-title"><a href="<?=base_url()?>index.php/workout1/pilih_bab_report/<?=$mapelitem['nama_mapel'] ?>"><?=$mapelitem['nama_mapel'] ?></a></h3>
                                </div>                            
                            </div>                            
                        </div>
                        <?php endforeach ?>                      
                </div>  
            </div>  
            <!-- Courses 1 Area End Here -->
            
        
        </div>
        <!-- Main Body Area End Here -->
        