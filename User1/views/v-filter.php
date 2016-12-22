<script type="text/javascript" src="<?php echo base_url('assets/adminre/library/jquery/js/jquery.min.js')?>"></script> 

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
<form  class="panel panel-default form-horizontal form-bordered" action="<?=base_url();?>index.php/user1/filterbab" method="post" >
                                    <div class='form-group'>
                                        <label class="col-sm-3 control-label">Mata Pelajaran</label>
                                        <div class="col-sm-8">
                                        <select class='form-control' name="pelajaran" id='pelajaran'>
                                        <option value='0'>--pilih--</option>
                                        <?php 
                                        foreach ($mapel as $prov) {
                                        echo "<option value='$prov[id_mapel]'>$prov[nama_mapel]</option>";
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>

      								              <div class='form-group'>
                                        <label class="col-sm-3 control-label">Bab</label>
                                        <div class="col-sm-8">
                                        <select class='form-control' name="id_bab" id='bab'>
                                        <option value='0'>--pilih--</option>
                                        </select>
                                        </div>
                                        </div>

                                       <div class="form-group">
                                    <label class="col-sm-3 control-label">Kesulitan</label>
                                    <div class="col-sm-8">
                                        <select name="kesulitan" id="kesulitan" class="form-control">
                                            <option value='0'>--pilih--</option>
                                            <option value="1">Mudah</option>
                                            <option value="2">Sedang</option>
                                            <option value="3">Sulit</option>
                                        </select>
                                    </div>
                                </div>
                                        
     </div>
     <!-- END BODY modla-->
     <div class="modal-footer">
      <input type='submit' id='hideshow' name="submit" value='Tampil' class="btn btn-primary">
     </div>
    </form> 
   </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
 <!-- END  Modal ADD BANK SOAL-->
<h1>Hello</h1>
<a href="javascript:void(0);" onclick="add_soal()"><span class="text">Filter Video</span>
        </a><br>
Hasil <br>
<form  class="navbar-form navbar-left" role="search" action="<?=base_url()?>index.php/user1/carilagi" method="post">  
                              <input class="form-control" placeholder="Cari.." id="inputIcon" name="nama_mapel" type="text"> 

  <div class="table-responsive panel-collapse pull out">
                             <?php echo $this->session->flashdata('msg'); ?>

                                <table class="table table-bordered table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <!-- <th width="5%"></th> -->
                                            <th>No</th>
                                            <th>ID Soal</th>
                                            <th>Judul Soal</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Bab</th>
                                            <th>Kesulitan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                     $no = 1;
                                     foreach ($data as $ds):
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?=$ds['id_bank'];?></td>
                                            <td><?=$ds['judul_soal'];?></td>
                                            <td><?=$ds['nama_mapel'];?></td>
                                            <td><?=$ds['judul_bab'];?></td> 
                                            <?php 
                                            // menentukan tingkat kesulitan dengan indeks 1 - 3
                                              $k = $ds['kesulitan'];
                                              if ($k == '3') {
                                                  $kk = 'Sulit';
                                              } elseif ($k == '2') {
                                                  $kk = 'Sedang';
                                              }else {
                                                 $kk = 'Mudah';
                                              }
                                             ?>   
                                             <td><?=$kk;?></td>                                              
                                        </tr>
                                        <?php 
                                        $no++;
                                        endforeach; 
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            </form>

<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#c").hide();
    });
    $("#show").click(function(){
        $("#c").show();
    });
});

jQuery(document).ready(function(){
    jQuery('#hideshow').live('click', function(event) {        
         jQuery('#content').toggle('show');
         jQuery('#tes').toggle('hide');
    });
});

//panggil modal
function add_soal() {
$('#modalsoal').modal('show'); // show bootstrap modal
}


$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('index.php/User1/ambil_data') ?>",
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