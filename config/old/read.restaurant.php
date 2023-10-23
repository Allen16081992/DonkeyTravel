<!doctype html>
<html lang="nl">
<head>
    <title>Read reservering</title>
</head>
<body>
<h1>Read Reservering</h1>
<p>Dit zijn alle gegevens uit de restaurants tabel.</p>
<?php
echo "test1";
include_once "classes/restaurant.class.php";
$ID1 = new restaurants();
$ID1->readrestaurant();
?>
</body>
</html>
