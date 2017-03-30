<?php 

  foreach ($tampil as $row) {
    $active = $row['active'];
} ;



?> 
    


</style>
<section id="main" role="main">
    <!-- START MODAL EDIT TRYOUT -->
    <script type="text/javascript">halaman = true;</script>
    <div class="modal fade" id="modal_editTO" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--START Header Modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <h3 class="modal-title">Ubah Try Out</h3>

                </div>
                <!--END Header Modal -->
                <!--START Body Modal -->
                <div class="modal-body form">
                    <!-- START PESAN ERROR EMPTY INPUT -->
                     <div class="alert alert-dismissable alert-danger" id="e_editTo" hidden="true" >
                      <button type="button" class="close" onclick="hide_e_editTo()" >×</button>
                      <strong>O.M.G.!</strong> Tolong di ISI semua.
                    </div>
                    <!-- END PESAN ERROR EMPTY INPUT -->
                    <!-- START PESAN ERROR EMPTY INPUT -->
                     <div class="alert alert-dismissable alert-danger" id="e_editWkt" hidden="true" >
                      <button type="button" class="close" onclick="hide_e_editWkt()" >×</button>
                      <strong>Silahkan cek kembali!</strong> Waktu mulai dan waktu berakhir tidak sesuai.
                    </div>
                    <!-- END PESAN ERROR EMPTY INPUT -->
                    <!-- START PESAN ERROR EMPTY INPUT -->
                    <div class="alert alert-dismissable alert-danger" id="e_editTgl" hidden="true" >
                      <button type="button" class="close" onclick="hide_e_editTgl()" >×</button>
                      <strong>Silahkan cek kembali!</strong> Tanggal mulai dan tanggal akhir tidak sesuai.
                    </div>
                    <!-- END PESAN ERROR EMPTY INPUT -->
                    <!-- Start Form Edit TO -->
                    <form action="javascript:void(0);" id="formeditTO"  class="panel panel-default form-horizontal form-bordered">
                        <div class="panel-body">
                           <div class="form-group">
                                <input type="hidden" value="" name="id_tryout"/>
                                <label class="col-sm-3 control-label">Nama Tryout</label>
                                <div class="col-sm-8">
                                      <input type="text" class="form-control" name="nama_tryout">
                                </div>
                           </div>
                           

                             <div class="form-group">
                                <label class="col-sm-3 control-label">Publish?</label>
                                <div class="col-sm-8">
                                    <div class="checkbox custom-checkbox nm">  
                                        <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                    <input type="checkbox" name="publish" id="publisher" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success">  
                                    <label for="publisher">&nbsp;&nbsp;</label>
                                    </span>   
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" name="proses" onclick="saveedit()" >Proses</button>
                            <button type="reset" class="btn btn-inverse" id="btnReset">reset</button>
                        </div>
                    </form>
                    <!-- END Form Edit TO   -->
                </div>
                <!--END Body Modal -->
            </div>
        </div>
    </div>
    <!-- END MODAL EDIT TRYOUT -->

    <!-- START Template Container -->
    <div class="container-fluid">
    	<div class="row">
    		<div class="container">
            <div class="col-md-11">

    			<div class="panel panel-teal mt10 mb0">
           
                    <!--Start untuk menampilkan nama tabel -->

                    <div class="panel-heading">

                    	<h3>List Try Out</h3>
                    </div>
                    <div class="panel-body">
                    	<table class="table table-striped" id="tblistTO" style="font-size: 13px">
                      <a href="javascript:void(0);" onclick="add_soal()" class="btn btn-primary"><i class="glyphicon glyphicon-plus fa-1x"></i> TO TAMPIL</a>

                    		<thead>

                    			<tr>
                    				<th>ID</th>
                    				<th>Nama TO</th>
                    				<!-- <th>Tanggal Mulai</th>
                                    <th>Waktu Mulai</th>
                    				<th>Tanggal Berakhir</th>
                                    <th>Waktu Berakhir</th> -->
                            <th>Status Publish</th>
                    				<th>Aksi</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    			

                    		</tbody>

                     
                    	</table>
                    </div>
                </div>
                </div>
    			
    		</div>
    	</div>
    </div>
    <script type="text/javascript">
         var tblist_TO;
        $(document).ready(function() {
            tblist_TO = $('#tblistTO').DataTable({ 
             "ajax": {
                "url": base_url+"index.php/toback/ajax_listsTO/",
                "type": "POST"
            },
            "processing": true,
            });
        });

        function dropTO(id_tryout) {
             if (confirm('Apakah Anda yakin akan menghapus data ini? ')) {
               // ajax delete data to database
                $.ajax({
                     url : base_url+"index.php/toback/dropTO/"+id_tryout,
                     type: "POST",
                     dataType: "TEXT",
                     success: function(data,respone)
                     {  
                            console.log(data);
                            console.log(respone);
                            //if success reload ajax table
                            // $('#modal_form').modal('hide');
                            reload_tblist();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                            alert('Error deleting data');
                            // console.log(jqXHR);
                            // console.log(textStatus);
                            console.log(errorThrown);
                    }
                });
             }
        }

        function reload_tblist(){
            tblist_TO.ajax.reload(null,false); 
        }

        function edit_TO(id_tryout) 
        {
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string  
            $('#modal_editTO').modal('show'); 
                $.ajax({
                url : base_url+"index.php/toback/ajax_edit/" + id_tryout,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_tryout"]').val(data.id_tryout);
                    $('[name="nama_tryout"]').val(data.nm_tryout);
                    $('[name="tgl_mulai"]').val(data.tgl_mulai);
                    $('[name="wkt_mulai"]').val(data.wkt_mulai);
                    $('[name="tgl_berhenti"]').val(data.tgl_berhenti);
                    $('[name="wkt_akhir"]').val(data.wkt_berakhir);

                    if (data.publish==1) {
                        $('#publisher').attr('checked', true);
                        console.log('hello');
                     } else {
                        $('#publisher').attr('checked',false);
                     }
                    $('#modal_editTO').modal('show');  // show bootstrap modal when complete loaded
                    // $('.modal-title').text('Edit Paket Soal'); // Set title to Bootstrap modal title

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        function saveedit(){
          
            var url;
            

            // VAR U/ PENGECEKAN INPUT
            var nm_paket   =   $('[name="nama_tryout"]').val();
            var tgl_mulai  =   $('[name="tgl_mulai"]').val();
            var tgl_akhir  =   $('[name="tgl_berhenti"]').val();
            var wkt_mulai  =   $('[name="wkt_mulai"]').val();
            var wkt_akhir  =   $('[name="wkt_akhir"]').val();
            // /
            // pengecekan inputan pembuatan to
            // cek inputan kosong
            if (nm_paket != "" && tgl_mulai != "" && tgl_akhir!= "" && wkt_mulai != "" && wkt_akhir != "" ) {
                // validasi tanggal mulai dan tanggal akhir
                if (tgl_mulai<tgl_akhir) {
                  var datas = $('#formeditTO').serialize();
                  // JIKA BERHASIL
                  url = base_url+"index.php/toback/editTryout/";
                  // ajax adding data to database
                  $.ajax({
                      url : url,
                      type: "POST",
                      data: datas,
                      dataType: "TEXT",
                      success: function(data)
                      {
                          $('#modal_editTO').modal('hide'); 
                          reload_tblist(); 
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error adding / update data');

                      }
                  });
                }else if(tgl_mulai==tgl_akhir) {
                    if (wkt_mulai>=wkt_akhir) {
                      $("#e_editWkt").show();
                    }else{
                      var datas = $('#formeditTO').serialize();
                      // JIKA BERHASIL
                      url = base_url+"index.php/toback/editTryout/";
                      // ajax adding data to database
                      $.ajax({
                          url : url,
                          type: "POST",
                          data: datas,
                          dataType: "TEXT",
                          success: function(data)
                          {
                              $('#modal_editTO').modal('hide'); 
                              reload_tblist(); 
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                              alert('Error adding / update data');

                          }
                      });
                    }
              }else {
                 $("#e_editTgl").show();
               }
               
            }else{
               $("#e_editTo").show();
            }

        }

    // ##opik##
    function show_peserta(uuid){
        window.location = 'reportto/'+uuid;
    }

    // 
    function hide_e_editTo() {
       $("#e_editTo").hide();
    }
    function hide_e_editTgl() {
       $("#e_editTgl").hide();
    }
    function hide_e_editWkt() {
       $("#e_editWkt").hide();
    }
    //


    //panggil modal
function add_soal() {
$('#modalsoal').modal('show'); // show bootstrap modal
}


$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('index.php/banksoal/ambil_data') ?>",
cache: false,
});

$("#pelajaran").change(function(){

var value=$(this).val();
if(value>0){
$.ajax({
data:{modul:'getbab',id:value},
success: function(respond){
$("#bab").html(respond);
}
})
}

});

}) 
    </script>

    <!-- START Modal ADD BANK SOAL -->
 <div class="modal fade" id="modalsoal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title">Form Soal</h4>
    </div>


    <!-- Start Body modal -->
    <div class="modal-body">
<form  class="panel panel-default form-horizontal form-bordered" action="<?=base_url();?>index.php/toback/tampil_to" method="post" >
                           <div class="form-group">
                                    <label class="col-sm-3 control-label">Tampil TO</label>
                                    <div class="col-sm-8">
                                        <select name="active" id="active" class="form-control" value="<?=$active;?>">
                                        <option value="0">--PILIH--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </div>
                                </div>
                                        
     </div>
     <!-- END BODY modla-->
     <br>
     <div class="modal-footer">
      <input type='submit' id='hideshow' name="update" value='Tampil' class="btn btn-primary">
     </div>
    </form> 
   </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
 <!-- END  Modal ADD BANK SOAL-->
</section>