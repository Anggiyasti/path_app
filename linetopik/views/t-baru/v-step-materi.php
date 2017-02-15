 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
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
            <li class="tab"><a class="active" href="#test1">Timeline Bab <?= $datMateri['namaTopik']; ?></a></li>
          </ul>
          </div>
            
            <div id="test1">
              <div class="container activity p-l-r-20">
            <div class="row m-l-0">
              <div class="col">
              <!-- Start Time Line -->
              <?php 
              $i=0;
              foreach ($datline as $key ): ?>
                <div class="contact">
                  <!-- <img alt="" src="<?php echo base_url('assets/app/halo/img/user.jpg')?>"> -->
                  <ul class="media-list media-list-feed grid-col grid-col-3" >
                  <li  class="media">
                  <div class="media-object pull-left ">
                                        <i href="<?=$key['link'];?>"  class="<?=$key['icon']?> " id="ico-<?=$i;?>"></i>
                                    </div>
                                </li>
                                </ul>
                  <div class="dot z-depth-1">
                  </div>
                  <p>
                    <a href="<?=$key['link'];?>" class="media-heading"  id="font-<?=$i;?>" ><?=$key['namaStep']?></a>
                  </p>
                  <!-- Untuk menampung staus step disable or enable -->
                  <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>">
                  <span>Sent you some photos.</span>
                </div>
              <?php 
              $i ++;
              endforeach ?>
              <!-- menampung nilai panjang array -->
              <input id="n" type="text"  value="<?=$i;?>" hidden="true">
              <!-- END Tieme line -->

                <div class="contact">
                  <span class="date">6 - 7 pm</span>
                  <div class="dot z-depth-1">
                  </div>
                  <p>
                    Thomas Smith
                  </p>
                  <span>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.</span>
                </div>


              </div>
            </div>
          </div>
        </div>
        <div class="p-t-20">
          <article>
                        <div class="post-info">
                            <!-- <div class="date-post"><div class="day"><?=$tgl?></div><div class="month"><?=$bulan?></div></div> -->
                            <div class="post-info-main">
                                <div class="author-post">nama Materi:' <?= $datMateri['judulMateri']; ?> '</div>
                            </div>
                            <div class="comments-post">Materi</div>
                        </div>
                         <p><?= $datMateri['isiMateri']; ?></p>
                            
                        </article>
        </div>


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
                 $("#ico-"+i).css("background","white");
                 $("#font-"+i).css("color","black");
            } 
           
        }
    });
</script>