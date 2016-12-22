<h2>Update password</h2>
<div>
	<form action="" method="POST">
		<div>
			<label>Email</label>
			<?php if (isset($email_hash, $email_code)) { ?>
			<input type="hidden" value="<?php echo $email_hash ?>" name="email_hash">
			<input type="hidden" name="email_code" value="<?php echo(isset($email)) ? $email : ''; ?>">				
			<?php } ?>
		</div>
		<div>
			<label>New Password:</label>
			<input type="password" name="password" value="">
		</div>
		<div>
			<label>New Password Again:</label>
			<input type="password" name="password_conf">
		</div>
		<div>
			<input type="submit" name="submit" value="Update Password">
		</div>
	</form>
</div>