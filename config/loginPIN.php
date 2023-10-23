<?php // Dhr. Allen Pieter
    include_once 'session_management.class.php'; 
    require_once 'database.class.php';

    class loginPin {
        private $pdo;
        private $pincode;
    
        public function __construct(Database $db) {
            $this->pdo = $db->connect();
        }

        public function loginPINCode() {
            // Prepare and execute the SQL query
            $stmt = $this->pdo->prepare('SELECT ID, PINCode FROM trackers WHERE PINCode = ?;');
            $stmt->execute($this->pincode);

            if (!$stmt) {
                $_SESSION['error'] = "PINCode niet gevonden.";

                header("Location: ../../donkey_client.php");
            } else {
                header("Location: ../../roadmap.php");
            }
            exit();
        }
    }

    // Create instances and call the processForm function
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $db = new Database();
            $pinlog = new loginPin($db);
            $pinlog->loginPINCode($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }