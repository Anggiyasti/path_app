<script>
// var base_url = "<?php echo base_url();?>" ;
var id_mapel = <?=$this->uri->segment(3);?>;
var url = base_url + "index.php/learningline/ajax_get_list_topik/"+id_mapel;

$(document).ready(function(){
		dataTableLearning = $('.daftartopik ').DataTable({
		"ajax": {
			"url": url,
			"type": "POST"
		},
		"emptyTable": "Tidak Ada Data Pesan",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
		"bDestroy": true,

	});
})

/*## -----------------------------Drop Learning-------------------------------##*/
function drop_topik(idtopik){
	url = base_url+"index.php/learningline/drop_topik";
	swal({
		title: "Yakin akan hapus Session?",
		text: "Jika anda menghapus Session, step juga akan terhapus",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Ya,Tetap hapus!",
		closeOnConfirm: false
	},
	function(){
		var datas = {id:idtopik};
		$.ajax({
			dataType:"text",
			data:datas,
			type:"POST",
			url:url,
			success:function(){
				swal("Terhapus!", "Session berhasil dihapus.", "success");
				dataTableLearning.ajax.reload(null,false);
			},
			error:function(){
				sweetAlert("Oops...", "Data gagal terhapus!", "error");
			}

		});
	});
}
/*## -----------------------------Drop Learning-------------------------------##*/

//detail topik
function detail_topik(data){

	$('.detail_learning').modal('show');
	button = "<a href="+base_url+"index.php/learningline/step1/"+data+" class='close' aria-label='Close' title='Step Baru'><span aria-hidden='true'><i class='ico-plus'></i></span></a>";
	judul = " <h4 class='modal-title' style='display: inline'>Daftar Step Yang Harus Dikerjakan</h4>";
	$('.detail_learning .modal-header').html(button+""+judul);

	var url = base_url+"index.php/learningline/ajax_list_ge_step/"+data;
	console.log(url);
	dataTableLearning = $('.daftarsteptable').DataTable({
		"ajax": {
			"url": url,
			"type": "POST"
		},
		"emptyTable": "Tidak Ada Data Pesan",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
		"bDestroy": true,

	});

}
</script>