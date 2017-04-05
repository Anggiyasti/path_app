
<body>
<?php foreach ($video as $key ): ?>
	<?php if ($key['nama_file'] != null): ?>
		<video width=100% controls>
        <source src="<?=base_url('assets/video/'.$key['nama_file'])?>" type="video/mp4">
                                                                                    </video>
 <?php else: ?>
 	<iframe class="youtubePlayer" width="100%" height="630"  frameborder="0" src="https://www.youtube.com/embed/Y-FhDScM_2w" allowfullscreen></iframe>

 	<?php endif ?>

<?php endforeach ?>



</body>
