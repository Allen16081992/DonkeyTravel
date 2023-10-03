<?php // Loubna Faress
require_once 'session_management.class.php';

class Registration extends Database {
    
    // Verify if the "Klant" already exists in the database.
    protected function setKlant($name, $email, $password, $phone) {
        
        // Now generate a unique salt.
        $salt = bin2hex(random_bytes(16));

        // Add a defensive delay against bruto-force attacks, updating PASSWORD_DEFAULT.
        $seal = [ 'cost' => 12 ];

        // Let's apply some hashing and salting security.
        $HashThisNOW = password_hash($password.$salt, PASSWORD_BCRYPT, $seal);

        // Insert user into the accounts table
        $stmt = $this->connect()->prepare("INSERT INTO klanten (name, email, password, phone, salt) VALUES (?, ?, ?, ?);");  

        // If this fails, kick back to homepage.
        if(!$stmt->execute(array($name,  $email, $HashThisNOW, $phone $salt))) {
            $stmt = null;
            $_SESSION['error'] = 'Database query failed.';
            header('location: ../index.php');
            exit();
        }

        // Immediately grab the newly generated ID like thunder strike
        $stmtB = $this->connect()->prepare('SELECT ID FROM klanten WHERE name = ? AND email = ?;');
        $stmtB->execute([$name, $email]);
        $klantID = $stmtB->fetchColumn();

        if (!$klantID) {
            // Handle the case where klantID is not found
            $stmtB = null;
            $_SESSION['error'] = 'Failed to retrieve userID.';
            header('location: ../index.php');
            exit();
        }

        $stmt = null;
        $_SESSION['success'] = 'You have successfully registered.';

    }
    
    // Verify if the user already exists in the database.
    protected function verifyUser($klantID, $email) {
        $stmt = $this->connect()->prepare('SELECT klantID FROM klanten WHERE name = ? OR email = ?;');
        // If this fails, kick back to homepage.
        if(!$stmt->execute(array($klantID, $email))) {
            $stmt = null;
            $_SESSION['error'] = 'Database query failed.';
            header('location: ../index.php');
            exit();
        }
        // If we got anything back from the database, do this.
        return $stmt->rowCount() === 0;
    }
}
?>