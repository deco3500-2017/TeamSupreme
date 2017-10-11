<!DOCTYPE html>
<html>
<head>
<title>home screen</title>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
	session_start();
?>
</head>

<body>
	<h1>AskLocal</h1>
	<a href="question.php"><img src="images/map.png" /></a>
	<p>click the map to ask a question about uq art museum<p/>
	
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
