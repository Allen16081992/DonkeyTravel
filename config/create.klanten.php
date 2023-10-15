<?php // Loubna Faress
    require_once "classes/database.class.php";
    require_once "classes/klanten.class.php";

    if (isset($_POST['submit'])){
        $nieuweklanten = new klanten ($_POST['Naam'], $_POST['Email'], $_POST['Telefoon'], $_POST['Wachtwoord']);
        $nieuweklanten->createklanten();

        // Khaqan Ul Haq Awan
        // echo "Klant is aangemaakt";

        // Dhr. Allen Pieter, betere notificatie
        // Welkomst bericht
        echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
                <title>Donkey Travel - Adventure Awaits</title>
            </head>
            <body>
            <header>
                <nav class='navbar navbar-expand-lg navbar-light bg-success'>
                    <a class='navbar-brand'>Donkey Travel</a>
                </nav>
            </header>
            <div class='card text-center'>
                <div class='card-header'>Gefeliciteerd! Uw nieuwe account is aangemaakt.</div>
                <div class='card-body'>
                    <h5 class='card-title'>Welkom bij DonkeyTravel</h5>
                    <p class='card-text'>Bedankt voor uw aanmelding. U kunt nu inloggen.</p>
                    <p class='card-text'>Klik hier om terug te gaan naar onze homepage.</p>
                    <a href='../index.php?success' class='btn btn-primary'>Homepage</a>
                </div>
            </div>
            </body>
        </html>";
    }