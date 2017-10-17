<!DOCTYPE html>
<html>
<head>
<title>home screen</title>
<link rel="stylesheet" type="text/css" href="style/style.css">
<?php
	session_start();
	if (isset($_POST["username"])){
		if ( $_POST["username"] != ""){
			//change the username
			$user = $_POST["username"];
			$_SESSION["username"] = $user;
		} else {
			header("Location: http://asklocal.uqcloud.net/login.php", true, 301);
			//header("Location: http://localhost/asklocal/login.php", true, 301);
			exit();
		}
	} else {
		header("Location: http://asklocal.uqcloud.net/login.php", true, 301);
		//header("Location: http://localhost/asklocal/login.php", true, 301);
		exit();
	}
?>
</head>

<body>
	<h1>AskLocal</h1>
	<a href="question.php"><img src="images/map.png" /></a>
	<p>click the map to ask a question about uq art museum<p/>
	<?php echo "welcome ".$user."!</br>"; ?>
	<p>Or choose from the list below:</p>
	<form action="question.php" method="POST">
	
		<ul>
			<li><input type="submit" label="Botanical Gardens" name="location" value="Botanical Gardens"></li>
			<li><input type="submit" label="Carara Markets" name="location" value="Carara Markets"></li>
			<li><input type="submit" label="Other" name="location" value="Other"></li>
		</ul>
	
	</form>
</body>

</html>
