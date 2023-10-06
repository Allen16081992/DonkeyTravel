<?php // Loubna Faress
    require "classes/database.class.php";
    require_once "classes/klanten.class.php";

    if (isset($_POST['submit'])){
        $nieuweklanten = new klanten ($_POST['Naam'], $_POST['Email'], $_POST['Telefoon'], $_POST['Wachtwoord']);
        $nieuweklanten->createklanten();
        echo "Klant is aangemaakt";
    }
?>

