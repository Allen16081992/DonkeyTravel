<?php // Khaqan Ul Haq Awan

    // Dhr. Allen Pieter: echo "De reservering..." naar session voor gebruik op andere pagina's.
    include_once 'classes/session_management.class.php';
?>
<!doctype html>
<html>
<head>
    <title>update reservering 3</title>
</head>
<body>
<h1>update reservering 3</h1>

<?php
require_once "classes/restaurant.class.php";

$ID = $_POST["rest_id"];
$Naam = $_POST["Naam"];
$Adres = $_POST["Adres"];
$Email = $_POST["Email"];
$Telefoon = $_POST["Telefoon"];
$Coordinaten = $_POST["Coordinaten"];

// maken object
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $ID2 = new restaurants($ID, $Naam, $Adres, $Email, $Telefoon, $Coordinaten);
    $ID2->updaterestaurant();
    //echo "Dit zijn de gewijzigde gegevens: <br/>";
    //echo $ID."<br/>";
    //$ID1->afdrukkenrestaurant();

    // bericht
    $_SESSION['success'] = "Restaurant is gewijzigd.";
}

// Stuur naar client omgeving
header("Location: ../donkey_client.php");
exit();
?>
</body>
</html>