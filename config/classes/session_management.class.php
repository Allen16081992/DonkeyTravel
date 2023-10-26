<?php // Dhr. Allen Pieter 
    if (!isset($_SESSION)) {
        session_start();
    }
   
    function redirectUnauthorized() {
        if (!isset($_SESSION['klant_id'])) {
            // Provide message
            $_SESSION['error'] = '401: Toegang Geweigerd. Je moet ingelogd zijn om deze pagina te kunnen bekijken.';
            header('Location: ././index.php');
            exit;
        }
    }