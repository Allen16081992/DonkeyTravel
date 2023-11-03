<!doctype html>
<html>
<head>
    <title>update reservering 3</title>
</head>
<body>
<h1>update reservering 3</h1>

<?php
require_once "classes/restaurant.class.php";

$ID = $_POST["ID"];
$Naam = $_POST["Naam"];
$Email = $_POST["Email"];
$Adres = $_POST["Adres"];
$Telefoon = $_POST["Telefoon"];
$Coordinaten = $_POST["Coordinaten"];



// maken object
$ID1 = new restaurants($Naam, $Email, $Adres, $Telefoon, $Coordinaten);
$ID1->updaterestaurant($ID);
echo "Dit zijn de gewijzigde gegevens: <br/>";
echo $ID."<br/>";
$ID1->afdrukkenrestaurant();

?>

</body>
</html>
