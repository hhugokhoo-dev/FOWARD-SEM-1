<!DOCTYPE html>
<html>
<head>
  <title>Simple Quiz Form</title>
</head>
<body>

	<h1>Simple Quiz</h1>
	<form action="process_quiz.php" method="post">
	  <p>1. What is the capital of France?</p>
	  <input type="radio" name="q1" value="London">
	  <label>London</label><br>
	  <input type="radio" name="q1" value="Paris">
	  <label>Paris</label><br>
	  <input type="radio" name="q1" value="Rome">
	  <label>Rome</label><br>
	
	  <p>2. What is 2 + 2?</p>
	  <input type="radio"name="q2" value="3">
	  <label>3</label><br>
	  <input type="radio"name="q2" value="4">
	  <label>4</label><br>
	  <input type="radio"name="q2" value="5">
	  <label>5</label><br>
	
	  <input type="submit" value="Submit">
	</form>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST["q1"]) || empty($_POST["q2"])){
        echo "<P>PLease answer both questions</p>";
    } else{
$q1 = $_POST["q1"];
$q2 = $_POST["q2"];

$count = 0;if($q1 === 'Paris' && $q2 === '4'){
    $count += 2;
}elseif  ($q1 === 'Paris' || $q2 === '4'){
    $count += 1;
}

    


    echo "<p>Quiz answer:</p>";
    echo"<p>Correct answer: $count out of 2.</p><br>";

        echo "<p>What is the capital of France?</p>";
        echo "<p>Your answer: " . htmlspecialchars($q1) . "</p>";
        echo "<p>Correct answer: Paris</p><br>";

        echo "<p>What is 2+2?</p>";
        echo "<p>Your answer: " . htmlspecialchars($q2) . "</p>";
        echo "<p>Correct answer: 4</p><br>";
}
}else{
    echo"<p><em>Submit to see the POST resulte here,</em></p>";
}
?>






</body>
</html>