<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Reset Password</h2>
<form action="<?php echo base_url('index.php/login/reset_password'); ?>" method="POST">
	<div>
		<label>Email:</label>
		<input type="email" name="email" value="<?php echo set_value('email'); ?>">
	</div>
	<div>
		<input type="submit" name="submit" value="Reset Password">
	</div>
</form>
<?php 
echo validation_errors('<p class="error">');
if (isset($error)) {
	echo '<p class="error">' . $error . '</p>';
}
 ?>

</body>
</html>