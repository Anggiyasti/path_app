<div class="inner-page-banner-area" style="background-image: url('<?= base_url('./assets/images/g1.jpg') ?>');"  >
                <div class="container" style="height: 50px;">
                    <div class="pagination-area">
                    <div class="sidebar-skilled-area" >
                      <?php foreach ($siswa as $s): ?>
                                            <ul>
                                                <li>
                                              
                                                    <div class="skilled-img">
                                                        <a href="#"><img  src="<?= base_url('./assets/images/siswa/'. $s->photo) ?>" class="profile-img-responsive img-circle" alt="skilled" style="width: 88px; height: 88px;"></a>

                                                    </div>
                                                    <br>
                                                    
                                                   
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <div class="skilled-content">
                                                        <h4 style="color: white; text-transform: uppercase;">&nbsp&nbsp&nbsp&nbsp<?=$this->session->userdata['username'];?></h4>
                                                        <h4 style="color: white; text-transform: uppercase;">&nbsp&nbsp&nbsp&nbsp<?=$s->jur?> - <?=$s->univ?></h4>
                                                    </div>
                                                   
                                                </li>
                                            </ul>
                                             <?php endforeach ?>  
                                            
                                        </div>

                    </div>
                </div>  
            </div> 
<div class="sidebar-box">
    <div class="sidebar-box-inner">
        <h3 class="sidebar-title"><?=$mapel ?></h3>
        <div class="sidebar-course-reviews">
            <div class="skill-area">
                
                <?php if ($c== array()): ?>
    			<h4 align="center">Tidak ada Grafik Workout.</h4>
				<?php else: ?>
   
    			<?php foreach ($c as $key) : 
     			$p = $key['score_grafik'];
    			

     			if ($p == 0) { ?>
                <div class="progress" style="height: 30px; background-color: #FFFF00 ;">
                    <div class="lead"><?=$key['judul_bab'];?></div>
                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft; height: 30px;" data-progress="0" class="progress-bar wow fadeInLeft  animated"></div><span>0%</span>
                </div>
                
        <?php } else {?>
            <div class="progress" style="height: 30px; background-color: #FFFF00 ;">
                <div class="lead"><?=$key['judul_bab'];?></div>
                <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft; height: 30px; background-color: #002147;" data-progress="<?=$p?>" class="progress-bar wow fadeInLeft animated"></div><span><?=$p?>%</span> 
            </div>
                <?php } ?>
        <!-- End Skill Bar -->
        <?php endforeach ?>
   
    <!-- End Skill Bar -->
    <?php endif ?>
                                                
    </div>
</div>
</div>
</div>