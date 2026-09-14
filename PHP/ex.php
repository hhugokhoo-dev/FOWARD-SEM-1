<!DOCTYPE html>
<html>
<head>
<title>Feedback Form</title>
</head>
<body>

	<h1>Feedback Form</h1>
	<form action="ex.php" method="post">
	<label for="name">Name (optional):</label>
	<input type="text" id="name" name="name"><br><br>
	
	<label for="email">Email (optional):</label>
	<input type="email" id="email" name="email"><br><br>
	
	<label for="comments">Comments (required):</label>
	<textarea id="comments" name="comments" rows="4" cols="50" required></textarea><br><br>
	
	<input type="submit" value="Submit">
	</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name =$_POST["name"];
    echo "<p>Thank you for your feedback! Here is the submitted data:</p>";
}else{
    echo "<p><em>Submit the form above to see the result here.</em></p>";
}
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name =$_POST["name"];
    echo "<p>Name:
" . htmlspecialchars($name) . "</p>";
}else{
}
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name =$_POST["email"];
    echo "<p>Email:
" . htmlspecialchars($name) . "</p>";
}else{
}
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name =$_POST["comments"];
    echo "<p>Comments:
" . htmlspecialchars($name) . "</p>";
}else{
}
?>


</body>
</html>