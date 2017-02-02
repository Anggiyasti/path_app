<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
    <div class="inner-product-details-right">
        <h3>Passing Grade</h3>
                                                
        <div class="product-details-content">
        <?php if ($data == array()): ?>
        <h4>Tidak ada Passing Grade.</h4>
        <?php else: ?>
        <?php foreach ($data as $p): ?>

            <p><span>Universitas :</span>  <?= $p['universitas'] ?></p>
            <p><span>Program Studi : </span> <?= $p['prodi'] ?></p>
            <p><span>Passing Grade : </span><?= $p['passinggrade'] ?>%</p> 
            <?php 
            endforeach ?>
             <?php endif ?>
        </div>
                                                
    </div>
</div>
</div>