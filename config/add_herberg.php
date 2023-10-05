<?php // Dhr. Allen Pieter
    // Include your Database class or connection logic here
    include_once 'classes/database.class.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            // Assuming you have a Database object or connection logic
            $db = new Database();
            $pdo = $db->connect();

            // Retrieve form data
            $name = $_POST['name'];
            $adres = $_POST['adres'];
            $email = $_POST['email'];
            $coordinates = $_POST['coordinates'];

            // Prepare and execute the SQL query
            $stmt = $pdo->prepare("INSERT INTO herbergen (Naam, Adres, Email, Coordinaten) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $adres, $email, $coordinates]);

            // Optionally, you can redirect to a success page or do other actions
            $_SESSION['error'] = 'Database inquisitie gelukt.';
            header("Location: ../donkey_client.php");
            exit();
        } catch (PDOException $e) {
            // Handle database connection or query errors
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Error: " . $e->getMessage();
        }
    }