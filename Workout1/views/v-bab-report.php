            <!-- Courses 1 Area Start Here -->
            <div class="courses1-area">
                <div class="container">    
                    <h2 class="title-default-left">Report - Bab</h2> 
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
                        <div class="course-details-inner">
                            <ul class="course-feature">
                            <?php if ($bab == array()): ?>
                                <h4>Tidak ada Report.</h4>
                            <?php else: ?>
                            <?php foreach ($bab as $row): ?>
                                <li><a href="<?=base_url()?>index.php/workout1/reportmapel/<?=$row['id_bab'] ?>" class="animated fadeIn delay-100"><?=$row['judul_bab'] ?></a></li>
                            <?php endforeach ?>
                             <?php endif ?>
                            </ul>
                        </div> 
                        </div>                 
                </div>  
            </div>  
            <!-- Courses 1 Area End Here -->
            
        