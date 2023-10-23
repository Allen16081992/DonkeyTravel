<!doctype html>
<html lang="nl">
<head>
    <title>Zoek reservering</title>
</head>
<body>
<h1>zoek reservering</h1>
<form action="" method="post">
    <label for="ID">ID:</label>
    <input type="text" id = "ID" name="ID"><br/>
    <input type="submit">
</form>
</body>
</html>
<?php
require_once "classes/restaurant.class.php";

$ID = $_POST["ID"];
$ID1 = new restaurants($ID);
$ID1->searchrestaurant();
?>
