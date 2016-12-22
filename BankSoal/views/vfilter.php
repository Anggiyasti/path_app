

<section id="main" role="main">
<!-- Start Math jax -->
  <script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
});
</script>
  <script type="text/javascript" async
  src="<?= base_url('assets/adminre/plugins/MathJax-master/MathJax.js?config=TeX-MML-AM_HTMLorMML') ?>">
</script>


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
                <!-- /.row -->
<div class="row">
 <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="checkbox custom-checkbox pull-left">  
                        <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Daftar Soal</h3>
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
    <!-- /.col-lg-12 -->
    <div class="col-lg-12">
        <!-- jalankan validasi pesan -->
        <?php if ($this->session->flashdata('info')) { ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Success</h4>
            </div>
        <?php } elseif ($this->session->flashdata('pesan2')) { ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Failed</h4>
                <?php echo $this->session->flashdata('pesan2'); ?>
            </div>
        <?php }; ?>
            <!-- end validasi -->

        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row --> 
            
<!-- /.row -->
<div class="row">

    <div class="col-lg-12">

        <!-- /.panel-default -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">

                    <div >
                    <a href="javascript:void(0);" onclick="add_soal()" class="btn btn-primary"><i class="glyphicon glyphicon-plus fa-1x"></i> FILTER</a>   

                                         
                    </div
                    <!-- form search -->                
                    <!-- <div class="col-md-4 col-md-offset-4"> -->
                        <div class="form-group input-group">
                            <form  class="navbar-form navbar-left" role="search" action="<?=base_url()?>index.php/banksoal/cari" method="post">  
                              
                              <div class="form-group">
                                    
                                        
                                    </div>
                                </div>
                               <!-- <span class="input-group-btn">
                                <button class="btn btn-default"><a class="icon-search"><i class="fa fa-search"></i></a></button>
                                </span> -->
                            </form> 
                        </div>
                    </div>
                    <div class="table-responsive panel-collapse pull out">
                    <table class="table table-bordered" id="zero-configuration" style="font-size: 13px">
                    <thead>
                                        <tr>
                                            <!-- <th width="5%"></th> -->
                                            <th>No</th>
                                            <th>Id soal</th>
                                            <th>judul soal</th>
                                            <th>mata pelajaran</th>
                                            <th>nama bab</th>
                                            <th>Kesulitan</th>
                                            <th>soal</th>
                                            <th>Jawaban</th>
                                            <th>Publish</th>
                                            <th></th>
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
                                             <td><?php
                            $c =  $ds['soal'];
                            echo substr($c, 0, 50) ."..." ?>
                            <a class='label label-info' href='#mdetailsoal' title='lihat detail' data-toggle='modal' data-target='#mdetailsoal<?php echo $ds["id_bank"]; ?>'>Lihat Detail</a>
                        </td>
                        <td><?=$ds['jawaban_benar'];?>
                        </td>
                        <td>
                            <?php 
                            $publish =  $ds['publish'];
                            // echo $publish;
                            // menentukan checked random
                            if ($publish == '1') {
                                echo '<div class="checkbox custom-checkbox nm">  
                            <input type="checkbox" id="customcheckbox-one1" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" checked>  
                            <label for="customcheckbox-one1"></label>   
                            </div>';
                            } else {
                                 echo '<div class="checkbox custom-checkbox nm">  
                            <input type="checkbox" id="customcheckbox-one1" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" disabled>  
                            <label for="customcheckbox-one1"></label>   
                            </div>';
                        }
                             ?>
                        </td>
                        <td>
                            <a href="<?=base_url()?>index.php/banksoal/edit_soal/<?=$ds['id_bank'] ?>" class="btn btn-outline btn-info">Edit</a> 
                            <a class="btn btn-outline btn-info" href="#delete" data-toggle="modal" data-target="#delete<?php echo $ds['id_bank']; ?>">Delete<i class="fa fa-trash-o"></i></a>
                            

                            <!-- Modal hapus-->
                            <div class="modal fade" id="delete<?php echo $ds['id_bank']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Delete</h4>
                                        </div>
                                            <div class="modal-body">
                                                Are you sure?
                                            </div>
                                        <div class="modal-footer">
                                            <a href="<?=base_url()?>index.php/banksoal/hapus_soal/<?=$ds['id_bank']?>" class="btn btn-default" >Yes</a>
                                            <a href="#"class="btn btn-default" data-dismiss="modal">No</a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <!-- /.modal -->
                        </td>  
                        <div class="modal fade" id="mdetailsoal<?php echo $ds['id_bank']; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h3 class="semibold mt0 text-accent text-center"></h3>
                                        </div>
                                        <div class="modal-body">
                                        <label>Soal :</label>
                                        <p class="text-justify" id="dsoal">
                                            <?=$ds['soal'] ?>
                                        </p>
                                        <label>Jawaban Benar :</label>
                                        <p class="text-justify" id="dsoal">
                                            <?=$ds['jawaban_benar'] ?>
                                        </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger mb5" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  




                        </tr>
                            <?php 
                            $no++;
                            endforeach; 
                            ?>
                                        
                                    </tbody>
                    </table>
                    </div>

                </div>
                <!-- /.table-hover -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>



              

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->


    
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
<form  class="panel panel-default form-horizontal form-bordered" action="<?=base_url();?>index.php/banksoal/filterbab" method="post" >
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
 