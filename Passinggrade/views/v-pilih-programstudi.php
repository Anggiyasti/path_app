
<div class="sidebar-box">
                                    <div class="sidebar-box-inner">
                                        <h3 class="sidebar-title">Program Studi</h3>
                                        <ul class="sidebar-categories">
                                        <?php foreach ($data as $row): ?>
                                            <li><a href="<?=base_url()?>index.php/passinggrade/prodi/<?=$row['prodi']?>"><?=$row['prodi'];?></a></li>
                                        <?php endforeach ?>  
                                            
                                        </ul>
                                    </div>
                                </div>