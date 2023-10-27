<?php // Dhr. Allen Pieter
    include_once 'session_management.class.php'; 
    require_once 'database.class.php';

    class Pincode {
        // Properties //
        private $pdo;

        // // Methods // //
        // Connect to the Database
        public function __construct(Database $db) {
            $this->pdo = $db->connect();
        }

        public function processPIN($formData) {
            // Absorb form data
            $boekid = $formData['boek_id'];

            // Create, Delete and Read-Search
            if (isset($_POST['setPIN'])) {
                // Generate a unique 4-digit pin.
                $code = mt_rand(1000, 9999);

                // Prepare and execute SQL query
                $stmt = $this->pdo->prepare("UPDATE boekingen SET PINCode = ?, Status = 1 WHERE ID = ?;");

                // If this fails, kick back to homepage.
                if(!$stmt->execute([$code, $boekid])) {
                    // Provide message
                    $_SESSION['error'] = 'Pincode inquisitie mislukt.';
                    $stmt = null;
                } else {
                    // Provide message
                    $_SESSION['success'] = "Pincode is verstrekt.";
                }
            }
            elseif (isset($_POST['deletePIN'])) {
                // Prepare and execute SQL query
                $stmt = $this->pdo->prepare("UPDATE boekingen SET PINCode = NULL, Status = 0 WHERE ID = ?;");

                // If this fails, kick back to homepage.
                if(!$stmt->execute([$boekid])) {
                    // Provide message
                    $_SESSION['error'] = 'Pincode inquisitie mislukt.';
                    $stmt = null;
                } else {
                    // Provide message
                    $_SESSION['success'] = "Pincode is verwijderd.";
                }
            }
            elseif (isset($_POST['loginPIN'])) {
                // Absorb the submitted pincode
                $pincode = $formData['PINCode'];
                
                // Prepare and execute SQL query
                $stmt = $this->pdo->prepare('SELECT PINCode FROM boekingen WHERE PINCode = ? AND ID = ?;');

                if(!$stmt->execute([$pincode, $boekid])) {
                    // Provide message
                    $_SESSION['error'] = 'Pincode inquisitie mislukt.';
                    $stmt = null;
                } else {
                    // Provide message
                    $_SESSION['success'] = "Welkom bij de LocatieTracker.";
                    $stmt = null;

                    // Redirect to client environment
                    header("Location: ../../roadmapEVP+.php");
                    exit();
                }
            }
            
            // Redirect to client environment
            header("Location: ../../donkey_client.php");
            exit();
        }
    }

    // Create instances and call the processForm function
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $db = new Database();
            $multiProcessor = new Pincode($db);
            $multiProcessor->processPIN($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }