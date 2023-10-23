<!doctype html>
<html>
<head>
    <title>Zoek reservering</title>
</head>
<body>
<h1>Zoek reservering</h1>

<?php
require_once "classes/restaurant.class.php";

$ID = $_POST["ID"];
$ID1 = new restaurants($ID);
$ID1->searchrestaurant();
?>


</body>
</html>
