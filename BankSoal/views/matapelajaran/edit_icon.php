<?php 

  foreach ($mapel as $row) {
    
     $id = $row['id_mapel'];
    
    $gambar=base_url().'assets/images/mapel/'.$row['gambar'];

    $oldphoto=$row['gambar'];





    // $biografi = $row['biografi'];

    // $photo=base_url().'assets/image/photo/guru/'.$row['photo'];

    // $oldphoto=$row['photo'];

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
            <form name="form-account" action="<?=base_url()?>index.php/banksoal/gambar_mapel/<?=$id; ?>"  method="post" accept-charset="utf-8" enctype="multipart/form-data">


            <div class="content">

            <img id="preview" class="img-circle img-bordered" src="<?=$gambar;?>" alt="" width="20%" />

             
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

     
        <!--/ END Template Sidebar (right) -->








