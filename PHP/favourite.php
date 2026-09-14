<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $favourites =["Harry Porter","Evil Dead","HOK","CRK","WONDA"];
    $intro ="Here is a list of my favorite books:";

    $highlight = true;

    ?>
    <p<?=intro?>></p>

    <ol>
<?php foreach ($favourites as $index =>$item) ?>
<?php if [$highlight && $index ===0] :?>
<li 

</body>
</html>
