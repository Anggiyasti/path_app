
<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
    <div class="decoration decoration-margins"></div>
        
    <div class="container">

        <!-- START Row -->

        <div class="row">



            <div class="col-md-12">

                <font color="red"><h3>Daftar Report</h3></font>
 
                <div class="col-md-12">

                    <?php if ($report == array()): ?>

                        <h4>Tidak ada Report Latihan.</h4>

                    <?php else: ?>

                        <table class="table 2" style="font-size: 13px">

                            <thead>

                                <tr>
                                    <th>No </th>
                                    <th>Pelajaran</th>
                                    <th>Bab</th>

                                    <th>Level</th>
                                    <th>Score</th>

                                    <th>Tanggal Pengerjaan</th>

                                    <th width="2%">Detail</th>

                                </tr>

                            </thead>



                            <tbody>

                                <?php 
                                $no = 1;
                                foreach ($report as $reportitem): ?>

                                    <tr>

                                        <td><?php echo $no; ?></td>

                                        <td><?= $reportitem['nama_mapel'] ?></td>

                                        <td><?= $reportitem['judul_bab'] ?></td>

                                        <?php if ($reportitem['kesulitan'] = '1') { ?>
                                            <td>Mudah</td>
                                        <?php } elseif ($reportitem['kesulitan'] = '2') { ?>
                                            <td>Sedang</td>
                                        <?php } else { ?>
                                            <td>Sulit</td>
                                        <?php } ?>

                                        <td><?= $reportitem['score'] ?></td>

                                        <td><?= $reportitem['tgl_pengerjaan'] ?></td>



                                        <td>
                                        <a href="<?=base_url()?>index.php/workout1/detailreport/<?=$reportitem['id_latihan'] ?>" class="btn btn-primary title="Lihat Detail"><i class="glyphicon glyphicon-list-alt"></i>Detail</a>

                                
                                        </td>

                                    </tr>

                                <?php 
                                $no++;
                                endforeach ?>

                            </tbody>

                        </table>

                    <?php endif ?>

                </div>

            </div>










            <!--/ END Blog Content -->



            <!-- START To Top Scroller -->

            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>

            <!--/ END To Top Scroller -->


</div>
</div></div>
            <!--/ END Template Main -->



</body>