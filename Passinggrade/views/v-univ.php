<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
<div class="decoration decoration-margins"></div>        
        <div class="content"> 
        <?php foreach ($data as $univ) : ?>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item dropdown-toggle bg-red-dark"><i class="fa ion-ios-home-outline"></i><em><?=$univ['universitas']?></em><i class="ion-android-add"></i></a>
                <div class="dropdown-content bg-red-light">
                    <a href="#" class="dropdown-item"><i class="ion-ios-book-outline"></i><em><?=$univ['prodi']?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?=$univ['passinggrade']?>%</em><i class="ion-ios-arrow-thin-right"></i></a>
                </div>
            </div>
           <?php endforeach ?>                             
        </div> 
</div>
</div>
   