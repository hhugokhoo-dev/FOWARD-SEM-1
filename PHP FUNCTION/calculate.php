<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function calculateRectangleArea( $length,$width) {
     $area =$length * $width;
     return $area;
}

$length=10;
$width=5;

echo calculateRectangleArea($length,$width);
?>

</body>
</html>