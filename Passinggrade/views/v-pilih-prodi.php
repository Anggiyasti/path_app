<div id="page-content" class="header-clear">
    <div id="page-content-scroll"><!--Enables this element to be scrolled --> 
    <form action="<?= base_url() ?>index.php/passinggrade/prodi" method="post">      
        <div class="content"> 
        <h2>Prodi</h2>
            <?php foreach ($data as $row): ?>
            <a href="<?=base_url()?>index.php/passinggrade/prodi/<?=$row['prodi'] ?>" >
            <h3><strong><?=$row['prodi'] ?></strong></h3>
            <?php endforeach ?>                          
        </div>
    </form> 
</div>
</div>
   