<script>
/*## -------------------------------LOAD TINGKAT DAN KAWAN KAWAN-------------------------------##*/
load_pelajaran();


function load_pelajaran() {
 jQuery(document).ready(function () {
  var idMapel;

  $.ajax({
   type: "POST",
   url: "<?= base_url() ?>index.php/learningline/getPelajaran",
   success: function (data) {
    $('select[name=select_mapel]').html('<option value="">-- Pilih Pelajaran  --</option>');
    $.each(data, function (i, data) {
     $('select[name=select_mapel]').append("<option value='" + data.id_mapel + "'>" + data.nama_mapel + "</option>");
     return idMapel = data.id_mapel;
   });
  }
});

  /*## -------------------------------SALAT SELECT DIPILIH-------------------------------##*/
 //  $('select[name=select_tingkat]').change(function () {
 //   tingkat_id = $('select[name=select_tingkat]').val();
 //   load_pelajaran(tingkat_id);
 // });


  $('select[name=select_mapel]').change(function () {
   pelajaran_id = $('select[name=select_mapel]').val()
   load_bab(pelajaran_id);
 });
  /*## -------------------------------SALAT SELECT DIPILIH-------------------------------##*/

});

};

/*## -------------------------------LOAD PELAJARAN-------------------------------##*/
// function load_pelajaran(tingkatID) {
//   $.ajax({
//     type: "POST",
//     url: "<?php echo base_url() ?>index.php/learningline/getPelajaran/" + tingkatID,
//     success: function (data) {
//      $('select[name=select_mapel]').html('<option value="">-- Pilih Mata Pelajaran  --</option>');
//      $.each(data, function (i, data) {
//       $('select[name=select_mapel]').append("<option value='" + data.id + "'>" + data.keterangan + "</option>");
//     });
//    }
//  });
// }
/*## -------------------------------LOAD PELAJARAN-------------------------------##*/


/*## -------------------------------LOAD BAB-------------------------------##*/
// load bab 
function load_bab(mapelID) {
  $.ajax({
    type: "POST",
    url: "<?php echo base_url() ?>index.php/learningline/getBab/" + mapelID,
    success: function (data) {
     $('select[name=select_bab]').html('<option value="">-- Pilih Bab Pelajaran  --</option>');
     $.each(data, function (i, data) {
      $('select[name=select_bab]').append("<option value='" + data.id_bab + "'>" + data.judul_bab + "</option>");
    });
   }
 });
}
/*## -------------------------------LOAD BAB-------------------------------##*/

/*## #########################LOAD TINGKAT DAN KAWAN KAWAN######################### ##*/


/*## ------------------------------saat button simpan diklik-------------------------------##*/
/*## ------------------------------ SIMPAN TOPIK-------------------------------##*/
$('input[name=urutan]').keyup(function () {
    if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
       this.value = this.value.replace(/[^0-9\.]/g, '');
    }
});

$('.simpanlearning').click(function(){
  data = 
  {babID:$('input[name=select_bab]').val(),
  statusLearning:$('input[name=stat]:checked').val(),
  deskripsi:$('textarea[name=des]').val(),
  namaTopik:$('input[name=namatopik]').val(),
  urutan:$('input[name=urt]').val()
};

// console.log(data);

  if (data.statusLearning=="kosongundefined" || data.namaTopik=="") {
    swal('Silahkan lengkapi data');
  }else{
    var url = base_url+"index.php/learningline/ajax_insert_line_topik";
    $.ajax({
      data:data,
      datatType:"text",
      url:url,
      type:"POST",
      success:function(){
        swal('Topik berhasil ditambahkan');
        $('.form-topik')[0].reset();
        swal({
          title: "Topik berhasil ditambahkan!",
          text: "Tambahkan baru, atau selesai?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Selesai",
          cancelButtonText: "Tambah",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("selesai", "Anda akan dialihkan ke daftar topik", "success");
            link = base_url+"index.php/learningline/topik/"+data.babID;
            window.location.href = link;
            console.log(link);
          } else {
          // swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });

      },
      error:function(){
        sweetAlert('Data gagal disimpan','error');
      }
    });
  }


});
/*## ------------------------------saat button simpan diklik-------------------------------##*/
</script>