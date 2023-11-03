<?php // Khaqan Ul Haq Awan

// Dhr. Allen Pieter: echo "De reservering..." naar session voor gebruik op andere pagina's.
include_once 'classes/session_management.class.php';

require_once "classes/restaurant.class.php";

//$ID = $_POST["rest_id"]; is auto-increment
$Naam = $_POST["Naam"];
$Adres = $_POST["Adres"];
$Email = $_POST["Email"];
$Telefoon = $_POST["Telefoon"];
$Coordinaten = $_POST["Coordinaten"];

if (isset($_POST['CreateRest'])){
    $nieuwerestaurant = new restaurants($ID, $Naam, $Adres, $Email, $Telefoon, $Coordinaten);
    $nieuwerestaurant->createrestaurant();
    //echo "Reservering aangemaakt";
    // bericht
    $_SESSION['success'] = "Restaurant is aangemaakt.";
}

// Stuur naar client omgeving
header("Location: ../donkey_client.php");
exit();