<!DOCTYPE html>
<html>
<head>
<title>home screen</title>
<link rel="stylesheet" type="text/css" href="style/index.css">
<?php
	session_start();
	/*
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
	*/
?>
</head>

<body>
    <div class="sitewrapper">
        <div class="titleheader">
            <div class="leftbuttons">
				<a href="index.php"><img src="images/home.png"></a>
			</div>
            <div class="rightbuttons">
                <a class="rightnavbutton" href="login.php"><h3>Logout</h3></a>
				<a class="rightnavbutton" href="profile.php"><img src="images/profile.png"></a>
			</div>
				<h1>AskLocal</h1>
        </div>
        
        <form action="question.php" method="POST">
            <div class="map">
                <input id="maptopleft" type="image" src="images/maptopleft.png" name="location" value="Top Left"><input id="maptopright" type="image" src="images/maptopright.png" name="location" value="Top Right"><input id="mapbottomleft" type="image" src="images/mapbottomleft.png" name="location" value="Bottom Left"><input id="mapbottomright" type="image" src="images/mapbottomright.png" name="location" value="Bottom Right"> 
            </div>
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
