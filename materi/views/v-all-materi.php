




        <!-- START Template Main -->
        <section id="main" role="main">
        <div class="modal fade" id="mdetailvideo">

		<div class="modal-dialog" role="document">

			<div class="modal-content">

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

					<h3 class="semibold mt0 text-accent text-center"></h3>

				</div>

				<div class="modal-body">
					<p id="isicontent">
						
					</p>
				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

				</div>

			</div>

		</div>

	</div>
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
			
			<div class="col-md-12">
				<!-- Start Panel -->
				<div class="panel panel-teal" >
				<!-- Start Pnel Heading -->
				<div class="panel-heading">
					<h3 class="panel-title">List Materi</h3>
					<!-- Start menu tambah materi -->
                        <div class="panel-toolbar text-right">
                            <a class="btn btn-inverse btn-outline" href="<?= base_url(); ?>index.php/materi/form_materi" title="Tambah Data" ><i class="ico-plus"></i></a>
                        </div>
                         <!-- END menu tambah materi -->

				</div>
				<!-- End Panel Heading -->
				<!-- Start Panel Body -->
				<div class="panel-body">
					<table class="table table-striped" id="zero-configuration" style="font-size: 12px" width="100%">
						<thead>
							<tr>
							<th>No</th>
								<th>Judul</th>
								<th>Matapelajarn</th>
								<th>Bab</th>
								<th>Isi Materi</th>
								<th>Tanggal di buat</th>
								<th>Status</th>
								<th width="20%">Aksi</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
				<!-- END Panel Body -->
				</div>
			</div>
		</div>
	</div>

            <!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

</section>
        <!--/ END Template Main -->

        <script type="text/javascript">
	var  $list_materi;
	$(document).ready(function() {
		//#get list by id guru
		$list_materi = $('#zero-configuration').DataTable({ 
			"processing": true,
			"ajax": {
				"url": base_url+"index.php/materi/ajax_get_all_materi",
				"type": "POST"
			},
		});
		//##

	});

//# ketika tombol di klik
function detail(id){
	var kelas ='.detail-'+id;
	var data = $(kelas).data('id');
	var links;

	$('h3.semibold').html(data.judulMateri);
		// links = '<?=base_url();?>assets/video/' + data.namaFile;
		$('#isicontent').html(data.isiMateri); 
		$('#mdetailvideo').modal('show');
	
	
}
//##

//# fungsi menghapus video
function drop_materi(UUID){
	if(confirm('Are you sure delete this data?')){
		$.ajax({
			url : base_url+"index.php/materi/del_materi/"+UUID,
			type: "POST",
			dataType: "TEXT",
			success: function(data)
			{
				console.log('success');
				reload_tblist();
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				swal('Error deleting data');
			}
		});
	}
}
// fungsi updt


//fungsi reload table
function  reload_tblist(){
	$list_materi.ajax.reload(null,false);
}

</script>




