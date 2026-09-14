<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=form, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="forms.php" method="post">
<label for="name">Name:</label>
<input type="text" id="name" name="name">
<input type="submit" value="submit">


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name =$_POST["name"];
    echo "<p><strong>POST Result:</strong> Hello," . htmlspecialchars($name) . "!</p>";
}else{
    echo "<p><em>Submit the form above to see the POST result here.</em></p>";
}

?>

    </form>
</body>
</html>