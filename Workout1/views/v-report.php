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
        </div>
        <!-- Main Body Area End Here -->
        