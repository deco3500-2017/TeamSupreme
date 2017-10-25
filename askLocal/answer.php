<!DOCTYPE html>
<html>
<head>
<title>Answers</title>
<link rel="stylesheet" type="text/css" href="style/questions.css">
<link rel="stylesheet" type="text/css" href="style/answer.css">
    
<?php
	
	session_start();
	try {
		//connect to the db
		$host = 'localhost';
		$db   = 'askLocal';
		$user = 'root2';
		$pass = '';
		$charset = 'utf8';
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$pdo = new PDO($dsn, $user, $pass, $opt);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
	if (isset($_POST["question"])) {
		$Q = $_POST["question"];
		$_SESSION['question'] = $Q;
	} else {
		//Uh oh
		$_POST['question'] = 1;
		$_SESSION['question'] = 1;
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
           <h1>Answer Questions</h1>
        </div> 

        <?php 
        $stmtQ = $pdo->prepare('SELECT * FROM question WHERE QID = ?');
        $stmtQ->execute([$_SESSION['question']]);
        while ($rowQ = $stmtQ->fetch()){
            echo "<div class=\"question\">";
            
            $formattedDate = date_create_from_format('Y-m-d H:i:s', $rowQ['Time']);
            $formattedDate = $formattedDate -> format('d M, g:ia');
            
            echo "<span class=\"questiontext\">" . $rowQ['Qtext'] . "</span>" . "<br>";
            echo "<span class=\"questioninfo\">" . $rowQ['User'] . " asked at " . $formattedDate . "</span>" . "<br>" . "<br>";
            $currentQ = $rowQ['QID'];
            //echo "</div>";
        }
        ?>

        <?php
        echo "<form action=\"answer.php\" method=\"POST\">";
        echo "<input id=\"answerinput\" type=\"text\" name=\"answer".$currentQ."\">";
        echo "<input type=\"text\" name=\"question\" value=\"". $_SESSION['question'] ."\" hidden>" . "<br>";
        echo "<input id=\"topsubmit\" type=\"submit\" label=\"Answer\" value=\"Answer\"><br>" . "</div>";

        echo "</form>";
        if (isset($_POST["answer".$currentQ.""])) {
            //add whatever answer is asked to table "answers"
            $answer = $_POST["answer".$currentQ.""];
            $date = date('Y-m-d H:i:s');

            try {
                $pdo->prepare("INSERT INTO answer VALUES (NULL,?,?,?,?,?)")->execute([$answer, $_SESSION['question'], 'John', rand(0,15), $date]);
            } catch (PDOException $e) {
                if ($e->getCode() == 1062) {
                    // Take some action if there is a key constraint violation, i.e. duplicate name
                    echo "there was a problem with your answer";
                } else {
                    throw $e; 
                }
            }
        }
        ?>

        <h2>Previous Answers</h2>
        <?php
        $stmtA = $pdo->prepare('SELECT * FROM answer WHERE QID = ? ORDER BY Score DESC');
        $stmtA->execute([$_SESSION['question']]);
        while ($rowA = $stmtA->fetch())
        {
            
            $formattedDate = date_create_from_format('Y-m-d H:i:s', $rowA['Time']);
            $formattedDate = $formattedDate -> format('d M, g:ia');
            
            echo "<div class=\"answer\">";
            echo "<span class=\"answerinfo\">" . $rowA['User'] . " answered at " . $formattedDate . "</span>" . "<br>";
            echo "<span class=\"answertext\">" . $rowA['Atext'] . "</span>" . "<br>";
            echo "Score: ". $rowA['Score'] . "<br>";
            //Do the upvotes here

            echo "<form action=\"answer.php\" method=\"POST\">";
                echo "<input type=\"text\" name=\"question\" value=\"". $_SESSION['question'] ."\" hidden>";
				echo "<input type=\"text\" name=\"answervote\" value=\"". $rowA['AID'] ."\" hidden>";
                echo "<div class=\"voting\">" . "<input id=\"upvote\" type=\"submit\" label=\"Answer\" name=\"vote\" value=\"Upvote\">";
                echo "<input id=\"downvote\" type=\"submit\" label=\"Answer\" name=\"vote\" value=\"Downvote\">" . "</div>";
            echo "</form>";


            echo "</div>\n";

            if (isset($_POST['vote'])) {
                try {
                    if ($_POST['vote'] == "Upvote") {
                        $newscore = $rowA['Score'];
                        $newscore = $newscore+1;
                    } else {
                        $newscore = $rowA['Score'];
                        $newscore = $newscore-1;
                    }
                    $stmtU = $pdo->prepare('UPDATE answer SET Score = ? WHERE QID = ? AND AID = ?');
                    $stmtU->execute([$newscore, $_SESSION['question'], $_POST['answervote']]);
                } catch (PDOException $e) {

                }

            }

        }

        ?>
        <br>
    </div>
</body>

</html>