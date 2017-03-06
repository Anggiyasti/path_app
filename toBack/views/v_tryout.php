<section id="main" role="main">
<!-- TABEL LEARNING LINE -->
<style type="text/css">
                .modal-dialog{
                    width: 850px;
                    padding: 10px;
                }
            </style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Tryout</h3> 

            </div>
            <div class="panel-body">
                <table class="daftarto table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
                    <thead>
                        <tr>
                     
                            <th>Nama Tryout </th>
                            <th>publish</th>
<!--                             <th>Bab</th>
 -->                        <th>active</th>
                            <!-- <th width="15%">Aksi</th> -->
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

<script type="text/javascript">
    var url = base_url + "index.php/toback/ajax_get_list_to";
    var kelas = '.daftarto';
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
        url = base_url+"index.php/toback/updatepasive/"+id;
    }else{
        url = base_url+"index.php/toback/updateaktiv/"+id;        
    }

    swal({
        title: "Anda Akan mengganti Status Active Tryout?",
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
                    swal("Berhasil diupdate!", "Status Diperbaharui.", "success");
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
</script>