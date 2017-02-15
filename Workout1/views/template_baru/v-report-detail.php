  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <style type="text/css">
        .chart {
            height: 400px; 
            width: 100%;
            color: green;
        }
    </style>        
      <!-- Page Content -->
      <div id="content" class="page">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Report Workout</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Article Content -->
        <div class="animated fadeinup delay-1">
          <div class="page-content">
            <!-- With Left Icon -->
          <h4 class="p-20">Report Detail</h4>
          <?php if ($report == array()): ?>
            <h3>Tidak ada Report Latihan.</h3>
          <?php else: ?>
          <?php foreach ($report as $reportitem): ?>
            <div class="blog-preview p-20">
              <div class="media-body">
                <ul class="course-feature">
                  <li>Pelajaran : <?= $reportitem['nama_mapel'] ?></li>
                  <li>Bab : <?= $reportitem['judul_bab'] ?></li>
                  <li>Level :
                    <?php if ($reportitem['kesulitan'] == '1') { ?>
                      Mudah
                    <?php } elseif ($reportitem['kesulitan'] == '2') { ?>
                      Sedang
                    <?php } else { ?>
                      Sulit
                    <?php } ?>
                  </li>
                  <li>Tanggal Pengerjaan : <?= $reportitem['tgl_pengerjaan'] ?></li>
                  <li>Score : <?= $reportitem['score'] ?></li>
                </ul>
              </div>
            </div>
          <?php endforeach ?>
          <?php endif ?>
           <div class="chart">
            <div id="chartContainer">
            </div>
        </div>
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->
      <script src="<?= base_url('assets/plugins/canvasjs.min.js') ?>"></script>
<script type="text/javascript">

    window.onload = function() {
                    var data      = <?php echo json_encode($reportitem,JSON_NUMERIC_CHECK);?>;
                    var report = {
                        durasi: 0,
                        level: 0,
                        poin: 0,
                        konstanta: 0,
                        score: 0};



                    //report.durasi = 10;
                    report.jumlah_soal = parseInt(data.jumlahSoal);
                    report.level = parseInt(data.tingkatKesulitan);
                    report.poin = parseInt(data.jmlh_benar);
                    //report.konstanta =  report.durasi * report.jumlah_soal;
                    report.score = data.jmlh_benar;
                    var chart = new CanvasJS.Chart("chartContainer", {
                        title: {
                            fontColor: "black",
                            text: "Bab : " + data.judul_bab + " - Score : " + report.score
                        },
                        animationEnabled: true,
                        theme: "theme1",
                        backgroundColor: "white",
                        data: [
                            {
                                type: "doughnut",
                                indexLabelFontFamily: "Garamond",
                                indexLabelFontSize: 20,
                                startAngle: 0,
                                indexLabelFontColor: "black",
                                indexLabelLineColor: "darkgrey",
                                toolTipContent: "Jumlah : {y} ",
                                dataPoints: [
                                    {y: data.jmlh_benar, indexLabel: "Poin {y}"},
                                    {y: data.jmlh_salah, indexLabel: "Salah {y}"},
                                    {y: data.jmlh_kosong, indexLabel: "Kosong {y}"}

                                ]

                            }

                        ]

                    });

                    chart.render();

                }

</script>


