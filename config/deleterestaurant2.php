<!doctype html>
<html>
<head>
    <title>delete reservering 2</title>
</head>
<body>
<h1>delete reservering 2</h1>

<?php
require_once "classes/restaurant.class.php";

$ID = $_POST["ID"];
$ID1 = new restaurants($ID);
$ID1->searchrestaurant();
?>

<form action="deleterestaurant3.php" method="post">
    <input type="hidden" name="ID" value=" <?php echo $ID ?> ">
    <input type="hidden" 	name="verwijderBox" value="nee">
    <input type="checkbox" 	name="verwijderBox" value="ja">
    <label for="verwijderBox"> Verwijder deze reservering.</label><br/><br/>
    <input type="submit"><br/><br/>
</form>

</body>
