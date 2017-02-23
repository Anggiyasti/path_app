<?php 

if (!isset($piljawaban['4']['id_pilih'])) {
    $piljawaban['4']['id_pilih']="";
    $piljawaban['4']['jawaban']="";
    $piljawaban['4']['gambar']="";
} 

?>
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
       
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">BANK SOAL</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="javascript:void(0);">Form</a></li>
                                <li class="active">Elements</li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->

                <!-- Priview -->
 <div class="modal fade " id="modalpriview" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

   <!-- Start Panel Priview -->
   <div class="panel panel-teal">
    <!-- Start heading -->
    <div class="panel-heading ">
      <div class="panel-toolbar">
       <h4 class="modal-title ">Priview Soal</h4>
      </div>
       <div class="panel-toolbar text-right">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    </div>
    <!-- End heading -->
    <!-- Start body priview -->
    <div class="panel-body ">
    <label class="">Sumber :</label> <a id="prevSumber"  ></a> <br>
    <label> judul  :</label> <a id="prevJudul" ></a> <br>
    <label>Soal   : </label>
    <!-- img -->
    <div class="col-sm-12">
      <img id="previewSoal2" style="max-width: 200px; max-height: 125px;  " class="img" src="" alt="" />
    </div>
    <!-- img -->
    <div class="prevSoal col-sm-12">

    </div>
    <!-- pilihan jawaban -->
    <div class="col-sm-12">
      <ol type="A">
        <li id="a"></li>
        <li id="b"></li>
        <li id="c"></li>
        <li id="d"></li>
        <li id="e"></li>
      </ol>
    </div>
    <!-- jawaban -->
    <div class="col-sm-12"> 
      <label>Jawaban : </label> <a id="prevJawaban"></a>
    </div>
    
    </div>
    <!-- END body priview -->

    <!-- Start footer priview -->
    <div class="panel-footer hidden-xs">
     <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Keluar</button>
    </div>
    <!-- end footer priview -->

   </div>
    <!-- END panel Priview -->

</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- START panel -->
                        <div class="panel panel-default">
                            <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title">Form Soal</h3>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                            <div class="panel-body">
                                <form class="form-horizontal form-bordered" action="<?=base_url()?>index.php/banksoal/update_soal/<?=$banksoal['UUID'];?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                               <?php echo validation_errors(); ?>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 ">ID Soal</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" id="disabledSelect" type="text" name="soalID" value="<?=$banksoal['id_bank']; ?>" disabled>
                                            <input type="text" name="soalID" value="<?=$banksoal['id_bank']; ?>" hidden="true">
                      <span id="pesan"></span>
                                        </div>
                                    </div>
                                            <input id="UUID" type="text" name="UUID" value="<?=$banksoal['UUID']; ?>" hidden="true">
                                              
                                    


                                   <div class="form-group" id="oldmapel">
                                        <label class="col-sm-2 ">Mata Pelajaran</label>
                                        <div class="col-sm-5">
                                       <!--  <input class="form-control" type="text" name="id_mapel" value="<?php echo $editdata->id_mapel; ?>"> -->
                        
                                            <select class='form-control' value="<?=$banksoal['id_mapel']; ?>">
                                              <option value='<?=$banksoal['nama_mapel']; ?>'><?=$banksoal['nama_mapel']; ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" hidden="true"  id="mapel">
                                        <label class="col-sm-2 ">Mata Pelajaran</label>
                                        <div class="col-sm-5">
                                       <!--  <input class="form-control" type="text" name="id_mapel" value="<?php echo $editdata->id_mapel; ?>"> -->
                        
                                            <select class='form-control' name="id_mapel" id='id_mapel' value="<?=$banksoal['id_mapel']; ?>">
                                              <option value='<?=$banksoal['id_mapel']; ?>'><?=$banksoal['nama_mapel']; ?></option>
                                              <?php 
                                                foreach ($mapel as $pel) {
                                                echo "<option value='$pel[id_mapel]'>$pel[nama_mapel]</option>";
                                                }
                                              ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="oldbab">
                                        <label class="col-sm-2">BAB</label>
                                        <div class="col-sm-5">
                                        <!-- <input class="form-control" type="text" name="judul_bab" value=""> -->
      
                                            <select name="judul_bab" id="id_bab" class="form-control" >
                                           <option value='0'><?=$banksoal['judul_bab']; ?></option>
                                        </select>
                                        <span id="pesan"></span>
                                        </div>
                                    </div>

                                    <div class="form-group" id="bab" hidden="true">
                                        <label class="col-sm-2">BAB</label>
                                        <div class="col-sm-5">
                                        <!-- <input class="form-control" type="text" name="judul_bab" value="<?php echo $editdata->judul_bab; ?>"> -->
      
                                            <select name="judul_bab" id="id_bab" class="form-control" >
                                           
                                        </select>
                                        <span id="pesan"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Judul Soal</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="judul_soal" value="<?=$banksoal['judul_soal']; ?>">
                      <span id="pesan"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="oldlevel">
                                        <label class="col-sm-2">Kesulitan</label>
                                        <div class="col-sm-5">
                                            <select name="kesulitan" id="kesulitan" class="form-control" value="<?=$banksoal['kesulitan']; ?>">
                                            <?php 
                                            // menentukan tingkat kesulitan dengan indeks 1 - 3
                                              $k = $banksoal['kesulitan'];
                                              if ($k == '3') {
                                                  $kk = 'Sulit';
                                              } elseif ($k == '2') {
                                                  $kk = 'Sedang';
                                              }else {
                                                 $kk = 'Mudah';
                                              }
                                             ?>   
                                             <td><?=$kk;?></td>
                                <option value="<?=$banksoal['kesulitan']; ?>"><?=$kk; ?></option>

                              </select>
    
                      <span id="pesan"></span>
                                        </div>
                                    </div>

                                    <div class="form-group" id="level" hidden="true">
                                        <label class="col-sm-2">Kesulitan</label>
                                        <div class="col-sm-5">
                                            <select name="kesulitan" id="kesulitan" class="form-control" value="<?=$banksoal['kesulitan']; ?>">
                                <option value="1">Mudah</option>
                                <option value="2">Sedang</option>
                                <option value="3">Sulit</option>
                              </select>
    
                      <span id="pesan"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">

                            <label class=" col-sm-2">Gambar Soal</label>

                             <div class="col-sm-8 " >

                                <div class="col-sm-12">

                                     <img id="previewSoal" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/uploads/<?=$banksoal['gambar_soal'];?>" alt="" />

                                 </div>

                                         

                                <div class="col-sm-12">

                                    <div class="col-md-5 left"> 

                                            <h6>Name: <span id="filenameSoal"></span></h6> 

                                    </div> 

                                    <div class="col-md-4 left"> 

                                            <h6>Size: <span id="filesizeSoal"></span>Kb</h6> 

                                    </div> 

                                    <div class="col-md-3 bottom"> 

                                            <h6>Type: <span id="filetypeSoal"></span></h6> 

                                    </div>

                                </div>



                                <div class="col-sm-12">

                                    <label for="fileSoal" class="btn btn-success">

                                        Pilih Gambar

                                    </label>

                                    <input style="display:none;" type="file" id="fileSoal" name="gambarSoal" onchange="ValidateSingleInput(this);"/>
                                    <button type="reset" class="btn btn-default">Reset</button>

                                </div>

                            </div>

                        </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Sumber</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="sumber" value="<?=$banksoal['sumber']; ?>">
                      <span id="pesan"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">


                            <label class=" col-sm-2">Jenis Editor</label>

                            <div class="col-sm-8">

                                <div class="btn-group" data-toggle="buttons" >

                                      <label class="btn active " id="in-soal">

                                        <input type="radio" name="options"  autocomplete="off" checked="true"> Input Soal

                                      </label>

                                      <label class="btn" id="pr-rumus">

                                        <input type="radio" name="options"   autocomplete="off"> Rumus Matematika

                                      </label>

                                 </div>

                            </div>

                        </div>

                        <div class="form-group">
                           <!-- Start Editor Soal -->
                           <div id="editor-soal">
                            <label class="col-sm-2">Soal</label>
                             <div class="col-sm-10">

                                 <textarea  name="editor1" class="form-control" id="" value="">
                                <?=$banksoal['soal'];?></textarea>
                                 <span id="pesan"></span>

                             </div>
                            </div>
                            <!-- End Editor Soal -->
                            <!-- Start Math jax -->
                            <div id="editor-rumus" hidden="true">
                              <label class="control-label col-sm-2">Buat rumus</label>
                              <div class="col-sm-10">

                               <textarea class="form-control" id="MathInput" cols="60" rows="10" onkeyup="Preview.Update()" ></textarea>

                              </div>
                              <label class="control-label col-sm-2"></label>
                               <div class="col-sm-10">
                               <p>
                               Configured delimiters:
                                <ul>
                               <li>TeX, inline mode: <code>\(...\)</code> or <code>$...$</code></li>
                               <li>TeX, display mode: <code>\[...\]</code> or <code> $$...$$</code></li>
                               <li>Asciimath: <code>`...`</code>.</li>
                               </ul>
                               </p>
                               </div>
                               
                              <label class="control-label col-sm-2"></label>
                              <div class="col-sm-10">
                              <label class="control-label" >Preview is shown here:</label>
                               <div class="form-control" id="MathPreview" ></div>
                               <div class="form-control" id="MathBuffer" style=" 
                               visibility:hidden; position:absolute; top:0; left: 0"></div>
                              </div>
                            </div>
                            <script>
                            Preview.Init();
                            </script>
                            <!-- End MathJax -->
                        </div>
                        <div class="form-group">

                            <label class="control-label col-sm-2">Jenis Pilihan</label>

                            <div class="col-sm-8">

                                <div class="btn-group" data-toggle="buttons" >

                                      <label class="btn active " id="text">

                                        <input type="radio" name="options" value="text" autocomplete="off" checked="true"> Text

                                      </label>

                                      <label class="btn" id="gambar">

                                        <input type="radio" name="options"  value="gambar" autocomplete="off"> Gambar

                                      </label>

                                 </div>

                            </div>

                        </div>

                                    <!-- Start input jawaban A -->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan A</label>
                            <!-- Start input text A -->
                            <div class="col-sm-8 piltext">
                                <input type="text" name="idpilA" value="<?=$piljawaban['0']['id_pilih'];?>" hidden="true">
                               <textarea name="a"  class="form-control"> <?=$piljawaban['0']['jawaban'];?> </textarea>
                            </div>
                            <!-- END input text A -->
                            <!-- Start input gambar A -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewA" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/images/jawaban/<?=$piljawaban['0']['gambar'];?>" alt="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameA"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeA"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeA"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileA" class="btn btn-sm btn-default ">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileA" value="<?=$piljawaban['0']['gambar'];?>" name="gambar1" onchange="ValidateSingleInput(this);"/>
                                </div>
                            </div>
                            <!-- END input Gambar A -->
                        </div>
                        <!-- END input jawaban A -->

                        <!-- Start input jawaban B -->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan B</label>
                            <!-- Start input text B -->
                            <div class="col-sm-8 piltext">
                                <input type="text" name="idpilB" value="<?=$piljawaban['1']['id_pilih'];?>" hidden="true">
                               <textarea name="b" class="form-control"> <?=$piljawaban['1']['jawaban'];?></textarea>
                            </div>
                            <!-- END input text B -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewB" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/images/jawaban/<?=$piljawaban['1']['gambar'];?>" alt="" width="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameB"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeB"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeB"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileB" class="btn btn-sm btn-default ">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileB" value="<?=$piljawaban['1']['gambar'];?>" name="gambar2" onchange="ValidateSingleInput(this);"/>
                                </div>
                            </div>
                        </div>
                        <!-- END input jawaban  -->

                        <!-- Start input jawaban C -->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan C</label>
                            <!-- Start input text C -->
                            <div class="col-sm-8 piltext" >
                                <input type="text" value="<?=$piljawaban['2']['id_pilih'];?>" name="idpilC" hidden="true">
                               <textarea name="c" class="form-control"> <?=$piljawaban['2']['jawaban'];?> </textarea>
                            </div>
                            <!-- END input text C -->
                            <!-- Start input gambar C -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewC" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/images/jawaban/<?=$piljawaban['2']['gambar'];?>" alt="" width="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameC"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeC"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeC"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileC" class="btn btn-sm btn-default">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileC" value="<?=$piljawaban['2']['gambar'];?>" name="gambar3" onchange="ValidateSingleInput(this);"/>
                                </div>
                            </div>
                            <!-- END input Gambar C -->                       
                        </div>
                        <!-- END input Jawaban C -->

                        <!-- Start input jawaban D -->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan D</label>
                            <!-- Start input text D -->
                            <div class="col-sm-8 piltext" >
                                <input type="text" name="idpilD" value="<?=$piljawaban['3']['id_pilih'];?>" hidden="true">
                               <textarea name="d" class="form-control"> <?=$piljawaban['3']['jawaban'];?></textarea>
                            </div>
                            <!-- END input text D -->
                            <!-- Start input gambar D -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewD" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/images/jawaban/<?=$piljawaban['3']['gambar'];?>" alt="" width="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameD"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeD"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeD"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileD" class="btn btn-sm btn-default ">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileD" value="<?=$piljawaban['3']['gambar'];?>" name="gambar4" onchange="ValidateSingleInput(this);"/>
                                </div>
                            </div>
                            <!-- END input Gambar D -->                       
                        </div>
                        <!-- END input Jawaban D -->
                        
                        <!-- Start input jawaban E -->
                        <div class="form-group" id="pilihan">
                            <label class="control-label col-sm-2">Pilihan E</label>
                            <!-- Start input text E -->
                            <div class="col-sm-8 piltext" >

                                <input type="text" name="idpilE" value="<?=$piljawaban['4']['id_pilih'];?>" hidden="true" id="pilE">
                               <textarea name="e" class="form-control"> <?=$piljawaban['4']['jawaban'];?></textarea>
                            </div>
                            <!-- END input text E -->
                            <!-- Start input gambar E -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewE" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/images/jawaban/<?=$piljawaban['4']['gambar'];?>" alt="" width="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameE"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeE"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeE"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileE" class="btn btn-sm btn-default">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileE"  value="<?=$piljawaban['4']['gambar'];?>" name="gambar5" onchange="ValidateSingleInput(this);"/>
                                </div>
                            </div>
                            <!-- END input Gambar C -->                       
                        </div>
                        <!-- END input Jawaban E -->

                                    <div class="form-group" id="oldjawaban">
                                        <label class="col-sm-2">Jawaban Benar</label>
                                        <div class="col-sm-5">
                                        <!-- <input class="form-control" type="text" name="jawaban_benar" value="<?php echo $editdata->jawaban_benar; ?>"> -->
      
                                            <select name="jawaban_benar" id="kesulitan" class="form-control" value="<?=$banksoal['jawaban_benar']; ?>">
                                            <option value="<?=$banksoal['jawaban_benar']; ?>"><?=$banksoal['jawaban_benar']; ?></option>

                                        </select>
                                        <span id="pesan"></span>
                                        </div>
                                    </div>

                                     <div class="form-group" id="jawaban" hidden="true">
                                        <label class="col-sm-2">Jawaban Benar</label>
                                        <div class="col-sm-5">
                                        <!-- <input class="form-control" type="text" name="jawaban_benar" value="<?php echo $editdata->jawaban_benar; ?>"> -->
      
                                            <select name="jawaban_benar" id="kesulitan" class="form-control" value="<?=$banksoal['jawaban_benar']; ?>">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>

                                        </select>
                                        <span id="pesan"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                    <label class="col-sm-2"></label>

                                        
                          <div class="col-sm-5">
                                        <?php 
                            $publish =  $banksoal['publish'];
                            // echo $publish;
                            // menentukan checked random
                            if ($publish == '1') {
                                echo '<div class="checkbox custom-checkbox nm">  
                                <span class="checkbox custom-checkbox custom-checkbox-inverse">
                            <input type="checkbox" name="publish" id="customcheckbox-one1" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" checked>  
                            <label for="customcheckbox-one1">&nbsp;&nbsp;Publish</label>
                            </span>   
                            </div>';
                            } else {
                                 echo '<div class="checkbox custom-checkbox nm">  
                            <input type="checkbox" name="publish" id="customcheckbox-one1" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" disabled>  
                            <label for="customcheckbox-one1">Publish</label>   
                            </div>';
                        }
                             ?>
                             <?php 
                            $random =  $banksoal['random'];
                            // echo $publish;
                            // menentukan checked random
                            if ($random == '1') {
                                echo '<div class="checkbox custom-checkbox nm">  
                                <span class="checkbox custom-checkbox custom-checkbox-inverse">
                            <input type="checkbox" name="random" id="customcheckbox" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" checked>  
                            <label for="customcheckbox">&nbsp;&nbsp;Random</label>
                            </span>   
                            </div>';
                            } else {
                                 echo '<div class="checkbox custom-checkbox nm">  
                            <input type="checkbox" name="random" id="customcheckbox" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" disabled>  
                            <label for="customcheckbox">Random</label>   
                            </div>';
                        }
                             ?>
                             </div>
                             </div>
                                    
                                    <div class="panel-footer">
                                        <div class="form-group no-border">
                                            <!-- <label class="col-sm-3 control-label">Button</label> -->
                                            <div class="col-sm-9">
                                    
                                               <input type="submit" class="btn" name="update"  value="Update">
                                                <a class="btn btn-info" onclick="priview()">Priview Soal</a>
                                                <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                                                <!-- <button type="reset" class="btn btn-danger">Reset button</button> -->
                                            </div>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                            <!-- panel body -->
                        </div>
                        <!--/ END form panel -->
                    </div>
                </div>
                <!--/ END row -->

                <!-- START row -->
                
                <!--/ END row -->

                <!-- START row -->
                
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
        <aside class="sidebar sidebar-right">
            <!-- START Offcanvas -->
            <div class="offcanvas-container" data-toggle="offcanvas" data-options='{"openerClass":"offcanvas-opener", "closerClass":"offcanvas-closer"}'>
                <!-- START Wrapper -->
                <div class="offcanvas-wrapper">
                    <!-- Offcanvas Left -->
                    <div class="offcanvas-left">
                        <!-- Header -->
                        <div class="header pl0 pr0">
                            <ul class="list-table nm">
                                <li style="width:50px;">
                                    <a href="javascript:void(0);" class="btn btn-link text-default offcanvas-closer"><i class="ico-arrow-left6 fsize16"></i></a>
                                </li>
                                <li class="text-center">
                                    <h5 class="semibold nm">Settings</h5>
                                </li>
                                <li style="width:50px;" class="text-right">
                                    <a href="javascript:void(0);" class="btn btn-link text-default"><i class="ico-info22 fsize16"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/ Header -->

                        <!-- Content -->
                        <div class="content slimscroll">
                            <h5 class="heading">News Feed</h5>
                            <ul class="topmenu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-plus"></i></span>
                                        <span class="text">Add &amp; Manage Source</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-google-plus"></i></span>
                                        <span class="text">Google Reader</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-twitter2"></i></span>
                                        <span class="text">Twitter Source</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            </ul>

                            <h5 class="heading">Friends</h5>
                            <ul class="topmenu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-search22"></i></span>
                                        <span class="text">Find Friends</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-user-plus2"></i></span>
                                        <span class="text">Add Friends</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            </ul>

                            <h5 class="heading">Account</h5>
                            <ul class="topmenu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-user2"></i></span>
                                        <span class="text">Edit Account</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-envelop"></i></span>
                                        <span class="text">Manage Subscription</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-location6"></i></span>
                                        <span class="text">Location Service</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-switch"></i></span>
                                        <span class="text">Logout</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="text-danger">
                                        <span class="figure"><i class="ico-minus-circle2"></i></span>
                                        <span class="text">Deactivate</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--/ Content -->
                    </div>
                    <!--/ Offcanvas Left -->

                    <!-- Offcanvas Content -->
                    <div class="offcanvas-content">
                        <!-- Content -->
                        <div class="content slimscroll">
                            <!-- START profile -->
                            <div class="panel nm">
                    <!-- thumbnail -->
                    <div class="thumbnail">
                        <!-- media -->
                        <div class="media">
                            <!-- indicator -->
                            <div class="indicator"><span class="spinner"></span></div>
                            <!--/ indicator -->
                            <img data-toggle="unveil" src="../image/background/400x250/placeholder.jpg" data-src="../image/background/400x250/background3.jpg" alt="Cover" width="100%">
                        </div>
                        <!--/ media -->
                    </div>
                    <!--/ thumbnail -->
                </div>
                <div class="panel-body text-center" style="margin-top:-55px;z-index:11">
                    <img class="img-circle mb5" src="../image/avatar/avatar7.jpg" alt="" width="75">
                    <h5 class="bold mt0 mb5">Erich Reyes</h5>
                    <p>Administrator</p>
                    <button type="button" class="btn btn-primary offcanvas-opener offcanvas-open-ltr"><i class="ico-settings"></i> Settings</button>
                </div>
                            <!--/ END profile -->

                            <!-- START contact -->
                            <div class="media-list media-list-contact">
                    <h5 class="heading pa15 pb0">Family</h5>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar1.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Autumn Barker</span>
                            <span class="media-meta ellipsis">Malaysia</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar2.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Giselle Horn</span>
                            <span class="media-meta ellipsis">Bolivia</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Austin Shields</span>
                            <span class="media-meta ellipsis">Timor-Leste</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Caryn Gibson</span>
                            <span class="media-meta ellipsis">Libya</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar3.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Nash Evans</span>
                            <span class="media-meta ellipsis">Honduras</span>
                        </span>
                    </a>

                    <h5 class="heading pa15 pb0">Friends</h5>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar4.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Josiah Johnson</span>
                            <span class="media-meta ellipsis">Belgium</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Philip Hewitt</span>
                            <span class="media-meta ellipsis">Bahrain</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar5.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Wilma Hunt</span>
                            <span class="media-meta ellipsis">Dominica</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar6.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Noah Gill</span>
                            <span class="media-meta ellipsis">Guatemala</span>
                        </span>
                    </a>

                    <h5 class="heading pa15 pb0">Others</h5>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar8.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> David Fisher</span>
                            <span class="media-meta ellipsis">French Guiana</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar9.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Samantha Avery</span>
                            <span class="media-meta ellipsis">Jersey</span>
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                        <span class="media-object pull-left">
                            <img src="../image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Madaline Medina</span>
                            <span class="media-meta ellipsis">Finland</span>
                        </span>
                    </a>
                </div>
                            <!--/ END contact -->
                        </div>
                        <!--/ Content -->
                    </div>
                    <!--/ Offcanvas Content -->

                    <!-- Offcanvas Right -->
                    <div class="offcanvas-right has-footer">
                        <!-- Header -->
                        <div class="header pl0 pr0">
                            <ul class="list-table nm">
                                <li style="width:50px;">
                                    <a href="javascript:void(0);" class="btn btn-link text-default offcanvas-closer"><i class="ico-arrow-left6 fsize16"></i></a>
                                </li>
                                <li class="text-center">
                                    <h5 class="semibold nm">
                                        <p class="nm">Autumn Barker</p>
                                        <small>Last seen 02:21am</small>
                                    </h5>
                                </li>
                                <li style="width:50px;" class="text-right">
                                    <a href="javascript:void(0);" class="btn btn-link text-default"><i class="ico-info22 fsize16"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/ Header -->

                        <!-- Content -->
                        <div class="content slimscroll">
                            <!-- START chat -->
                            <ul class="media-list media-list-bubble">
                            <li class="media media-right">
                                <a href="javascript:void(0);" class="media-object">
                                    <img src="../image/avatar/avatar7.jpg" class="img-circle" alt="">
                                </a>
                                <div class="media-body">
                                    <p class="media-text">eros non enim commodo hendrerit.</p>
                                    <span class="clearfix"></span>
                                    <p class="media-text">Suspendisse dui.</p>
                                    <span class="clearfix"></span>
                                    <p class="media-text">eu nulla at</p>
                                    <!-- meta -->
                                    <span class="clearfix"></span><!-- important: clearing floated media text -->
                                    <p class="media-meta">Sun, Mar 02</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="javascript:void(0);" class="media-object">
                                    <img src="../image/avatar/avatar6.jpg" class="img-circle" alt="">
                                </a>
                                <div class="media-body">
                                    <p class="media-text">Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat.</p>
                                    <span class="clearfix"></span>
                                    <p class="media-text">faucibus ut, nulla. Cras eu tellus</p>
                                    <!-- meta -->
                                    <span class="clearfix"></span><!-- important: clearing floated media text -->
                                    <p class="media-meta">Tue, Oct 01</p>
                                </div>
                            </li>
                            <li class="media media-right">
                                <a href="javascript:void(0);" class="media-object">
                                    <img src="../image/avatar/avatar7.jpg" class="img-circle" alt="">
                                </a>
                                <div class="media-body">
                                    <p class="media-text">Duis a mi fringilla mi lacinia mattis. Integer</p>
                                    <!-- meta -->
                                    <span class="clearfix"></span><!-- important: clearing floated media text -->
                                    <p class="media-meta">Fri, Sep 27</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="javascript:void(0);" class="media-object">
                                    <img src="../image/avatar/avatar6.jpg" class="img-circle" alt="">
                                </a>
                                <div class="media-body">
                                    <p class="media-text">Praesent interdum ligula eu enim. Etiam imperdiet dictum magna.</p>
                                    <!-- meta -->
                                    <span class="clearfix"></span><!-- important: clearing floated media text -->
                                    <p class="media-meta">Wed, Aug 28</p>
                                </div>
                            </li>
                            <li class="media media-right">
                                <a href="javascript:void(0);" class="media-object">
                                    <img src="../image/avatar/avatar7.jpg" class="img-circle" alt="">
                                </a>
                                <div class="media-body">
                                    <p class="media-text">Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna.</p>
                                    <!-- meta -->
                                    <span class="clearfix"></span><!-- important: clearing floated media text -->
                                    <p class="media-meta">Sat, Sep 27</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="javascript:void(0);" class="media-object">
                                    <img src="../image/avatar/avatar6.jpg" class="img-circle" alt="">
                                </a>
                                <div class="media-body">
                                    <p class="media-text">Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac</p>
                                    <span class="clearfix"></span>
                                    <p class="media-text">Nam porttitor scelerisque neque</p>
                                    <!-- meta -->
                                    <span class="clearfix"></span><!-- important: clearing floated media text -->
                                    <p class="media-meta">Sun, Feb 22</p>
                                </div>
                            </li>
                        </ul>
                            <!--/ END chat -->
                        </div>
                        <!--/ Content -->

                        <!-- Footer -->
                        <div class="footer">
                            <div class="has-icon">
                                <input type="text" class="form-control" placeholder="Type message...">
                                <i class="ico-paper-plane form-control-icon"></i>
                            </div>
                        </div>
                        <!--/ Footer -->
                    </div>
                    <!--/ Offcanvas Right -->
                </div>
                <!--/ END Wrapper -->
            </div>
            <!--/ END Offcanvas -->
        </aside>
        <!--/ END Template Sidebar (right) -->


 <script>

        // Replace the <textarea id="editor1"> with a CKEditor

        // instance, using default configuration.

        CKEDITOR.replace( 'editor1' );

    </script>
    <script type="text/javascript">
// load bab
$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('index.php/banksoal/ambil_data') ?>",
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



    <!-- script untuk option hide and show -->

    <script type="text/javascript">

        $(document).ready(function(){
           // Start event untuk jenis editor
            $("#in-soal").click(function(){

                $("#editor-soal").show();

                 $("#editor-rumus").hide();

            });

            $("#pr-rumus").click(function(){

                $("#editor-rumus").show();

                 $("#editor-soal").hide();

            });
           // End event untuk jenis editor

            // Strat  event untuk pilihan jenis input  

            $("#text").click(function(){

                $(".piltext").show();

                 $(".pilgambar").hide();

            });

            $("#gambar").click(function(){

                $(".pilgambar").show();

                $(".piltext").hide();     

            });

            //END  event untuk pilihan jenis input  

            // Strat  event untuk jumlah pilihan  

            $("#empatpil").click(function(){   

                 $("#pilihan").hide();

                  $("#pilihanop").hide();

            });

            $("#limapil").click(function(){

                $("#pilihan").show();

                 $("#pilihanop").show();

            });

            // END  event untuk jumlah pilihan



        });

    </script>



    <!-- Start script untuk priview gambar soal -->

    <script type="text/javascript">

        $(function () {



            // Start event priview gambar Soal

            $('#fileSoal').on('change',function () {

                console.log('test');

                var file = this.files[0];

                var reader = new FileReader();

                reader.onload = viewerSoal.load;

                reader.readAsDataURL(file);

                viewerSoal.setProperties(file);

            });

            var viewerSoal = {

                load : function(e){

                    $('#previewSoal').attr('src', e.target.result);

                },

                setProperties : function(file){

                    $('#filenameSoal').text(file.name);

                    $('#filetypeSoal').text(file.type);

                    $('#filesizeSoal').text(Math.round(file.size/1024));

                },

            }

            // End event priview gambar pilihan A





            // Start event priview gambar pilihan A

            $('#fileA').on('change',function () {

                console.log('test');

                var file = this.files[0];

                var reader = new FileReader();

                reader.onload = viewerA.load;

                reader.readAsDataURL(file);

                viewerA.setProperties(file);

            });

            var viewerA = {

                load : function(e){

                    $('#previewA').attr('src', e.target.result);

                },

                setProperties : function(file){

                    $('#filenameA').text(file.name);

                    $('#filetypeA').text(file.type);

                    $('#filesizeA').text(Math.round(file.size/1024));

                },

            }

            // End event priview gambar pilihan A



            // Start event priview gambar pilihan B

            $('#fileB').on('change',function () {

                console.log('test');

                var file = this.files[0];

                var reader = new FileReader();

                reader.onload = viewerB.load;

                reader.readAsDataURL(file);

                viewerB.setProperties(file);

            });

            var viewerB = {

                load : function(e){

                    $('#previewB').attr('src', e.target.result);

                },

                setProperties : function(file){

                    $('#filenameB').text(file.name);

                    $('#filetypeB').text(file.type);

                    $('#filesizeB').text(Math.round(file.size/1024));

                },

            }



            // End event priview gambar pilihan B



            // Start event priview gambar pilihan C

            $('#fileC').on('change',function () {

                console.log('test');

                var file = this.files[0];

                var reader = new FileReader();

                reader.onload = viewerC.load;

                reader.readAsDataURL(file);

                viewerC.setProperties(file);

            });

            var viewerC = {

                load : function(e){

                    $('#previewC').attr('src', e.target.result);

                },

                setProperties : function(file){

                    $('#filenameC').text(file.name);

                    $('#filetypeC').text(file.type);

                    $('#filesizeC').text(Math.round(file.size/1024));

                },

            }



            // End event priview gambar pilihan C



            // Start event priview gambar pilihan D

            $('#fileD').on('change',function () {

                console.log('test');

                var file = this.files[0];

                var reader = new FileReader();

                reader.onload = viewerD.load;

                reader.readAsDataURL(file);

                viewerD.setProperties(file);

            });

            var viewerD = {

                load : function(e){

                    $('#previewD').attr('src', e.target.result);

                },

                setProperties : function(file){

                    $('#filenameD').text(file.name);

                    $('#filetypeD').text(file.type);

                    $('#filesizeD').text(Math.round(file.size/1024));

                },

            }



            // End event priview gambar pilihan D



            // Start event priview gambar pilihan E

            $('#fileE').on('change',function () {

                console.log('test');

                var file = this.files[0];

                var reader = new FileReader();

                reader.onload = viewerE.load;

                reader.readAsDataURL(file);

                viewerE.setProperties(file);

            });

            var viewerE = {

                load : function(e){

                    $('#previewE').attr('src', e.target.result);

                },

                setProperties : function(file){

                    $('#filenameE').text(file.name);

                    $('#filetypeE').text(file.type);

                    $('#filesizeE').text(Math.round(file.size/1024));

                },

            }



            // End event priview gambar pilihan E



        });

    </script>

     <!-- End script untuk priview gambar soal -->
<!-- start script js validation extension -->
<script type="text/javascript">
 var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
             $('#warningupload').modal('show');
                // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                // oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>
<!-- END -->

<!--Start  Script drop down depeden -->

<script>

    // Script for getting the dynamic values from database using jQuery and AJAX

    $(document).ready(function () {

        $('#eTingkat').change(function () {



            var form_data = {

                name: $('#eTingkat').val()

            };



            $.ajax({

                url: "<?php echo site_url('videoback/getPelajaran'); ?>",

                type: 'POST',

                data: form_data,

                success: function (msg) {

                    var sc = '';

                    $.each(msg, function (key, val) {

                        sc += '<option value="' + val.id + '">' + val.keterangan + '</option>';

                    });

                    $("#ePelajaran option").remove();

                    $("#ePelajaran").append(sc);

                }

            });

        });

        // Strat  event untuk pilihan jenis input  

        $("#up_server").click(function () {

            $(".server").show();

            $(".link").hide();

        });

        $("#up_link").click(function () {

            $(".link").show();

            $(".server").hide();

            $(".prv_video").hide();

        });

        $("#file").click(function () {

            $(".prv_video").show();

        });



    });





    //buat load tingkat

    function loadTingkat() {

        jQuery(document).ready(function () {

            var tingkat_id = {"tingkat_id": $('#tingkat').val()};

            var idTingkat;



            $.ajax({

                type: "POST",

                data: tingkat_id,

                url: "<?= base_url() ?>index.php/videoback/getTingkat",

                success: function (data) {

                    console.log("Data" + data);

                    $('#tingkat').html('<option value="">-- Pilih Tingkat  --</option>');

                    $.each(data, function (i, data) {

                        $('#tingkat').append("<option value='" + data.id + "'>" + data.aliasTingkat + "</option>");

                        return idTingkat = data.id;

                    });

                }

            });



            $('#tingkat').change(function () {

                tingkat_id = {"tingkat_id": $('#tingkat').val()};

                loadPelajaran($('#tingkat').val());

            })



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



    //buat load pelajaran

    function loadPelajaran(tingkatID) {

        $.ajax({

            type: "POST",

            data: tingkatID.tingkat_id,

            url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/" + tingkatID,

            success: function (data) {

                $('#pelajaran').html('<option value="">-- Pilih Mata Pelajaran  --</option>');

                $.each(data, function (i, data) {

                    $('#pelajaran').append("<option value='" + data.id + "'>" + data.keterangan + "</option>");

                });

            }

        });

    }

    //buat load bab

    function load_bab(mapelID) {

        $.ajax({

            type: "POST",

            data: mapelID.mapel_id,

            url: "<?php echo base_url() ?>index.php/videoback/getBab/" + mapelID,

            success: function (data) {



                $('#bab').html('<option value="">-- Pilih Bab Pelajaran  --</option>');

                //console.log(data);

                $.each(data, function (i, data) {

                    $('#bab').append("<option value='" + data.id + "'>" + data.judulBab + "</option>");

                });

            }



        });

    }

    //load sub bab

    function load_sub_bab(babID) {

        $.ajax({

            type: "POST",

            data: babID.bab_id,

            url: "<?php echo base_url() ?>index.php/videoback/getSubbab/" + babID,

            success: function (data) {

                $('#subbab').html('<option value="">-- Pilih Sub Bab Pelajaran  --</option>');

                console.log(data);

                $.each(data, function (i, data) {

                    $('#subbab').append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");

                });

            }



        });

    }





    loadTingkat();

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

    $("#oldjawaban").click(function(){
    $("#jawaban").show();
    $("#oldjawaban").hide();
});
</script>

<script type="text/javascript">

    // priview soal sebelum di upload
      function priview() {
        var mapel = $('select#id_mapel').text();
        var judul = $("input[name=judul_soal]").val();
        var sumber  = $("input[name=sumber]").val();
        var soal  = CKEDITOR.instances.editor1.getData();
        var jawaban = $('select[name=jawaban_benar]').val();
        var a  =$("textarea[name=a]").val();
        var b  =$("textarea[name=b]").val();
        var c  =$("textarea[name=c]").val();
        var d  =$("textarea[name=d]").val();
        var e  =$("textarea[name=e]").val();
        $("#prevSumber").text(sumber);
        $("#prevJudul").text(judul);
        $('li#a').text(a);
        $('li#b').text(b);
        $('li#c').text(c);
        $('li#d').text(d);
        $('li#e').text(e);
        $('div.prevSoal').html(soal);
        $('a#prevJawaban').text(jawaban);
        $('#modalpriview').modal('show'); // show bootstrap modal
      
      }
</script>

