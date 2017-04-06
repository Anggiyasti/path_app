 <!-- Page Content -->
      <div id="content" class="page">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Video</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>

<?php foreach ($video as $key ): ?>
	<?php if ($key['nama_file'] != null): ?>
		<video class="responsive-video" controls style="height: 600px; width: 100%">
        <source src="<?=base_url('assets/video/'.$key['nama_file'])?>" type="video/mp4" >
		</video>
 <?php else: ?>
 	<iframe class="youtubePlayer" width="100%" height="600"  frameborder="0" src="<?=$key['link']?>" allowfullscreen></iframe>

 	<?php endif ?>

<?php endforeach ?>



 </div>
