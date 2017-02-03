<script src="<?= base_url('assets/sal/sweetalert-dev.js');?>"></script>
        <link rel="stylesheet" href="<?= base_url('assets/sal/sweetalert.css');?>">
<main>
    <div class="page-content container clear-fix">
        <div class="container-404">
            <p><span>Maaf:(</span><br>untuk mengakses halaman, silahkan tambahkan Token Terlebih dahulu!</p>
            <center>    <input type="text" class="form-control" name="kode_token" style="width: 40%;margin-bottom: 10px" placeholder="Masukan Kode Token" class="input-text-box input-green-border"><button class="isi_button">Isi</button></center>
        </div>
        <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Nama Depan</label>
                                                                    <input type="text" class="form-control" name="nama_depan" value="">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
    </div>
</main>


<script type="">
    $('.isi_button').click(function(){
        kode_token = $('input[name=kode_token]').val();
        url = base_url+"index.php/token/isi_token";
        $.ajax({
            type:'POST',
            data:{kode_token:kode_token},
            url:base_url+"index.php/token/isi_token",
            dataType:"TEXT",
            success:function(data){
                console.log(data);
                if (data=="1") {     
                    swal('Token Berhasil di tambahkan, silahkan menikmati layanan kami !');
                }else{
                    swal('Kode Token salah');
                }
            },error:function(){
                console.log('masuk 1');
            }
        });
    })


</script>