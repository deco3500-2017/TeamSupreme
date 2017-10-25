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
		} 
        else {
            /*
			header("Location: http://asklocal.uqcloud.net/login.php", true, 301);
			//header("Location: http://localhost/asklocal/login.php", true, 301);
			exit();
            */
		}
	} else {
		/*header("Location: http://asklocal.uqcloud.net/login.php", true, 301);
		//header("Location: http://localhost/asklocal/login.php", true, 301);
		exit();
        */
	}
	
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
                <input id="maptopleft" type="image" src="images/maptopleft2.jpg" name="location" value="Hawken Engineering"><input id="maptopright" type="image" src="images/maptopright2.jpg" name="location" value="Advanced Engineering"><input id="mapbottomleft" type="image" src="images/mapbottomleft2.jpg" name="location" value="Axon Building"><input id="mapbottomright" type="image" src="images/mapbottomright2.jpg" name="location" value="General Purpose South"> 
            </div>
        </form>
        
        <div class="bottomtext">
            <?php echo "<span class=\"welcometext\">" .  "Welcome ".$user."! </span></br>"; ?>
            <p>Click the map to ask a question about a location<p/>

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
