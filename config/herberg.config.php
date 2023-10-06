<?php // Dhr. Allen Pieter
    // These variables are free to use by anything.
    if(isset($_POST['AddHerb']) && isset($_POST['submit'])) {
        
        // Absorb submission data
        $name = $_POST['name'];
        $adres = $_POST['adres'];
        $email = $_POST['email']; 
        $phone = $_POST['phone']; 
        $latlon = $_POST['coordinates']; 
        
        // Initialise signup class
        require_once "classes/database.class.php";
        require_once "classes/herberg.class.config.php";
        require_once "controller/herberg.control.php";

        $herb = new HerbergControl($name, $adres, $email, $phone, $latlon);

        // Error handlers
        $herb->verifyHerberg();

        // Dismiss to homepage
        header('location: ../donkey_client.php');
        exit();
    }