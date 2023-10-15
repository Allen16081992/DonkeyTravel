<!doctype html>
<html>
<head>
    <title>Zoek klant</title>
</head>
<body>
<h1>Zoek klant</h1>

<?php

require "classes/restaurant.class.php";
include_once "classes/database.class.php";

$ID = $_POST["ID"];
$ID1 = new restaurants();
$ID1->searchrestaurant($ID);
$ID1->afdrukkenrestaurant();
?>


</body>
</html>
