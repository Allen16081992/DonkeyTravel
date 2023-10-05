<?php // Loubna Faress
session_start();
// Controleer of de gebruiker is ingelogd
if (isset($_SESSION['gebruikersnaam'])) {
    // Verwijder alle sessievariabelen
    session_unset();

    // Vernietig de sessie
    session_destroy();
}

// Stuur de gebruiker terug naar de inlogpagina of een andere gewenste bestemming
header("Location: index.php");
exit;
?>