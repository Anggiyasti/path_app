<section id="main" role="main">
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
        <!-- <li><?=$part ?></li>    -->
        <li class="active"><a href="#"><?=$judul ?></a></li>        

      </ol><br>
    </div>
  </div>
  <div class="panel-body">
    <input type="hidden" name="topikID" value="<?=$topikID?>">
    <input type="hidden" id="oldmp" name="id_mapel"  value="<?=$mapelID ?>">
    <!-- <input type="hidden" id="id_bab"  value="<?=$babID ?>"> -->
    <!-- Start Body modal -->
    <form  class="panel panel-default form-horizontal form-bordered form-topik"  method="post" >
     

    <div class="form-group" hidden="true"  id="mapel">
      <label class="col-sm-3 control-label">Mata Pelajaran</label>
      <div class="col-sm-8">
                                       <!--  <input class="form-control" type="text" name="id_mapel" value="<?php echo $editdata->id_mapel; ?>"> -->
                        
           <select class='form-control' name="id_mapel" id='id_mapel'>
           <option value='0'><?=$mapel?></option>
            <?php 
            foreach ($mapell as $m) {
            echo "<option value='$m[id_mapel]'>$m[nama_mapel]</option>";
            }
            ?>
        </select>
          </div>
      </div>

   <div  class="form-group" id="oldmapel">
      <label class="col-sm-3 control-label">Mata Pelajaran</label>
      <div class="col-sm-8">
        <select class='form-control' name="id_mapel" id='id_mapel'>
           <option value='0'><?=$mapel?></option>
            <?php 
            foreach ($mapell as $m) {
            echo "<option value='$m[id_mapel]'>$m[nama_mapel]</option>";
            }
            ?>
        </select>
     </div>
   </div>

 

<div  class="form-group">
  <label class="col-sm-3 control-label">Nama Season</label>
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
   
 </div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
<!-- TABEL KONTEN 1 . FORM LEARNINGNLINE -->
</section>   

<script type="text/javascript">
              $(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('index.php/videoback/ambil_data') ?>",
cache: false,
});

$("#id_mapel").change(function(){

var value=$(this).val();
if(value>0){
$.ajax({
data:{modul:'getbab',id:value},
success: function(respond){
$("#id_bab").html(respond);
}
})
}

});

})
</script> 

<script type="text/javascript">
  $("#oldmapel").click(function(){
    $("#mapel").show();
    $("#oldmapel").hide();
});

   $("#oldlevel").click(function(){
    $("#level").show();
    $("#oldlevel").hide();
});
   $("#oldbab1").click(function(){
    $("#bab").show();
    $("#oldbab1").hide();
});

    $("#oldjawaban").click(function(){
    $("#jawaban").show();
    $("#oldjawaban").hide();
});
</script>
