<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<form action="<?php echo base_url(); ?>index.php/ceklogin" method="POST">
	username: <input type="text" name="username"> <br>
	password: <input type="password" name="password"> <br>
	<input type="submit" value="submit">
	</form>
</body>
</html>