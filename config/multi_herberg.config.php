<?php // Dhr. Allen Pieter
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'classes/session_management.class.php'; 

if(isset($_POST['AddHerb'])) {
    // Absorb submission data
    $naam = $_POST['name'];
    $adres = $_POST['adres'];
    $email = $_POST['email'];
    $latlon = $_POST['coordinates']; 

    // Initialise signup class
    require_once 'classes/database.class.php';
    require_once "classes/multi_herberg.class.php";
    require_once "controller/multi_herberg.control.php";

    $herberg = new herbergControl($naam, $adres, $email, $latlon);

    // Error handlers
    $herberg->verifySubmission();

    // Dismiss to homepage
    header('location: ../donkey_client.php');
    exit();
}