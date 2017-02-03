<main>
    <div class="page-content container clear-fix">
        <div class="container-404">
        <div class="footer-area-top" style="background-color: white; margin-top: 0;">
            <p style="color: black"><span>Maaf:(</span><br>untuk mengakses halaman, silahkan tambahkan Token Terlebih dahulu!</p>
            <center> 
                                    <div class="newsletter-area">
                                        <div class="input-group stylish-input-group">
                                            <input type="text" placeholder="Enter your e-mail here" class="form-control">
                                            <span class="input-group-addon">
                                                <button type="submit">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">Isi</i>
                                                </button>  
                                            </span>
                                        </div>
                                    </div>                                    
            </center>
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