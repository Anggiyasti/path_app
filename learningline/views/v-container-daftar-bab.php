            
<section id="main" role="main">
<style type="text/css">
                .modal-dialog{
                    width: 850px;
                    padding: 10px;
                }
            </style>
            <!-- MODAL TABEL STEP -->
            <div class="modal fade detail_topik" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  </div>
                  <div class="modal-body">
                      <div class="panel panel-default">
                         <div class="panel-heading">
                             <h3 class="panel-title">Tabel Session</h3> 
                             <div class="panel-toolbar text-right">
                                <a class="btn btn-success" 
                                href="<?= base_url(); ?>index.php/learningline/formlearning" 
                                title="Tambah Data" ><i class="ico-plus"></i></a>
                            </div>

                        </div>
                        <div class="panel-body">
                            <table class="daftartopik table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
                                <thead>
                                    <tr>
                                        <th width="50%">Session</th>
                                        <th>Urutan Tampil</th>
                                        <th>Status</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL TABEL TOPIK -->

    <!-- MODAL TABEL STEP -->
    <div class="modal fade detail_step" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          </div>
          <div class="modal-body">
              <div class="panel panel-default">
                 <div class="panel-heading">
                     <h3 class="panel-title">Tabel Quis</h3> 
                     <div class="panel-toolbar text-right">
                        <a class="btn btn-success" 
                        href="" 
                        title="Tambah Data" ><i class="ico-plus"></i></a>
                    </div>

                </div>
                <div class="panel-body">
                    <table class="daftarstep table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
                        <thead>
                            <tr>
                                <th width="10%">No Urut</th>
                                <th>Quis</th>
                                <th>jenis</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- MODAL TABEL TOPIK -->

<!-- TABEL LEARNING LINE -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Bab</h3> 

            </div>
            <div class="panel-body">
                <table class="daftarbab table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Mapel</th>
                            <th>Judul Bab</th>
<!--                             <th>Bab</th>
 -->                        <th>learning Line</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- TABEL LEARNING LINE -->
</section>


