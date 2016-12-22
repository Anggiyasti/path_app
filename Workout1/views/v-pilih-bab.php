<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
<div class="decoration decoration-margins"></div>
        
        <div class="decoration decoration-margins"></div>
    <form action="<?= base_url() ?>index.php/workout1/tambah_latihan_ajax" method="post">

        <div class="content">
        <label class="control-label col-sm-4">Bab</label>
            <div class="select-box">
                <select name="id_bab" id="bab" class="form-control">
                    <option value='0'>--pilih--</option>
                    <?php 
                        foreach ($bab as $row) {
                            echo '<option value="'.$row['id_bab'].'">'.$row['judul_bab'].'</option>';
                        }
                    ?>
                </select>
            </div>        
        </div>  
        <div class="content">
        <label class="control-label col-sm-4">Kesulitan</label>
            <div class="select-box">
                <select name="kesulitan" id="kesulitan" class="form-control">
                    <option value="0">--Pilih--</option>
                    <option value="1">Mudah</option>
                    <option value="2">Sedang</option>
                    <option value="3">Sulit</option>
                </select>
            </div>
        </div> 
        <div class="content">
        <label class="control-label col-sm-4">Jumlah Soal</label>
            <div class="select-box">
                <select class="form-control" name="jumlahsoal" id="jumlahsoal">
                    <option value=0>-Pilih Jumlah Soal-</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>                       
            </div>
        </div> 
        <div class="content">
            <!-- <a href="<?= base_url('index.php/workout/mulaitest') ?>" class="button button-round button-teal">Mulai</a> -->
            <!-- <a href="<?= base_url('index.php/workout/wo') ?>" class="button button-round button-teal">Mulai</a> -->
            <input type="submit" name="submit" value="Mulai" class="button button-round button-teal">
        </div>
    </form>
</div>
</div>

<script type="text/javascript">
    function mulai(test) {
        var sub_bab_id = $('#subSelect').val();
        var kesulitan = $("select[name=kesulitan]").val();
        var jumlahsoal = $("select[name=jumlahsoal]").val();
        var babid = $("select[name=bab]").val();



        var data = {
            kesulitan: kesulitan,
            jumlahsoal: jumlahsoal,
            subab: subabid,
            bab:babid
        };
        if (data.kesulitan == 0 || data.jumlahsoal == 0) {
            $('#info').show();
        }else{
            $('.mulai-btn').text('Proses...'); //change button text
            $('.mulai-btn').attr('disabled', true); //set button disable 

            if (data.subab==0) {
                url = "<?php echo base_url() ?>index.php/latihan/tambah_latihan_ajax_bab";
                console.log(data);
            }else{
                url = "<?php echo base_url() ?>index.php/latihan/tambah_latihan_ajax";
            }

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

</script>