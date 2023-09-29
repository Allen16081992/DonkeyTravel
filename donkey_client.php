<?php
    require_once 'config/autoload.config.php';

    try {
        // Attempt to connect to Database class
        //$database = new Database();

        echo "Setting session...\n";
        SessionManagement::setSession();
        //SessionManagement::redirectUnauthorized();
        
    } catch (InvalidArgumentException $e) {
        echo 'Error: ' . $e->getMessage();
    }
?>