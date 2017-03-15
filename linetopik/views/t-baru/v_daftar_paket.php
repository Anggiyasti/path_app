      <!-- Page Content -->
      <div id="content" class="page">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Path</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        
        <!-- Activity Content -->
        <div class="animated fadeinup delay-1">
          
          <div class="p-t-20">
          <ul class="tabs">
            <li class="tab"><a class="active" href="#test1">DAFTAR PAKET</a></li>
            
          </ul>
          </div>
            
            <div id="test1">
              <div class="container activity p-l-r-20">
            <div class="row m-l-0">
              <div class="col">
              <?php   $i=0; 
                $nm_paket=''; 
               ?>
                <?php foreach ($datline as $key ): ?>
                                
                  
                    <!-- start header line-->
                    <!-- post item -->
                    <div class="contact">
                      <img alt="" src="<?php echo base_url('assets/app/halo/img/user.jpg')?>">
                      <div class="dot z-depth-1">
                      </div>
                      <p>
                        <a  href="<?=$key['link'];?>" class="media-heading"  id="font-<?=$i;?>" ><?=$key['nm_paket']?></a>
                        <!-- <?=base_url()?>index.php/linetopik/create_session_id_tryout/<?=$key['id_paket']?> -->
                      </p>
                      <span>
                        Deskripsi:' <?=$key['deskripsi']?> ' <br>
                        Jumlah Soal:' <?=$key['jumlah_soal']?> ' <br>
                        Durasi:' <?=$key['durasi']?> '
                      </span><br>
                      <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>">
                      <!-- <a class="waves-effect waves-light btn primary-color" href="<?=base_url()?>index.php/linetopik/report_paket/<?=$key['id_paket'] ?>" id="font-<?=$i;?>">Report</a> -->



                    
                        
                    </div>
                     <!-- / post item -->
                   

                    
                                
  <?php  $i ++;
  endforeach ?>
    <input id="n" type="text"  value="<?=$i;?>" hidden="true">
                                
                        
                            
                        
                          </div>
                          </div>
                        <!-- / post item -->
                     
               
              </div>
            </div>
          </div>
        </div>
      
      
<script type="text/javascript">
    $(document).ready(function() { 
        var n = $("#n").val();
        console.log(n);
        $("#ico-0").css("background","red");
        for (i = 0; i < n; i++) {
        var status = $("#status-"+i).val();
        
            if (status=="disable") {
                 $("#ico-"+i).css("background","white");
                 $("#font-"+i).css("color","black");
            } 
           
        }
    });
</script>
