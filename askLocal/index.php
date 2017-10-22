<!DOCTYPE html>
<html>
<head>
<title>home screen</title>
<link rel="stylesheet" type="text/css" href="style/index.css">
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
    <div class="sitewrapper">
        <div class="titleheader">
            <h1>AskLocal</h1>
        </div>
        
        <form action="question.php" method="POST">
            <input id="map" type="image" src="images/map.png" name="location" value="UQ Art Museum">
        </form>
        
        <div class="bottomtext">
            <?php echo "Welcome ".$user."!</br>"; ?>
            <p>Click the map to ask a question about UQ Art Museum<p/>

               <p>Or choose from the list below:</p>
               <form action="question.php" method="POST">

                  <ul>
                     <li><input class="button" type="submit" label="Botanical Gardens" name="location" value="Botanical Gardens"></li>
                     <li><input class="button" type="submit" label="Carara Markets" name="location" value="Carara Markets"></li>
                     <li><input class="button" type="submit" label="Other" name="location" value="Other"></li>
                  </ul>

               </form>
        </div>
    </div>

</body>

</html>
