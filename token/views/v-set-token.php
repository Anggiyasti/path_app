   <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Workout</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>

<main>
    <div class="page-content container clear-fix">
        <div class="container-404">
            <p><span>Maaf:(</span><br>untuk mengakses halaman, silahkan tambahkan Token Terlebih dahulu!</p>
            <center>    <input type="text" name="kode_token" style="width: 40%;margin-bottom: 10px" placeholder="Masukan Kode Token"><button class="btn primary-color isi_button">Isi</button></center>
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
            url:base_url+"token/isi_token",
            dataType:"TEXT",
            success:function(data){
                console.log(data);
                if (data=="1") {     
                    swal('Token Berhasil di tambahkan, silahkan menikmati layanan kami !');
                    window.location = base_url+"workout1";
                }else{
                    swal('Kode Token salah');
                }
            },error:function(){
                console.log('masuk 1');
            }
        });
    })


</script>