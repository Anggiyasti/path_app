 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
<style type="text/css">
  .contact {
    padding-top: 15px;
    padding-left: 0;
  }

  #bulet {
    border-color: yellow;
  }
</style>
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
       
        <!-- Article Content -->
        <div class="animated fadeinup delay-1">
          <div class="page-content">
            <div class="p-t-20">
          <ul class="tabs">
            <li class="tab"><a class="active" >Timeline </a></li>
          </ul>
          </div>
            <!-- <div id=""> -->
              <div class="container activity p-l-r-20">
            <div class="row m-l-0">
              <div class="col">
              <!-- Start Time Line -->
              <?php 
              $i=0;
              foreach ($datline as $key ): ?>
                <div class="contact" style="background-color: white">
                 
                  <div class="dot z-depth-1" id="bulet-<?=$i;?>">
                  </div>
                  <div class="step">
                  <p>
                    <a href="<?=$key['link'];?>#test" class="media-heading"  id="font-<?=$i;?>" ><?=$key['namaStep']?></a>
                  </p>
                  <!-- Untuk menampung staus step disable or enable -->
                  <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>" hidden="true">
                  </div>
                </div>
              <?php 
              $i ++;
              endforeach ?>
              <!-- menampung nilai panjang array -->
              <input id="n" type="text"  value="<?=$i;?>" hidden="true">
              <!-- END Tieme line -->

              </div>
            </div>
          </div>
        <!-- </div> -->



  </div>
  <!-- End of Page Content -->
<script type="text/javascript">
    $(document).ready(function() { 
        var n = $("#n").val();
        console.log(n);
        $("#ico-0").css("background","red");
        for (i = 0; i < n; i++) {
        var status = $("#status-"+i).val();
        
            if (status=="disable") {
                 $("#ico-"+i).css("background","red");
                 $("#font-"+i).css("color","black");
                 $("#bulet-"+i).css("border-color","black");
            } 
           
        }
    });
</script>