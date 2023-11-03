<?php // Khaqan Ul Haq Awan

    // Dhr. Allen Pieter: echo "De reservering..." naar session voor gebruik op andere pagina's.
    include_once 'classes/session_management.class.php';
?>
<!doctype html>
<html>
<head>
    <title>delete reservering 3</title>
</head>
<body>
<h1>delete reservering 3</h1>

<?php
require "classes/restaurant.class.php";

$ID = $_POST["rest_id"];
//$verwijderen = $_POST["verwijderBox"];

//if ($verwijderen=="ja")
if ($_SERVER["REQUEST_METHOD"] == "POST")
{  
    $ID1 =  new restaurants($ID, $Naam, $Adres, $Email, $Telefoon, $Coordinaten);
    $ID1->deleterestaurant();
    //echo "De reservering is vewijderd <br/>";
    // bericht
    $_SESSION['success'] = "Restaurant is vewijderd.";
}
else
{
    //echo "De reservering is niet verwijderd <br/>";
    // bericht
    $_SESSION['success'] = "Restaurant is niet verwijderd.";
}
// Stuur naar client omgeving
header("Location: ../donkey_client.php");
exit();
?>
</body>
</html>