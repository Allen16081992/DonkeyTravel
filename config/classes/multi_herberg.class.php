<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// This session_start is solely for displaying error messages.
require_once 'session_management.class.php';

class Herberg extends Database {

    protected function setHerberg($naam, $adres, $email, $latlon) {
        // Create herberg info
        $stmt = $this->connect()->prepare("INSERT INTO herbergen (Naam, Adres, Email, Coordinaten) VALUES (?, ?, ?, ?);");  

        // If this fails, log the error, display it (for debugging), and redirect to homepage.
        if (!$stmt->execute(array($naam, $adres, $email, $latlon))) {
            var_dump($stmt->errorInfo());
            $stmt = null;
            $_SESSION['error'] = 'Database aanvraag gefaald.';
        }

        $stmt = null;
        $_SESSION['success'] = 'Registratie succesvol, u kunt nu inloggen.';
    }

    protected function updateHerberg($naam, $adres, $email, $latlon, $herbergID) {
        // Update herberg info
        $stmt = $this->connect()->prepare("UPDATE herbergen SET Naam = ?, Adres = ?, Email = ?, Coordinaten = ? WHERE ID = ?;");  

        // If this fails, log the error, and redirect to homepage.
        if (!$stmt->execute(array($naam, $adres, $email, $latlon, $herbergID))) {
            var_dump($stmt->errorInfo());
            $stmt = null;
            $_SESSION['error'] = 'Database aanvraag gefaald.';
        }

        $stmt = null;
        $_SESSION['success'] = 'Herberg informatie bijgewerkt.';
    }

    protected function deleteHerberg($herbergID) {
        // Delete herberg info
        $stmt = $this->connect()->prepare('DELETE FROM herbergen WHERE ID = ?');  

        // If this fails, log the error, and redirect to homepage.
        if (!$stmt->execute([$herbergID])) {
            var_dump($stmt->errorInfo());
            $stmt = null;
            $_SESSION['error'] = 'Database aanvraag gefaald.';
        }

        $stmt = null;
        $_SESSION['success'] = 'Herberg informatie verwijderd.';
    }

    protected function redirect() {
        header('location: ../donkey_client.php');
        exit();
    }
}
?>