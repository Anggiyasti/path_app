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


 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
    <div class="page-content grid-row">
        <div class=" grid-col-row clear-fix" >
            
            <div class="grid-col grid-col-9">
                <main>
                    <!-- post item -->
                    <div class="blog-post">
                        <article>
                        
                   
                        <div class="cart_totals">   
                        <h1 align="center">HASIL QUIZ</h1>
                        <?php if ($datline == array()): ?>
                  <h4 class="p-20">Tidak ada Report.</h4>
                <?php else: ?> 
                <table>
                  <thead>
                      <th>Nama Paket</th>
                      <!-- <th>PG</th> -->
                      <th>Detail</th>
                  </thead>                     
                  <tbody>
                    <?php foreach ($datline as $key) :?>
                      <tr>
                        <td><?=$key['nm_paket']?></td>
                        <!-- <td><?=$key['pg']?> %</td> -->
                        <td>Benar : <?=$key['jmlh_benar']?>, Salah : <?=$key['jmlh_salah']?>, Kosong : <?=$key['jmlh_kosong']?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <div>
                         
                  <!-- <h3>Part 2 : <?=$total_pg?> Bab</h3> -->
                </div>
                
                <?php endif ?> 
                       
                    </ul>
                                
                               
                             
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