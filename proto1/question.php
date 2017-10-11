<!DOCTYPE html>
<html>
<head>
<title>Questions</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<h1>UQ Art Museum</h1>
	<p>What do you want to know about the art museum???<p/>
	<form action="answer.html" method="GET">
		<input type="text" name="question"><br>
		<input type="submit" label="Ask">
		<?php
		//add whatever question is asked to table "questions"
		
		?>
	</form>
	
	<h2>Previously asked Questions:</h2>
	<?php
	//for each question in table "questions", show the question and then a list of answer	s
	
	?>
</body>

</html>