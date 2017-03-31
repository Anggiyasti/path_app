      <!-- Page Content -->
      <div id="content" class="page">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Token</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Article Content -->
        <div class="row">
              <div class="col s12">
            <!-- With Left Icon -->
          <h4 class="uppercase" align="center">Informasi Token</h4>
            <?php if ($token == array()): ?>
              <h3>Anda belum memiliki token</h3>
            <?php else: ?>
              <?php foreach ($token as $token) : ?>
                <div class="activity animated fadeinright delay-1">
                  <ul class="course-feature" style="margin-top: 0;">
                    <li>Nomor Token&nbsp&nbsp&nbsp:&nbsp<?=$token['nomortoken']?></li>
                    <li>Masa Aktif&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp<?=$token['masa_aktif']?> Hari</li>
                    <li>Tgl Aktif&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp<?=$token['tgl_aktif']?></li>
                    <li>Tgl Berakhir&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp<?=$token['tgl_expired']?></li>
                    <li>Sisa Aktif&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp<?=$token['sisa']?> Hari</li>
                  </ul>
                </div>
              <?php endforeach ?>
            <?php endif ?>
            <h4 class="uppercase" align="center">Cara Mengisi Token</h4>
            <div class="activity animated fadeinright delay-1">
              <ul>
                <li><p>Belum memiliki token? Silahkan Hubungi admin !</p></li>
                <li>
                  <p>Apabila sudah memiliki token tetapi belum aktif, silahkan masukkan kode token dibawah ini. </p>
                    <center>    <input type="text" name="kode_token" style="width: 100%;margin-bottom: 10px" placeholder="Masukan Kode Token"><button class="btn-large primary-color width-100 alt isi_button">Isi</button></center>
                </li>
              </ul>
            </div>
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->



<script type="">
    $('.isi_button').click(function(){
        kode_token = $('input[name=kode_token]').val();
        console.log(kode_token);
        url = base_url+"token/isi_token";
        $.ajax({
            type:'POST',
            data:{kode_token:kode_token},
            url:base_url+"token/isi_token",
            dataType:"TEXT",
            success:function(data){
                console.log(data);
                if (data=="1") {     
                    swal('Token Berhasil di tambahkan, silahkan menikmati layanan kami !');
                    window.location = base_url+"login";
                }else{
                    swal('Kode Token salah');
                }
            },error:function(){
                console.log('masuk 1');
            }
        });
    })


</script>