<!-- TABEL KONTEN 1 . FORM LEARNINGNLINE -->
<section id="main" role="main">
<!-- START Template Container -->
<div class="container-fluid">
<div class="row">
 <div class="col-md-12">
  <div class="panel panel-default">
   <div class="panel-heading">
    <h3 class="panel-title">Tambah Learning Topik</h3>
    <div class="panel-toolbar text-right">
      <a class="btn btn-success" 
      href="<?= base_url(); ?>index.php/learningline/learningline" 
      title="Daftar Learning Line" ><i class="ico-list"></i></a>
    </div> 
  </div>
  <div class="panel-body">
    <!-- Start Body modal -->
    <form  class="panel panel-default form-horizontal form-bordered form-topik"  method="post" >
     

   <div  class="form-group">
    <label class="col-sm-3 control-label">Mata Pelajaran</label>
    <div class="col-sm-8">
     <input type="text" disabled="true" name="mapel" value="<?=$mapel; ?>" class="form-control">
   </div>
 </div>

 <div  class="form-group">
  <label class="col-sm-3 control-label">Bab</label>
  <div class="col-sm-8">
   <input type="text" class="form-control" disabled="true" name="bab" value="<?=$bab; ?>">

   <input type="hidden" name="select_bab" value="<?=$id ?>">
 </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Nama Topik</label>
  <div class="col-sm-8">

   <input type="text" class="form-control" name="namatopik">
 </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Urutan</label>
  <div class="col-sm-8">

   <input type="text" class="form-control" name="urt">
 </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Status</label>
  <div class="col-sm-8">
   <span class="radio custom-radio-primary">  
    <input type="radio" id="radio1" value="1" name="stat" checked>  
    <label for="radio1">&nbsp;&nbsp;Published</label>   
  </span>
  <span class="radio custom-radio-primary">  
    <input type="radio" id="radio2" value="0" name="stat">  
    <label for="radio2">&nbsp;&nbsp;Non Published</label>   
  </span>
</div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Deskripsi</label>
  <div class="col-sm-8">
    <textarea class="form-control" name="des"></textarea>
  </div>
</div>

<div class="form-group no-border">
  <label class="col-sm-3 control-label"></label>
  <div class="col-sm-9">
   <a class="btn btn-primary simpanlearning">Simpan</a>
   <button type="reset" class="btn btn-danger reset">Reset</button>
 </div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- TABEL KONTEN 1 . FORM LEARNINGNLINE -->
