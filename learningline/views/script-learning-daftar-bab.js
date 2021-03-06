<script>

    var url = base_url + "index.php/learningline/ajax_get_list_bab";
    var kelas = '.daftarbab';
    var tabel;

    var dataTableLearning ;
    var kelasDTLearning= ".daftartopik" ;

    
//load table
$(document).ready(function () {
	tabel = $(kelas).DataTable({
		"ajax": {
			"url": url,
			"type": "POST"
		},
		"emptyTable": "Tidak Ada Data Pesan",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
	});

});

//update data
function updatestatus(id,status){
	var url;
	if (status==1) {
		url = base_url+"index.php/learningline/updatepasive/"+id;
	}else{
		url = base_url+"index.php/learningline/updateaktiv/"+id;		
	}

	swal({
		title: "Anda Akan Merubah status Mapel?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Ya, update",
		cancelButtonText: "Tidak, batalan",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
		if (isConfirm) {
			$.ajax({
				url:url,
				dataType:"TEXT",
				type:'POST',
				success:function(){
					swal("Berhasil diupdate!", "status Mapel diaktifkan.", "success");
					tabel.ajax.reload(null,false);
				},
				error:function(){
					swal('gagal');
				}}
				);
		} else {
			swal("Dibatalkan", "Data batal diperbaharui", "error");
			tabel.ajax.reload(null,false);

		}
	});
}
function detail_topik(data){
	$('.detail_step').modal('show');
	judul = " <h4 class='modal-title' style='display: inline'>Daftar Step</h4>";
	$('.detail_step .modal-header').html(judul);
	// $(".detail_step a").attr("href", base_url+"index.php/learningline/formstep/"+data);
	$(".detail_step a").attr("href", base_url+"index.php/learningline/step1/"+data);
	

	var url = base_url+"index.php/learningline/ajax_list_ge_step/"+data;
	dataTableLearning = $('.daftarstep').DataTable({
		"ajax": {
			"url": url,
			"type": "POST"
		},
		"emptyTable": "Tidak Ada Data Pesan",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
		"bDestroy": true,

	});
}



//detail bab
function detail_bab(data){
	$('.detail_topik').modal('show');
	judul = " <h4 class='modal-title' style='display: inline'>Daftar Season</h4>";
	$('.detail_topik .modal-header').html(judul);
	$(".detail_topik a").attr("href", base_url+"index.php/learningline/formtopik/"+data);
	var url = base_url+"index.php/learningline/ajax_get_list_topik/"+data;
	dataTableLearning = $(kelasDTLearning).DataTable({
		"ajax": {
			"url": url,
			"type": "POST"
		},
		"emptyTable": "Tidak Ada Data Pesan",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
		"bDestroy": true,

	});

}


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
				tabel.ajax.reload(null,false);
			},
			error:function(){
				sweetAlert("Oops...", "Data gagal terhapus!", "error");
			}

		});
	});
}
function reload(){
	tabel.ajax.reload(null,false);
	dataTableLearning.ajax.reload(null,false);
}

/*## -----------------------------Drop Learning-------------------------------##*/


/*## -----------------------------Update Status bab Learning-------------------------------##*/
function update_learning_bab(id,status){
	var url;
	if (status==1) {
		url = base_url+"index.php/learningline/updatepasive_bab/"+id;
	}else{
		url = base_url+"index.php/learningline/updateaktiv_bab/"+id;		
	}

	swal({
		title: "Anda Akan Merubah status Mapel?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Ya, update",
		cancelButtonText: "Tidak, batalan",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
		if (isConfirm) {
			$.ajax({
				url:url,
				dataType:"TEXT",
				type:'POST',
				success:function(){
					swal("Berhasil diupdate!", "status Mapel diaktifkan.", "success");
					tabel.ajax.reload(null,false);
				},
				error:function(){
					swal('gagal');
				}}
				);
		} else {
			swal("Dibatalkan", "Data batal diperbaharui", "error");
			tabel.ajax.reload(null,false);

		}
	});
}
function drop_step(idstep){
	url = base_url+"index.php/learningline/drop_step";
	swal({
		title: "Yakin akan hapus Step?",
		text: "Jika anda menghapus Step",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Ya,Tetap hapus!",
		closeOnConfirm: false
	},
	function(){
		var datas = {id:idstep};
		$.ajax({
			dataType:"text",
			data:datas,
			type:"POST",
			url:url,
			success:function(){
				swal("Terhapus!", "Step berhasil dihapus.", "success");
				reload();
			},
			error:function(){
				sweetAlert("Oops...", "Data gagal terhapus!", "error");
			dataTableLearning.ajax.reload(null,false);

			}

		});
	});
}
/*## -----------------------------Update Status bab Learning-------------------------------##*/

</script>
