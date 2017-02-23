<div>
<form action="<?=base_url()?>index.php/learningline/formstep3/<?=$mapel['id']?>" method="post">

		<?=$mapel['id']?>
<select name="bab">
	<?php foreach ($bab as $key) { ?>
		<option value="<?=$key['id_bab']?>"><?=$key['judul_bab']?></option>
	<?php } ?>
</select>	
<input type="submit" name="" value="sumbit">
</form>
<?php foreach ($bab as $key) { ?>
<a href="<?=base_url()?>index.php/learningline/formstep/<?=$mapel['id']?>/<?=$key['id_bab']?>"><?=$key['judul_bab']?></a>
<?php } ?>
</div>