

<div class="courses-box1">
    <div class="single-item-wrapper">
                                            
        <div class="courses-content-wrapper">
            <h3 class="item-title"><a href="#">Prodi <?=$prodi?></a></h3>
            <?php foreach ($data as $univ) : ?>
            
            <ul class="courses-info">
                <li><span><?=$univ['universitas']?></span></li>
                <li><span> <?=$univ['prodi']?></span></li>
                <li><span> <?=$univ['passinggrade']?>%</span></li>
            </ul>
            <br>
            <?php endforeach ?>  
        </div>                            
    </div>                            
</div>
