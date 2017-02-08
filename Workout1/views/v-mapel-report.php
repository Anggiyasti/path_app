            <!-- Slider 1 Area Start Here -->               
            <div class="slider1-area overlay-default index1">
                <div class="bend niceties preview-1">
                    <div id="ensign-nivoslider-3" class="slides">   
                        <img src="<?= base_url('./assets/images/g1.jpg') ?>" alt="slider" title="#slider-direction-1"/>
                        <img src="<?= base_url('./assets/images/g2.jpg') ?>" alt="slider" title="#slider-direction-2"/>
                        <img src="<?= base_url('./assets/images/g3.jpg') ?>" alt="slider" title="#slider-direction-3"/>
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
            
              <!-- choose mapel Start Here -->
            <div class="courses1-area">
                <div class="container">    
                   <h2 class="title-default-left">Report - Mata Pelajaran</h2> 
                   
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
                        data-r-x-small="2"
                        data-r-x-small-nav="true"
                        data-r-x-small-dots="false"
                        data-r-x-medium="3"
                        data-r-x-medium-nav="true"
                        data-r-x-medium-dots="false"
                        data-r-small="4"
                        data-r-small-nav="true"
                        data-r-small-dots="false"
                        data-r-medium="4"
                        data-r-medium-nav="true"
                        data-r-medium-dots="false"
                        data-r-large="4"
                        data-r-large-nav="true"
                        data-r-large-dots="false"> 
                        <?php foreach ($mapel as $mapelitem): ?>
                        <div class="courses-box1" style="text-align: center; " >
                            <div class="single-item-wrapper" style="height: 200px;">
                                <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                    <img class="profile-img-responsive img-circle" style="width: 98px; height: 98px;"  src="<?= base_url('./assets/images/mapel/'. $mapelitem['gambar']) ?>" alt="courses">
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
            </div>  
            <!-- choose mapelEnd Here -->

            
        