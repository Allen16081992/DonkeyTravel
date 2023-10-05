<?php
require_once 'database.class.php';

class Herberg extends Database {
    protected function setHerberg($name, $address, $email, $coordinates) {
        $stmt = $this->connect()->prepare(
            "INSERT INTO herbergen (Naam, Adres, Email, Coordinaten) VALUES (?, ?, ?, ?)"
        );

        if (!$stmt->execute([$name, $address, $email, $coordinates])) {
            // Handle errors if necessary
            die("Database request failed");
        }

        $stmt = null;
    }
    // You can add methods for update and delete operations here
}
?>