<?php // Khaqan Ul Haq Awan
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require "classes/database.class.php";
require_once "classes/restaurant.class.php";

if (isset($_POST['submit'])){

    $nieuwerestaurant = new restaurants($_POST['Naam'], $_POST['Adres'], $_POST['Email'], $_POST['Telefoon'], $_POST['Coordinaten']);
    $nieuwerestaurant->createrestaurant();
    echo "Reservering aangemaakt";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nieuwe reservering aanmaken</title>
</head>
<body>
<h1>Nieuwe reservering aanmaken</h1>
<form method="post">
    <label>Naam:</label>
    <input type="text" name="Naam"><br>

    <label>Email:</label>
    <input type="text" name="Email"><br>

    <label>Adres:</label>
    <input type="text" name="Adres"><br>

    <label>Telefoon:</label>
    <input type="text" name="Telefoon"><br>

    <label>Coordinaten:</label>
    <input type="text" name="Coordinaten"><br>

    <input type="submit" name="submit" value="Opslaan">
</form>
</body>
</html>
