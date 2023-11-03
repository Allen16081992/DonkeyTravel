<?php // Khaqan Ul Haq Awan
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require "classes/database.class.php";
require_once "classes/restaurant.class.php";

if (isset($_POST['CreateRest'])){
    $nieuwerestaurant = new restaurants($_POST['Naam'], $_POST['Adres'], $_POST['Email'], $_POST['Telefoon'], $_POST['Coordinaten']);
    $nieuwerestaurant->createrestaurant();
    echo "Reservering aangemaakt";
}
?>

