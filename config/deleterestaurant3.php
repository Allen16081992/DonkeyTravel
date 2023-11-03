<!doctype html>
<html>
<head>
    <title>delete reservering 3</title>
</head>
<body>
<h1>delete reservering 3</h1>

<?php
require "classes/restaurant.class.php";

$ID = $_POST["ID"];
$verwijderen = $_POST["verwijderBox"];

if ($verwijderen=="ja")
{
    echo "De reservering is vewijderd <br/>";
    $ID1 =  new restaurants($ID);
    $ID1->deleterestaurant();
}
else
{
    echo "De reservering is niet verwijderd <br/>";
}
?>
</body>
</html>
