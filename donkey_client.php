<?php require_once 'config/autoload.config.php'; 

    try {
        $database = new Database(); // The autoloader will load 'config/classes/Database.php'.
        
        // Use the SessionManagement class
        SessionManagement::setSession();
        SessionManagement::redirectUnauthorized();
        SessionManagement::sessionRegen();
        
        // Use the loaded classes...
    } catch (InvalidArgumentException $e) {
        // Handle class not found exceptions.
        echo 'Error: ' . $e->getMessage();
    }
?>