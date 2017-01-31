<div class="row">
 <div class="col-md-12">
  <div class="panel panel-default">
   <div class="panel-heading">
    <!-- <h3 class="panel-title">Tambah Learning Topik</h3> -->
    <div class="toolbar">
      <br>
      <!-- TABEL KONTEN 1 . FORM LEARNINGNLINE -->
      <ol class="breadcrumb breadcrumb-transparent nm">
        <li><span><a href="<?=base_url('learningline')?>"><i class="ico-list"></i></a></span></li>

        <!-- <li><span>{tingkat}</span></li> -->
        <li><?=$mapel ?></li>
        <li><?=$bab ?></li>   
        <li class="active"><a href="#"><?=$judul ?></a></li>        

      </ol><br>
    </div>
  </div>
  <div class="panel-body">
    <input type="hidden" name="topikID" value="<?=$topikID?>">
    <input type="hidden" id="oldmp"  value="<?=$mapelID ?>">
    <input type="hidden" id="oldbab"  value="<?=$babID ?>">
    <!-- Start Body modal -->
    <form  class="panel panel-default form-horizontal form-bordered form-topik"  method="post" >
     

   <div  class="form-group">
      <label class="col-sm-3 control-label">Mata Pelajaran</label>
      <div class="col-sm-8">

       <!-- stkt = soal tingkat -->                          
       <select class="form-control" id="pelajaran" id="pelajaran">
         <option>-Pilih Pelajaran-</option>
       </select>
     </div>
   </div>

   <div  class="form-group">
    <label class="col-sm-3 control-label">Bab</label>
    <div class="col-sm-8">
     <select class="form-control" id="bab">

     </select>
   </div>
 </div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Nama Topik</label>
  <div class="col-sm-8">

   <input type="text" class="form-control" name="nama_topik" value="<?=$judul?>">
 </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Urutan</label>
  <div class="col-sm-8">

   <input type="text" class="form-control" name="urutan" value="<?=$urutan ?>">
 </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Status</label>
  <div class="col-sm-8">
   <span class="radio custom-radio-primary">  
    <input type="radio" id="radio1" value="1" name="status"checked>  
    <label for="radio1">&nbsp;&nbsp;Published</label>   
  </span>
  <span class="radio custom-radio-primary">  
    <input type="radio" id="radio2" value="0" name="status">  
    <label for="radio2">&nbsp;&nbsp;Non Published</label>   
  </span>
</div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Deskripsi</label>
  <div class="col-sm-8">
    <textarea class="form-control" name="deskripsi"><?=$deskripsi ?></textarea>
  </div>
</div>

<div class="form-group no-border">
  <label class="col-sm-3 control-label"></label>
  <div class="col-sm-9">
   <a class="btn btn-primary update_topik">Update</a>
   <button type="reset" class="btn btn-danger reset">Reset</button>
 </div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
<!-- TABEL KONTEN 1 . FORM LEARNINGNLINE -->
<script type="text/javascript">

//buat load tingkat

                function loadPelajaran() {

                    jQuery(document).ready(function () {
                        var oldmp = $('#oldmp').val();
                        var pelajaran_id = {"pelajaran_id": $('#pelajaran').val()};

                        var idMapel;

                        $.ajax({

                            type: "POST",
                            dataType: "json",
                            data: pelajaran_id,

                            url: "<?= base_url() ?>index.php/learningline/getPelajaran",

                            success: function (data) {

                                console.log("Data" + data);

                                $('#pelajaran').html('<option value="">-- Pilih Tingkat  --</option>');

                                $.each(data, function (i, data) {

                                 if (data.id==oldmp) {
                                   $('#pelajaran').append("<option value='" + data.id_mapel + "' selected>" + data.nama_mapel + "</option>");
                               } else {
                                $('#pelajaran').append("<option value='" + data.id_mapel + "'>" + data.nama_mapel + "</option>");
                            }

                            return idMapel = data.id_mapel;

                        });

                            }

                        });

                        $('#pelajaran').change(function () {

                            pelajaran_id = {"pelajaran_id": $('#pelajaran').val()};

                            load_bab($('#pelajaran').val());

                        })



                        $('#bab').change(function () {

                            load_sub_bab($('#bab').val());

                        })

                    })

                }

                ;

  // function loadPelajaran(tingkatID) {
  //       var oldmp = $('#oldmp').val();
  //       $.ajax({

  //           type: "POST",
  //           dataType: "json",
  //           data: tingkatID.tingkat_id,

  //           url: "<?php echo base_url() ?>index.php/learningline/getPelajaran/" + tingkatID,

  //           success: function (data) {

  //               $('#pelajaran').html('<option value="">-- Pilih Mata Pelajaran  --</option>');
  //               $.each(data, function (i, data) {
  //                   if (data.id==oldmp) {
  //                     $('#pelajaran').append("<option value='" + data.id + "' selected>" + data.keterangan + "</option>");
  //                   } else {
  //                     $('#pelajaran').append("<option value='" + data.id + "'>" + data.keterangan + "</option>");
  //                   }
                    

  //               });

  //           }

  //       });

  // }

  function load_bab(mapelID) {
        var oldbab = $('#oldbab').val();
        $.ajax({

            type: "POST",
            dataType: "json",
            data: mapelID.pelajaran_id,

            url: "<?php echo base_url() ?>index.php/learningline/getBab/" + mapelID,

            success: function (data) {



                $('#bab').html('<option value="">-- Pilih Bab Pelajaran  --</option>');

                //console.log(data);

                $.each(data, function (i, data) {
                    if (data.id_bab==oldbab) {
                       $('#bab').append("<option value='" + data.id_bab + "' selected>" + data.judul_bab + "</option>");
                    } else {
                       $('#bab').append("<option value='" + data.id_bab + "'>" + data.judul_bab + "</option>");
                    }
                   

                });

            }



        });
  }

  $(document).ready(function () {
  //   $('#tingkat').change(function () {
  //     tingkat_id = {"tingkat_id": $('#tingkat').val()};
  //     loadPelajaran($('#tingkat').val());
  //   })



    $('#pelajaran').change(function () {
      pelajaran_id = {"pelajaran_id": $('#pelajaran').val()};
      load_bab($('#pelajaran').val());
    })

    $('#bab').change(function () {
      bab_id = {"bab_id": $('#bab').val()};
      load_bab($('#bab').val());
    })

    $('#ePelajaran').change(function () {
      var form_data = {
        name: $('#ePelajaran').val()
      };
      $.ajax({
        url: "<?php echo site_url('index.php/learningline/getPelajaran'); ?>",

        type: 'POST',
        dataType: "json",
        data: form_data,
        success: function (msg) {
          var sc = '';
          $.each(msg, function (key, val) {
            sc += '<option value="' + val.id_bab + '">' + val.judul_bab + '</option>';
          });
          $("#ebab option").remove();
          $("#ebab").append(sc);
        }
      });
    });
    });
  


  // function loadTingkat() {

  //   jQuery(document).ready(function () {
  //     var oldtkt = $('#oldtkt').val();
  //     var tingkat_id = {"tingkat_id": $('#tingkat').val()};

  //     var idTingkat;
  //     $.ajax({

  //       type: "POST",
  //       dataType: "json",
  //       data: tingkat_id,

  //       url: "<?= base_url() ?>index.php/videoback/getTingkat",

  //       success: function (data) {


  //         $('#tingkat').html('<option value="">-- Pilih Tingkat  --</option>');

  //         $.each(data, function (i, data) {

  //           if (data.id==oldtkt) {
  //            $('#tingkat').append("<option value='" + data.id + "' selected>" + data.aliasTingkat + "</option>");
  //          } else {
  //           $('#tingkat').append("<option value='" + data.id + "'>" + data.aliasTingkat + "</option>");
  //         }



  //         return idTingkat = data.id;

  //       });

  //       }

  //     });
  //   });
  // }

  loadPelajaran();
  console.log("asd"+$('#oldmp').val());
  // loadPelajaran($('#oldtkt').val());
  load_bab($('#oldmp').val());
  console.log($('#oldmp').val());
</script>