<?php // Dhr. Allen Pieter
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// This session_start is solely for displaying error messages.
require_once '../classes/session_management.class.php';

//extend influence
class herbergControl extends Herberg {
    private $naam;
    private $adres;
    private $email;
    private $latlon;

    public function __construct($naam, $adres, $email, $latlon) {
        // Part 1 of registration data.
        $this->naam = $naam;
        $this->adres = $adres;
        $this->email = $email;
        $this->latlon = $latlon;
    }

    public function verifySubmission() {
        // Activate security function beneath.
        if(!$this->emptyName()) {
            // Empty input, no company given.
            $_SESSION['error'] = 'U heeft geen bedrijf opgegeven.';
        } elseif(!$this->emptyAddress()) {
            // Empty input, no address given.
            $_SESSION['error'] = 'U heeft geen adres opgegeven.';
        } elseif(!$this->emptyEmail()) {
            // Empty input, no email given.
            $_SESSION['error'] = 'U heeft geen emailadres opgegeven.';
        } elseif(!$this->invalidEmail()) {
            // No valid email.
            $_SESSION['error'] = 'U heeft geen geldig emailadres opgegeven.';
        } elseif(!$this->emptyLatLon()) {
            // Empty input, no location given.
            $_SESSION['error'] = 'U heeft geen locatie opgegeven.';
        } else {
            // Debug information
            echo 'Debug: All checks passed.<br>';
            echo 'Debug: Naam - ' . $this->naam . '<br>';
            echo 'Debug: Adres - ' . $this->adres . '<br>';
            echo 'Debug: Email - ' . $this->email . '<br>';
            echo 'Debug: LatLon - ' . $this->latlon . '<br>';
            
            // Execute the setHerberg method
            $this->setHerberg($this->naam, $this->adres, $this->email, $this->latlon);
        }
        // Check if there are any errors
        if (isset($_SESSION['error'])) {
            echo 'Debug: Error - ' . $_SESSION['error'] . '<br>';
        }
        header('location: ../donkey_client.php');          
        exit();
    }    

    private function emptyName() {
        // Make sure the submitted values are not empty.
        return empty($this->naam);
    }

    private function emptyAddress() {
        // Make sure the submitted values are not empty.
        return empty($this->adres);
    }

    private function emptyEmail() {
        // Make sure the submitted values are not empty.
        return empty($this->email);
    }

    private function invalidEmail() {
        // Make sure the submitted values contain an @ character.
        return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function emptyLatLon() {
        // Make sure the submitted values are not empty.
        return empty($this->latlon);
    }
}
?>