<div id="page-content" class="page-content header-clear bg bg-cover bg-transparent">
    <div id="page-content-scroll">        
                
    <div class="landing-homepage">
        <div class="landing-page landing-dark">
            <div class="landing-wrapper">
                <div class="landing-header no-bottom">
                    <a class="landing-header-logo" href="#">Welcome</a>
                    <div class="clear"></div>
                </div>
                
                <div class="content no-bottom"><div class="deco"></div></div>
                <!-- Left Top Menu -->
                <ul>
                    <li>
                        <a href="<?php echo base_url('index.php//Login/cek_login_siswa')?>">
                            <i class="ion-ios-home-outline border-red-dark"></i>
                            <em>Home</em>
                        </a>
                    </li>        
                    <li>
                        <a href="<?php echo base_url('index.php/Siswa/Profilesiswa')?>">
                            <i class="ion-ios-gear-outline border-green-dark"></i>
                            <em>Profile Setting</em>
                        </a>
                    </li>        
                    <li>
                        <a href="<?php echo base_url('index.php/workout1')?>">
                            <i class="ion-ios-book-outline border-blue-dark"></i>
                            <em>Workout</em>
                        </a>
                    </li>        
                    <li>
                        <a href="<?= base_url('index.php/workout1/pilihreport') ?>">
                            <i class="ion-ios-analytics-outline border-magenta-dark"></i>
                            <em>Report Workout</em>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('index.php/grafikreport') ?>">
                            <i class="ion-ios-analytics-outline border-magenta-dark"></i>
                            <em>Grafik Report</em>
                        </a>
                    </li>          
                    <li>
                        <a href="<?php echo base_url('index.php/Login/logout_siswa')?>">
                            <i class="ion-ios-email-outline border-blue-dark"></i>
                           
                            <em>Logout</em>
                        </a>
                    </li>
                </ul>    
                
            </div>
            <div class="landing-overlay"></div>
            <div class="background"></div>
        </div>
    </div>

        
    </div>  
</div>
        
<div class="share-bottom share-dark">
    <h3>Share Page</h3>
    <div class="share-socials-bottom">
        <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.themeforest.net/">
            <i class="ion-social-facebook-outline icon-ghost facebook-bg"></i>
            Facebook
        </a>
        <a href="https://twitter.com/home?status=Check%20out%20ThemeForest%20http://www.themeforest.net">
            <i class="ion-social-twitter-outline twitter-bg"></i>
            Twitter
        </a>
        <a href="https://plus.google.com/share?url=http://www.themeforest.net">
            <i class="ion-social-googleplus-outline icon-ghost google-bg"></i>
            Google
        </a>
        <a href="https://pinterest.com/pin/create/button/?url=http://www.themeforest.net/&media=https://0.s3.envato.com/files/63790821/profile-image.jpg&description=Themes%20and%20Templates">
            <i class="ion-social-pinterest-outline icon-ghost pinterest-bg"></i>
            Pinterest
        </a>
        <a href="sms:">
            <i class="ion-ios-chatboxes-outline icon-ghost sms-bg"></i>
            Text
        </a>
        <a href="mailto:?&subject=Check this page out!&body=http://www.themeforest.net">
            <i class="ion-ios-email-outline icon-ghost mail-bg"></i>
            Email
        </a>
        <div class="clear"></div>
    </div>
</div>
 
    
</div>
</body>
<script type="text/javascript">



    $('#babSelect').change(function () {

        load_sub($('#babSelect').val());

    });



    function submit(id) {

        //passing data to modals.

        var tingPelID = $('.kirim' + id).data('todo').id;

        //untuk ditampilkan di modal

        var namaPelajaran = $('.kirim' + id).data('todo').namapelajaran;

        $('#myModal').modal('show');

        $('.modal-title').text('Mulai Latihan untuk pelajaran ' + namaPelajaran);

        load_bab(tingPelID);

    }



    //fungsi untuk ngeload bab berdasarkan tingkat-pelajaran id

    function load_bab(tingPel) {

        // console.log('masduk')

        $('#babSelect').find('option').remove();

        $('#babSelect').append('<option value=1>Bab Pelajaran</option>');

        var babID;

        $.ajax({

            type: "POST",

            url: "<?php echo base_url() ?>index.php/matapelajaran/get_bab_by_tingpel_id/" + tingPel,

            success: function (data) {



                $.each(data, function (i, data) {

                    $('#babSelect').append("<option value='" + data.id + "'>" + data.judulBab + "</option>");

                    babid = data.id;



                });

            }



        });

    }



    function load_sub(babID) {

        $.ajax({

            type: "POST",

            data: babID.bab_id,

            url: "<?php echo base_url() ?>index.php/videoback/getSubbab/" + babID,

            success: function (data) {

                $('#subSelect').html('<option value=1>-- Pilih Sub Bab Pelajaran  --</option>');

                // console.log(data);

                $.each(data, function (i, data) {

                    $('#subSelect').append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");

                });

            }



        });

    }



    function mulai(test) {

        var sub_bab_id = $('#subSelect').val();

        var kesulitan = $("select[name=kesulitan]").val();

        var jumlahsoal = $("select[name=jumlahsoal]").val();

        var subabid = $("select[name=subab]").val();



        var data = {

            kesulitan: kesulitan,

            jumlahsoal: jumlahsoal,

            subab: subabid

        };



        if (data.kesulitan == 0 || data.jumlahsoal == 0 || data.subab == 0) {



            $('#info').show();

        }else{

            $('.mulai-btn').text('saving...'); //change button text

            $('.mulai-btn').attr('disabled', true); //set button disable 

            url = "<?php echo base_url() ?>index.php/latihan/tambah_latihan_ajax";

            $.ajax({

                url: url,

                type: "POST",

                dataType: 'text',

                data: data,

                success: function (data, respone)

                {

                    $('#myModal').modal('hide');

                $('.mulai-btn').text('save'); //change button text

                $('.mulai-btn').attr('disabled', false); //set button enable 

                $('#formlatihan')[0].reset(); // reset form on modals

                if (test == 'mulai') {

                    window.location.href = base_url + "index.php/tesonline/mulaitest";

                } else {

                    window.location.href = base_url + "index.php/tesonline/daftarlatihan";

                }

            },

            error: function (respone, jqXHR, textStatus, errorThrown)

            {

                alert('Error adding / update data');

            }

        });

        }

    }



    function hideme(){

        $('#info').hide();

    }

    // $('.close-button').click(function(){

    //     $('#info').hide();

    // });



    $('.mulai-btn').click(function () {

        mulai('mulai');

        // window.location.href = base_url + "index.php/tesonline/mulaitest";

    });



    $('.latihan-nnti-btn').click(function () {

        mulai('nanti');

        // window.location.href = base_url + "index.php/tesonline/daftarlatihan";

    });







</script>