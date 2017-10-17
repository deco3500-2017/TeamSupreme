<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/login.css" />
<title>Login form</title>
<?php
	session_start();
?>

</head>
<body>
<div class="imgcontainer">

<img src="images/Logo.jpg" alt="Logo">

</div>
<form class="login" action="index.php" method="POST">
	<input type="text" placeholder="Username" id="username" name="username"> 
	<input type="password" placeholder="Password" id="password"> 
	<div class="button">S
		<input type="submit" label="Sign In" value="Sign In">
	</div>
	<a href="#" class="forgot">forgot password?</a>
</form>
</body>
</html>
