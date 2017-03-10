 <!-- Page Content -->
      <div id="content" class="page">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Hasil Quiz</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        


<!-- <div class="page-title" style="background:#2b3036">

    <div class="grid-row">

        <h1>Hasil Quiz</h1>

    </div>

</div> -->
 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
    <div class="page-content grid-row">
        <div class=" grid-col-row clear-fix" >
            <div class="grid-col grid-col-3 sidebar" >
           <!-- Pencarian -->
                            <!-- <aside class="widget-search">
                                <form method="get" class="search-form" action="<?=base_url()?>index.php/linetopik/cariTopik"  accept-charset="utf-8" enctype="multipart/form-data">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" class="search-field" placeholder="Search"  name="keycari" title="Search for:">
                                    </label>
                                    <input type="submit" class="search-submit" value="GO">
                                </form>
                            </aside> -->
                       <!-- /Pencarian -->
                          <!-- <h2><a href="<?=base_url('index.php/linetopik/timeLine/').$topikUUID?>"><?=$namaTopik; ?></a></h2>  -->
                          <hr class="divider-big">
                                                  <!-- Start Time Line -->
                            <ul class="media-list media-list-feed grid-col grid-col-3" >
                            <?php 
                            $i=0;
                            foreach ($datline as $key ):           
                            ?>
                                <li  class="media">
                                     <div class="media-object pull-left ">
                                        <!-- <i href="<?=$key['link'];?>"  class="<?=$key['icon']?> " id="ico-<?=$i;?>"></i> -->
                                    </div>
                                    <div class="media-body">
                                        <!-- Untuk menampung staus step disable or enable -->
                                        <input type="text" id="status-<?=$i;?>" value="<?=$key["status"];?>" hidden="true">
                                       <!--  // Untuk menampung staus step disable or enable  -->
                                        <!-- <a href="<?=$key['link'];?>" class="media-heading"  id="font-<?=$i;?>" ><?=$key['namaStep']?></a> -->
                                    </div>
                                </li>       
                            <?php 
                            $i ++;
                            endforeach ?>
                            </ul>
                            <!-- menampung nilai panjang array -->
                            <input id="n" type="text"  value="<?=$i;?>" hidden="true">
                            <!-- END Tieme line  -->
                
            </div>
            <div class="grid-col grid-col-9">
                <main>
                    <!-- post item -->
                    <div class="blog-post">
                        <article>
                        
                        <!-- <div>
                        <ul >
                         <li style="">Jumlah Soal   : <?=$data['jumlahsoal'];?> Soal </li>
                         <li>Syarat Lulus  : <?=$data['syarat'];?> Soal Benar </li>
                         <li>Jumlah Benar  : <?=$data['jumlahBenar'];?></li>
                         <li>Jumlah Salah  : <?=$data['jumlahSalah'];?></li>
                         <li>Jumlah Kosong : <?=$data['jumlahKosong'];?></li>
                         <li>Hasil : <?=$data['hasil'];?></li>
                         <li>Ulangi Test</li>
                         </ul>
                        </div> -->
                        <div class="cart_totals">   
                                
                                <table>
                                    <tbody>
                                        <tr class="">
                                            <th>Syarat Lulus</th>
                                            <!-- <td>Benar <?=$data['syarat'];?> dari <?=$data['jumlahsoal'];?> soal</td> -->
                                        </tr>
                                      
                                        <tr class="cart-subtotal">
                                            <th>Jumlah Benar  </th>
                                            <td><span class="amount"> <?=$data['jumlahBenar'];?></span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Jumlah Salah </th>
                                            <td>    
                                                <?=$data['jumlahSalah'];?>      
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Jumlah Kosong </th>
                                            <td><span class="amount"><?=$data['jumlahKosong'];?></span></td>
                                        </tr> 
                                        <tr class="order-total">
                                            <th>Total score</th>
                                            <td><span class="amount"> <?=$tot?></span></td>
                                        </tr>           
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <!-- Score total = <?=$tot?> -->
                            </div>
                         <br>
                            <div class="tags-post">
                            <!-- <a href="#" rel="tag"><?=$bab;?></a>
                            <a href="#" rel="tag"><?=$namaTopik;?> </a> -->
                        </div>
                        </article>
                       
                    </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                  

                </main>
            </div>

        </div>
    </div>
     </div>
    <!-- / content -->

  <!-- END Page Content -->
<script type="text/javascript">
    $(document).ready(function() { 
        var n = $("#n").val();
        // console.log(n);
        // $("#ico-0").css("background","black");
        for (i = 0; i < n; i++) {
        var status = $("#status-"+i).val();
        
            if (status=="disable") {
                 $("#ico-"+i).css("background","#b0b0b0");
                 $("#font-"+i).css("color","#b0b0b0");
            } 
           
        }
    });
</script>