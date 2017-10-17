<!DOCTYPE html>
<html>
<head>
<title>Questions</title>
<link rel="stylesheet" type="text/css" href="style.css">

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
	if (isset($_POST["location"]) ){
		if ($_POST["location"] != "") {
			//change the location
			$locale = $_POST["location"];
			$_SESSION["location"] = $locale;
		}
	}
?>

</head>

<body>
	<h1><?php echo $_SESSION['location']?></h1>
	
	<div class="ask">
		<p>What do you want to know about the <?php echo $_SESSION['location']?>???<p/>
		
		<form action="question.php" method="POST">
			<input type="text" name="question"><br>
			
			<?php
			echo "<input type=\"text\" name=\"location\" value\"". $_SESSION['location'] ."\" hidden>";
			echo "<input type=\"submit\" label=\"Ask\"><br>";
			if (isset($_POST["question"])) {
				
				//add whatever question is asked to table "questions"	
				$question = $_POST["question"];
				$date = date('Y-m-d H:i:s');
				
				try {
					$pdo->prepare("INSERT INTO question VALUES (NULL,?,?,?,?,?)")->execute([$question, 'Bosco', $date, $_SESSION['location'], rand(0,15)]);
				} catch (PDOException $e) {
					if ($e->getCode() == 1062) {
						// Take some action if there is a key constraint violation, i.e. duplicate name
						echo "there was a problem with your question";
					} else {
						throw $e;
					}
				}
			}
			?>
		</form>
		</br>
	</div>
	
	
	<h2>Previously asked Questions:</h2>
	<div class="asked">
		<?php
		try {
			//for each question in table "questions", show the question and then a list of answers
			$stmtQ = $pdo->prepare('SELECT * FROM question WHERE Location = ?');
			$stmtQ->execute([$_SESSION['location']]);
			while ($rowQ = $stmtQ->fetch())
			{
				echo "<div class=\"question\">";
				echo $rowQ['User'] . " asked at " . $rowQ['Time'] . ": " . $rowQ['Qtext'] . "</div>\n";
				$currentQ = $rowQ['QID'];
				
				
				//add something to answer questions here
				echo "<form action=\"question.php\" method=\"POST\">";
				echo "Answer a Question:";
				echo "<input type=\"text\" name=\"answer".$currentQ."\">";
				echo "<input type=\"submit\" label=\"Answer\"><br>";
				if (isset($_POST["answer".$currentQ.""])) {
					//add whatever answer is asked to table "answers"	
					$answer = $_POST["answer".$currentQ.""];
					$date = date('Y-m-d H:i:s');
					
					try {
						$pdo->prepare("INSERT INTO answer VALUES (NULL,?,?,?,?,?)")->execute([$answer, $rowQ['QID'], 'John', rand(0,15), $date]);
					} catch (PDOException $e) {
						if ($e->getCode() == 1062) {
							// Take some action if there is a key constraint violation, i.e. duplicate name
							echo "there was a problem with your answer";
						} else {
							throw $e;
						}
					}
				}
				echo "</form>";
				
				
				//answers for each question
				$stmtA = $pdo->prepare('SELECT * FROM answer WHERE QID = ? ORDER BY Score DESC');
				$stmtA->execute([$currentQ]);
				while ($rowA = $stmtA->fetch())
				{
					echo "<div class=\"answer\">";
					echo $rowA['User'] . " answered " . ": " . $rowA['Atext'] . "</div>\n";
				}
				echo "</br>";
			}
		} catch(PDOException $e) {
			if ($e->getCode() == 1062) {
				// Take some action if there is a key constraint violation, i.e. duplicate name
				echo "There are no questions yet. Be the first!";
			} else {
				throw $e;
			}
		}
		?>
	</div>
</body>

</html>






