    <style type="text/css">
        .chart {
            height: 400px; 
            width: 100%;
            color: green;
        }
    </style>    

<!-- Courses 1 Area Start Here -->
<div class="courses1-area">
    <div class="container">    
        <h2 class="title-default-left">Report Detail</h2> 
    </div>
    <div id="shadow-carousel" class="container">
            <?php if ($report == array()): ?>
                <h4>Tidak ada Report Latihan.</h4>
            <?php else: ?>
                <?php foreach ($report as $reportitem): ?>
                    <div>Pelajaran &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp<?= $reportitem['nama_mapel'] ?></div>
                    <div>Bab &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp :&nbsp&nbsp&nbsp<?= $reportitem['judul_bab'] ?></div>
                    <div>Level &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp
                        <?php if ($reportitem['kesulitan'] == '1') { ?>
                            Mudah
                        <?php } elseif ($reportitem['kesulitan'] == '2') { ?>
                            Sedang
                        <?php } else { ?>
                            Sulit
                        <?php } ?>
                    </div>
                    <div>Tanggal Pengerjaan&nbsp&nbsp:&nbsp&nbsp&nbsp<?= $reportitem['tgl_pengerjaan'] ?></div>
                    <div>Score &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp<?= $reportitem['score'] ?></div>
                        
                <?php endforeach ?>
               
            <?php endif ?>
         </div>    
         <div class="chart">
            <div id="chartContainer">
            </div>
        </div>
    </div>
</div>

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
<script src="<?= base_url('assets/plugins/canvasjs.min.js') ?>"></script>
