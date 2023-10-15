<!doctype html>
<html lang="nl">
<head>
    <title>Read reservering</title>
</head>
<body>
<h1>Read Reservering</h1>
<p>Dit zijn alle gegevens uit de restaurants tabel.</p>
<?php
require "config/classes/restaurant.class.php";
include_once "classes/database.class.php";
$ID1 = new restaurants();
$ID1->readrestaurant();
?>

</body>
</html>
