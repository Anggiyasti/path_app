
            <!-- Inner Page Banner Area End Here -->           
            <!-- Faq Page Area Start Here -->
            <div class="faq-page-area">
                <div class="container">
                    <div class="row panel-group" id="faq-accordian">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="faq-box-wrapper">
                                <div class="faq-box-item panel panel-default">
                                    <div class="panel-heading ">

                                    <?php $ke=0; ?>
                                    <?php $universitas; ?>
                                    <?php foreach ($data as $univ) : ?>
                                        <?php $universitas=$univ['universitas']; ?>
                                        <?php if ($ke==0): ?>
                                        <div class="panel-title faq-box-title">
                                            <h3>
                                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="faq-box-count"></span><?=$univ['universitas']?>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div aria-expanded="false" id="collapseOne" role="tabpanel" class="panel-collapse collapse " >
                                        <div class="panel-body faq-box-body" >
                                                <?php $ke=1; ?>
                                                <?php elseif($universitas!=$olduniversitas): ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-box-wrapper">
                                <div class="faq-box-item panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title faq-box-title">
                                            <h3>
                                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="faq-box-count"></span><?=$univ['universitas']?>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div aria-expanded="false" id="collapseTwo" role="tabpanel" class="panel-collapse collapse">
                                        <div class="panel-body faq-box-body">
                                        <?php endif ?>
                                        <form action="" method="post">
            <!-- Body Info -->
                                        <a href="" class="dropdown-item" ><i class="ion-ios-book-outline"></i><em><?=$univ['prodi']?>&nbsp&nbsp|&nbsp&nbsp<?=$univ['passinggrade']?>%</em><a href="<?=base_url()?>index.php/siswa/update_siswa/<?=$univ['prodi']?>/<?=$univ['universitas']?>" class="view-all-accent-btn" style="margin-left: 2px;">Set Prodi</a></a>

            <!-- /Body info -->
            
                            </form>
                            <?php $olduniversitas=$universitas; ?>
           <?php endforeach ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>