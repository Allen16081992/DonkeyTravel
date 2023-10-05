<?php // Dhr. Allen Pieter
    // This session_start is solely for displaying error messages.
    require_once 'session_management.config.php';
    
    class Herberg extends Database {

        // Verify if the data already exists in the database.
        protected function setHerberg($name, $adres, $email, $phone, $latlon) {

            // Insert user into the accounts table
            $stmt = $this->connect()->prepare("INSERT INTO herbergen (Naam, Adres, Email, Telefoon, Coordinaten) VALUES (?, ?, ?, ?, ?)");  

            // If this fails, kick back to homepage.
            if(!$stmt->execute([$name, $adres, $email, $phone, $latlon])) {
                $stmt = null;
                $_SESSION['error'] = 'Database inquisitie gefaald.';
                header('location: ../donkey_client.php');
                exit();
            }

            $stmt = null;
            $_SESSION['success'] = 'You have successfully registered.';
        }
    }