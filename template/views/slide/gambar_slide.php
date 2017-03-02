<?php 

  foreach ($slide as $row) {
    
     $id = $row['id'];
    
    $gambar=base_url().'assets/app/halo/img/'.$row['gambar'];

    $oldphoto=$row['gambar'];


} ;



?> 
     
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
                           <div class="one-half-responsive last-column" id="photo">
            <form name="form-account" action="<?=base_url()?>index.php/template/slide/gambar_slide/<?=$id; ?>"  method="post" accept-charset="utf-8" enctype="multipart/form-data">


            <div class="content">

            <img id="preview" class="img-bordered" src="<?=$gambar;?>" alt="" width="60%" />

             
                <div class="input-icon">
                    <input type="file" id="file" name="photo" class="btn " required="true"/><br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </div>

             
            </form>
        </div>
                            <!-- panel body -->
                        </div>
                        <!--/ END form panel -->
                    </div>
                </div>
        

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->










