
            <!-- Inner Page Banner Area End Here -->           
            <!-- Faq Page Area Start Here -->
            <div class="faq-page-area">
                <div class="container">
                    <div class="row panel-group" id="faq-accordian">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="faq-box-wrapper">
                                <div class="faq-box-item panel panel-default">
                                    <div class="panel-heading ">
                                    <?php foreach ($mapel as $mapelitem): ?>
                                        <div class="panel-title faq-box-title">
                                            <h3>
                                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="<?=base_url()?>index.php/grafikreport/pilih_bab_report/<?=$mapelitem['nama_mapel'] ?>"><span class="faq-box-count"></span><?=$mapelitem['nama_mapel'] ?>
                                                </a>
                                            </h3>
                                        </div>
                                                   <?php endforeach ?>
                                    </div>
                                    <div aria-expanded="false" id="<?=$mapelitem['nama_mapel'] ?>" role="tabpanel" class="panel-collapse collapse " >
                                        <div class="panel-body faq-box-body" >
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
                                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: 0%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="0" class="progress-bar wow fadeInLeft  animated"></div><span>0%</span>
                                                </div>
                                                <div class="progress">
                                                <?php } else {
    ?>
                                                    <div class="lead"><?=$key['judul_bab'];?></div>
                                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: 100%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="<?=$p?>" class="progress-bar wow fadeInLeft  animated"></div><span><?=$p?>%</span> 
                                                </div>
                                                <?php } ?>
    <!-- End Skill Bar -->
    <?php endforeach ?>
   
    <!-- End Skill Bar -->
    <?php endif ?>
                                                
                                        </div>
                                    </div>
                                        abc
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            


                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>