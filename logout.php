<?php // Loubna Faress
    session_start();

    // Verwijder alle sessievariabelen
    session_unset();

    // Vernietig de sessie
    session_destroy();

    // Stuur de gebruiker terug naar de homepage
    header("Location: index.php");
    exit;