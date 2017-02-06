            <!-- Courses 1 Area Start Here -->
            <div class="courses1-area">
                <div class="container">    
                    <h2 class="title-default-left">Path - Bab</h2> 
                </div>
                <div id="shadow-carousel" class="container">   
                        <div class="course-details-inner">
                            <ul class="course-feature">
                            <?php if ($bab == array()): ?>
                                <h4>Tidak ada Report.</h4>
                            <?php else: ?>
                            <?php foreach ($bab as $row): ?>
                                <li><a href="<?=base_url()?>index.php/linetopik/learningline/<?=$row['id_bab'] ?>" class="animated fadeIn delay-100"><?=$row['judul_bab'] ?></a></li>
                            <?php endforeach ?>
                             <?php endif ?>
                            </ul>
                        </div> 
                </div>  
            </div>  
            <!-- Courses 1 Area End Here -->
            
        