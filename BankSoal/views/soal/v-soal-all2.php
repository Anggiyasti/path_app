<section id="main" role="main">
            <div class="container-fluid">

<div class="row">
    <div class="col-sm-12">
        <!--Pengulangan list soal  -->
        <?php 
        $no = $this->uri->segment('3') + 1;
        foreach ($datSoal as $key): ?>
        <!-- START panel soal -->
        
        <div class="panel panel-teal mt10 mb0">
            <!-- panel-toolbar -->
            <div class="panel-heading ">
                <div class="panel-toolbar">
                    <h5 class="semibold nm ellipsis">Sumber Soal : <?=$key['sumber'];?></h5>
                </div>
                <div class="panel-toolbar text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-inverse btn-outline"><b style="color:white;">Aksi</b></button>
                        <button type="button" class="btn btn-sm btn-inverse btn-outline" style="height: 29px;" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-header" >Pilih Aksi :</li>
                            <li ><a href="javascript:void(0)" data-toggle="panelcollapse">Pembahasan (hide/unhide)</a></li>
                            <li><a href="<?=base_url()?>index.php/banksoal/formUpdate/<?=$key['UUID'] ?>">Edit</a></li>
                            <li><a href="javascript:void(0)" onclick="drop_soal(<?=$key['id_bank'];?>)">Hapus</a></li>

                        </ul>
                        <!-- tambah soal -->
                         <a class="btn btn-sm  btn-inverse btn-outline" style="height: 29px;" href="<?php echo base_url('index.php/banksoal/form_tambahsoal')?>" title="Tambah Data Soal" ><i class="ico-plus"></i></a>
                    </div>
                </div>
            </div>
            <!--/ panel-toolbar -->
            <!-- panel-body -->
            <div class="panel-body ">
                <h6>Soal: <?=$key['judulSoal']?></h6>
                <!-- Start Gambar soal -->
                <?php $imgSoal = $key['imgSoal'] ?>
                <?php if ($imgSoal != '' && $imgSoal != ' '): ?>
                    <div class="overlay text-center">
                        <img class="unveiled" src="<?=$imgSoal ;?>" alt="imgSoal" style="max-width:400px;">
                    </div>
                <?php endif ?>

                <!-- END Gambar soal -->
                <!-- Start content soal -->
                <p class="text-justify ">
                    <?=$key['soal']; ?>
                </p>
                <!-- END start Content -->
            </div>
            <!--/ panel-body -->
            <div class="panel-body pt10 table-responsive panel-collapse pull in ">
                <h6>Pembahasan : </h6>
                <!-- END img Pembahsan -->
                <!-- Start Video Pembahasan -->
                <?php $video = $key['videoBahas']; ?>
                <?php if ($video != '' && $video != ' '): ?>
                    <video class=" modal-body img-tumbnail image" src="<?=$video;?>" width="100%" height="50%" controls="" id="video-ply" style="background:grey;">
                    </video>
                <?php endif ?>
                <!-- END Video Pembahasan -->
                <p><?=$key['pembahasan'];?></p>
                <p class="col-sm-6 pl0">Jawaban : <?=$key['jawaban'];?>. <?=$key['isiJawaban'];?> 
                    <img src="<?=$key['imgJawaban'];?>" style="max-width: 200px; max-height: 125px; ">
                </p>
                
                <div class="text-right col-md-6" ">
                    <button type="button" class="btn btn-sm btn-inverse mb5" data-toggle="panelcollapse" title="Sembunyikan"><i class="ico-arrow-up12"></i> </button></div>

                </div>

                <!--  -->
                <!-- panel-footer -->
                <div class="panel-footer hidden-xs">
                    <ul class="nav nav-section nav-justified">
                        <li>
                            <div class="section">
                                <i class="ico-file"></i>
                                Kesulitan : <?=$key['kesulitan']; ?> 
                            </div>
                        </li>
                        
                        <li>
                            <div class="section">
                                <i class="ico-file"></i>
                                mapel : <?=$key['mapel'];?>
                            </div>
                        </li>
                        <li>
                            <div class="section">
                                <i class="ico-file"></i>
                                Bab : <?=$key['bab'];?> 
                            </div>
                        </li>
                        
                    </ul>
                </div>
                <!--/ panel-footer -->
            </div >
            <!--/ END panel soal -->
        <?php endforeach ?>
        <!-- end Pengulangan list soal -->
    <nav aria-label="Page navigation mt10 pt10"><center>
        <ul class="pagination ">
        <?php 
        echo $this->pagination->create_links();
        ?>
        </ul>
        </center>
    </nav>

    </div>

</div>
</div>
</section>
                        <!--/ Website States
                        <!-- Start javascript -->
                        <!-- Start Math jax --> 
                        <script type="text/x-mathjax-config"> 
                            MathJax.Hub.Config({ 
                            tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]} 
                        }); 
                    </script> 
                    <script type="text/javascript" async 
                    src="<?= base_url('assets/plugins/MathJax-master/MathJax.js?config=TeX-MML-AM_HTMLorMML') ?>">
                </script> 
                <!-- end Math jax -->
<!-- End javascrip>-->
<script type="text/javascript">
    function drop_soal(id_bank){
  url = base_url+"banksoal/deletebanksoal2/"+id_bank;
  swal({
    title: "Yakin akan hapus soal?",
    text: "Anda tidak dapat membatalkan ini.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya,Tetap hapus!",
    closeOnConfirm: false
  },
  function(){
    var datas = {id:id_bank};
    $.ajax({
      dataType:"text",
      data:datas,
      type:"POST",
      url:url,
      success:function(){
        swal("Terhapus!", "Soal berhasil dihapus.", "success");
       window.location.href =base_url+"banksoal/listsoal";
      },
      error:function(){
        sweetAlert("Oops...", "Data gagal terhapus!", "error");
      }

    });
  });
}

function a(argument) {
    // body...
}
// function drop_soal(id_soal) {
//     console.log(id_soal);
// }
</script>