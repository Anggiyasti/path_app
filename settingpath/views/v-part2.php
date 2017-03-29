
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">


                <!-- Page Header -->
               
                <!-- Page Header -->

                <!-- START row -->

                <!-- Page Header -->
                
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="checkbox custom-checkbox pull-left">  
                        <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Setting Part 2</h3>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>  

<div class="row">
    <div class="col-lg-12">
        <!-- /.panel-default -->
        <div class="panel panel-teal mt10 mb0">
        <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Form Setting Path</h3>
                            </div>
                            <!--/ panel heading/header -->

            <div class="panel-body">
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?=base_url()?>settingpath/tambah_path" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                         <div class="form-group">
                                        <label class="col-sm-2">Mata Pelajaran</label>
                                    <div class="col-sm-5">
                                        <select class='form-control' name="id_mapel" id='id_mapel'>
                                              <option value='0'>--pilih--</option>
                                              <?php 
                                                foreach ($mapel as $pel) {
                                                echo "<option value='$pel[id_mapel]'>$pel[nama_mapel]</option>";
                                                }
                                              ?>
                                            </select>
                                    </div>
                                    </div> 
                                    <div id="msg"></div>
                                    
                                    <div id='id_bab'>
                                        <!-- <input type="text"  class="form-control" name="id_bab1" > -->
                                    <!-- <p name="id_bab" id='id_bab'></p> -->
                                    </div>
                                      <div class="form-group" id="ttt" hidden>
                                        <label class="col-sm-2">Mata Pelajaran</label>
                                    <div class="col-sm-5">
                                        <p>Hello</p>
                                    </div>
                                    </div> 
                                    <!-- <div id="ttt">
                                    </div> -->
                                    <input type="submit" name="sub" value="Coba" id="coba">
                                    </form>
                                    <input type="submit" name="" value="Add TO" id="TO" hidden="true">
                </div>
                <!-- end panel body -->
            <div id="muncul" hidden="true">
            <div class="panel panel-teal mt10 mb0">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">Form Setting Pendalaman</h3>
                </div>
                 <!--/ panel heading/header -->
                 <div class="panel-body">
                    <!-- <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal form-bordered" > -->
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-2">Jumlah TO </label>
                            <div class="col-sm-5">
                                <select class='form-control' name="jmlh_to" id="jmlh_pil" autocomplete="off">
                                    <?php for ($i=1; $i <= 5 ; $i++) { ?>
                                    <option value='<?=$i;?>'><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="panel panel-teal mt10 mb0">

                        <!-- panel heading/header -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Simulasi 1</h3>
                        </div>
                         <!--/ panel heading/header -->
                         <div class="panel-body">
                         <div class="form-horizontal">
                            <!-- form simulasi 1 -->
                            <div id="sim1">
                             <div class="form-group" >
                                <label class="col-sm-2"></label>
                                <div class="col-sm-5">
                                    <input type="text" name="sim1" value="1" hidden="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Level</label>
                                <div class="col-sm-5">
                                    <select class='form-control' name="level1">
                                        <option value='1'>Mudah</option>
                                        <option value='2'>Sedang</option>
                                        <option value='3'>Sulit</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- end form simulasi 1 -->
                        </div>
                        </div>
                    </div>

                    <!-- forn simulasi 2 -->
                     <div class="panel panel-teal mt10 mb0" id="sim2" hidden="true">

                        <!-- panel heading/header -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Simulasi 2</h3>
                        </div>
                         <!--/ panel heading/header -->
                         <div class="panel-body">
                            <div class="form-horizontal">

                                <div>
                                     <div class="form-group">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="sim2" value="2" hidden="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Level</label>
                                        <div class="col-sm-5">
                                            <select class='form-control' name="level2">
                                                <option value='1'>Mudah</option>
                                                <option value='2'>Sedang</option>
                                                <option value='3'>Sulit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- end form simulasi 2 -->

                    <!-- form simulasi 3 -->
                    <div class="panel panel-teal mt10 mb0" id="sim3" hidden="true">

                        <!-- panel heading/header -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Simulasi 3</h3>
                        </div>
                         <!--/ panel heading/header -->
                         <div class="panel-body">
                            <div class="form-horizontal">

                                 <div >
                                     <div class="form-group">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="sim3" value="3" hidden="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Level</label>
                                        <div class="col-sm-5">
                                            <select class='form-control' name="level3">
                                                <option value='1'>Mudah</option>
                                                <option value='2'>Sedang</option>
                                                <option value='3'>Sulit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end form simulasi 3 -->

                    <!-- form simulasi 4 -->
                    <div class="panel panel-teal mt10 mb0" id="sim4" hidden="true">

                        <!-- panel heading/header -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Simulasi 4</h3>
                        </div>
                         <!--/ panel heading/header -->
                         <div class="panel-body">
                            <div class="form-horizontal">

                             <div>
                                 <div class="form-group">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="sim4" value="4" hidden="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2">Level</label>
                                    <div class="col-sm-5">
                                        <select class='form-control' name="level4">
                                            <option value='1'>Mudah</option>
                                            <option value='2'>Sedang</option>
                                            <option value='3'>Sulit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- end form simulasi 4 -->

                    <!-- form simulasi 5 -->
                    <div class="panel panel-teal mt10 mb0" id="sim5" hidden="true">

                        <!-- panel heading/header -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Simulasi 5</h3>
                        </div>
                         <!--/ panel heading/header -->
                         <div class="panel-body">
                            <div class="form-horizontal">

                                 <div>
                                     <div class="form-group">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="sim5" value="5" hidden="true">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2">Level</label>
                                        <div class="col-sm-5">
                                            <select class='form-control' name="level5">
                                                <option value='1'>Mudah</option>
                                                <option value='2'>Sedang</option>
                                                <option value='3'>Sulit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <!-- end form simulasi 5 -->
                    <input type="submit" name="" value="Proses" onclick="tambahsimulasi()">
            </div>
            <!-- </form> -->
            
            </div>
            <!-- end muncul -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
                <!--/ END row -->

              

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
var jmlh_bab1 = $('#jj1').val();
var j1 = $('select[name=jmlh_soal1]').val();
var total1 = parseInt(j1) + parseInt(jmlh_bab1);
console.log(total1);
// untuk get data
    $(function(){

    $.ajaxSetup({
        type:"POST",
        url: "<?php echo base_url('index.php/settingpath/ambil_data2') ?>",
        cache: false,
    });

    $("#id_mapel").change(function(){

        var value=$(this).val();
        if(value>0){
        $.ajax({
            data:{modul:'getbab',id:value},
            success: function(respond){
            $("#id_bab").html(respond);
            $("#TO").show();
        }
        })
    }

    });

})


// untuk tampil jumlah form simulasi
$("#jmlh_pil").click(function(){   
    jmlh_to = $('select[name=jmlh_to]').val();
    // console.log(jmlh_to);
    if (jmlh_to == 1) {
        $('#sim1').show();
        $('#sim2').hide();
        $('#sim3').hide();
        $('#sim4').hide();
        $('#sim5').hide();
    } else if (jmlh_to == 2) {
        $('#sim2').show();
    } else if (jmlh_to == 3) {
        $('#sim2').show();
        $('#sim3').show();
    } else if (jmlh_to == 4) {
        $('#sim2').show();
        $('#sim3').show();
        $('#sim4').show();
    } else if (jmlh_to == 5) {
        $('#sim2').show();
        $('#sim3').show();
        $('#sim4').show();
        $('#sim5').show();
    } 
});

// untuk tambah simulasi 
function tambahsimulasi() {
        id_mapel = $('select[name=id_mapel]').val();
        jmlh = $('input[name=jmlh1]').val();
        jmlh_to = $('select[name=jmlh_to]').val();
        jmlh_soal1 = $('select[name=jmlh_soal1]').val();
        jmlh_soal2 = $('select[name=jmlh_soal2]').val();
        jmlh_soal3 = $('select[name=jmlh_soal3]').val();
        jmlh_soal4 = $('select[name=jmlh_soal4]').val();
        jmlh_soal5 = $('select[name=jmlh_soal5]').val();
        level1 = $('select[name=level1]').val();
        level2 = $('select[name=level2]').val();
        level3 = $('select[name=level3]').val();
        level4 = $('select[name=level4]').val();
        level5 = $('select[name=level5]').val();
        data = {
            id_mapel:id_mapel,
            jmlh_to:jmlh_to,
            jmlh_soal1:jmlh_soal1,
            jmlh_soal2:jmlh_soal2,
            jmlh_soal3:jmlh_soal3,
            jmlh_soal4:jmlh_soal4,
            jmlh_soal5:jmlh_soal5,
            level1:level1,
            level2:level2,
            level3:level3,
            level4:level4,
            level5:level5
        };
        $.ajax({
        url:base_url+"settingpath/tesis",
        data:data,
        type:"POST",
        dataType:"TEXT",
        success:function(){
          swal('Setting Part 2 Berhasil');
          
        },error:function(){
          swal('Setting Part 2 Gagal');
        }
      });
    }

// jika memilih button add TO
$("#TO").click(function(){   
   $('#muncul').show();
});

function valid() {
    for (i = 1; i <= 10; i++) {
    $("#jj"+i).keyup(function (){

    var isTyping1 = $('#jj1').val();
    var isTyping2 = $('#jj2').val();
    var isTyping3 = $('#jj3').val();
    var isTyping4 = $('#jj4').val();
    var isTyping5 = $('#jj5').val();
    var isTyping6 = $('#jj6').val();
    var isTyping7 = $('#jj7').val();
    var isTyping8 = $('#jj8').val();
    var isTyping9 = $('#jj9').val();
    var isTyping10 = $('#jj10').val();

    var bab = $('input[name=jml_bab]').val(); 


        if (isTyping1 == "" ) {
        } else if (isTyping1 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping1 <= bab) {
        } else {
            swal('Salah');
        }

        if (isTyping2 == "" ) {
        } else if (isTyping2 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping2 <= bab) {
        } else {
            swal('Salah');
        }

         if (isTyping3 == "" ) {
        } else if (isTyping3 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping3 <= bab) {

        } else {
            swal('Salah');
        }

         if (isTyping4 == "" ) {
        } else if (isTyping4 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping4 <= bab) {

        } else {
            swal('Salah');
        }

         if (isTyping5 == "" ) {
        } else if (isTyping5 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping5 <= bab) {

        } else {
            swal('Salah');
        }

         if (isTyping6 == "" ) {
        } else if (isTyping6 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping6 <= bab) {

        } else {
            swal('Salah');
        }

         if (isTyping7 == "" ) {
        } else if (isTyping7 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping7 <= bab) {

        } else {
            swal('Salah');
        }

         if (isTyping8 == "" ) {
        } else if (isTyping8 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping8 <= bab) {

        } else {
            swal('Salah');
        }

         if (isTyping9 == "" ) {
        } else if (isTyping9 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping9 <= bab) {

        } else {
            swal('Salah');
        }

         if (isTyping10 == "" ) {
        } else if (isTyping10 <= 0 ) {
             swal('Tidak boleh 0');
        } else if (isTyping10 <= bab) {
        } else {
            swal('Salah');
        }
    });
    }

    // untuk tambah simulasi 
function tambahsetting() {
        id_mapel = $('select[name=id_mapel]').val();
        jmlh = $('input[name=jmlh1]').val();
        jmlh_to = $('select[name=jmlh_to]').val();
        jmlh_soal1 = $('select[name=jmlh_soal1]').val();
        jmlh_soal2 = $('select[name=jmlh_soal2]').val();
        jmlh_soal3 = $('select[name=jmlh_soal3]').val();
        jmlh_soal4 = $('select[name=jmlh_soal4]').val();
        jmlh_soal5 = $('select[name=jmlh_soal5]').val();
        level1 = $('select[name=level1]').val();
        level2 = $('select[name=level2]').val();
        level3 = $('select[name=level3]').val();
        level4 = $('select[name=level4]').val();
        level5 = $('select[name=level5]').val();

        data = {
            id_mapel:id_mapel,
            jmlh_to:jmlh_to,
            jmlh_soal1:jmlh_soal1,
            jmlh_soal2:jmlh_soal2,
            jmlh_soal3:jmlh_soal3,
            jmlh_soal4:jmlh_soal4,
            jmlh_soal5:jmlh_soal5,
            level1:level1,
            level2:level2,
            level3:level3,
            level4:level4,
            level5:level5,

            total1:total1,
            total2:total2,
            total3:total3,
            total4:total4,
            total5:total5,
            total6:total6,
            total7:total7,
            total8:total8,
            total9:total9,
            total10:total10
        };
        $.ajax({
        url:base_url+"settingpah/tambahsimulasi",
        data:data,
        type:"POST",
        dataType:"TEXT",
        success:function(){
          swal('Setting Part 2 Berhasil');
          
        },error:function(){
          swal('Setting Part 2 Gagal');
        }
      });
    }
}

function totalin() {
for (i = 1; i <= 10; i++) {
    $("#jmlh_soal"+i).change(function(){  
        tes = $('select[name=jmlh_soal1]').val();
       var j1 = $('select[name=jmlh_soal1]').val();
       var j2 = $('select[name=jmlh_soal2]').val();
       var j3 = $('select[name=jmlh_soal3]').val();
       var j4 = $('select[name=jmlh_soal4]').val();
       var j5 = $('select[name=jmlh_soal5]').val();
       var j6 = $('select[name=jmlh_soal6]').val();
       var j7 = $('select[name=jmlh_soal7]').val();
       var j8 = $('select[name=jmlh_soal8]').val();
       var j9 = $('select[name=jmlh_soal9]').val();
       var j10 = $('select[name=jmlh_soal10]').val();

       // var untuk jumlah bab 
       var jmlh_bab1 = $('#jj1').val();
       var jmlh_bab2 = $('#jj2').val();
       var jmlh_bab3 = $('#jj3').val();
       var jmlh_bab4 = $('#jj4').val();
       var jmlh_bab5 = $('#jj5').val();
       var jmlh_bab6 = $('#jj6').val();
       var jmlh_bab7 = $('#jj7').val();
       var jmlh_bab8 = $('#jj8').val();
       var jmlh_bab9 = $('#jj9').val();
       var jmlh_bab10 = $('#jj10').val();

       var total1 = parseInt(j1) + parseInt(jmlh_bab1);
       var total2 = parseInt(j2) + parseInt(jmlh_bab2);
       var total3 = parseInt(j3) + parseInt(jmlh_bab3);
       var total4 = parseInt(j4) + parseInt(jmlh_bab4);
       var total5 = parseInt(j5) + parseInt(jmlh_bab5);
       var total6 = parseInt(j6) + parseInt(jmlh_bab6);
       var total7 = parseInt(j7) + parseInt(jmlh_bab7);
       var total8 = parseInt(j8) + parseInt(jmlh_bab8);
       var total9 = parseInt(j9) + parseInt(jmlh_bab9);
       var total10 = parseInt(j10) + parseInt(jmlh_bab10);

            $("#ntotal1").html(total1);
            $("#ntotal2").html(total2);
            $("#ntotal3").html(total3);
            $("#ntotal4").html(total4);
            $("#ntotal5").html(total5);
            $("#ntotal6").html(total6);
            $("#ntotal7").html(total7);
            $("#ntotal8").html(total8);
            $("#ntotal9").html(total9);
            $("#ntotal10").html(total10);

    });
}

}


</script>
