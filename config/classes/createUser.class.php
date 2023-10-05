<?php // Loubna Faress
    require_once 'session_management.class.php';

    class SignUp extends Database {
        
        protected function setUser($name, $email, $password, $phone) {
            // Generate a unique salt.
            $salt = bin2hex(random_bytes(16));

            // Hash the password with salt using bcrypt.
            $hashedPassword = password_hash($password . $salt, PASSWORD_BCRYPT, ['cost' => 12]);

            // Insert user into the klanten table.
            $query = "INSERT INTO klanten (Naam, Email, Wachtwoord, Telefoon, salt) VALUES (?, ?, ?, ?, ?);";
            $stmt = $this->connect()->prepare($query);

            // If the query fails, display an error and redirect to the homepage.
            if(!$stmt->execute([$name, $email, $hashedPassword, $phone, $salt])) {
                $_SESSION['error'] = 'Database query failed.';
                header('location: ../index.php');
                exit();
            }

            // Registration successful.
            $_SESSION['success'] = 'You have successfully registered.';
        }
    }