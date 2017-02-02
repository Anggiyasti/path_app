<div class="sidebar-box">
                                    <div class="sidebar-box-inner">
                                        <h3 class="sidebar-title"><?=$mapel ?></h3>
                                        <div class="sidebar-course-reviews">
                                           
                                            <div class="skill-area">
                                                <div class="progress">
                                                <?php if ($c== array()): ?>
                    							<h4 align="center">Tidak ada Grafik Workout.</h4>
                							<?php else: ?>
   
    										<?php foreach ($c as $key) : 
     										$p = $key['score_grafik'];
    										$p2 = $key['tot'];

     										if ($p2 == 0) { ?>
                                                    <div class="lead"><?=$key['judul_bab'];?></div>
                                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: 100%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="0" class="progress-bar wow fadeInLeft  animated"></div><span>0%</span>
                                                </div>
                                                <div class="progress">
                                                <?php } else {
    ?>
                                                    <div class="lead"><?=$key['judul_bab'];?></div>
                                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: 80%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="<?=$p?>" class="progress-bar wow fadeInLeft  animated"></div><span><?=$p?>%</span> 
                                                </div>
                                                <?php } ?>
    <!-- End Skill Bar -->
    <?php endforeach ?>
   
    <!-- End Skill Bar -->
    <?php endif ?>
                                                
                                        </div>
                                    </div>