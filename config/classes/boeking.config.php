<?php // Dhr. Allen Pieter
    include_once 'session_management.class.php';
    require_once 'database.class.php'; 

    class Boeking {
        // Properties //
        private $pdo;
    
        // // Methods // //
        // Connect to the Database
        public function __construct(Database $db) {
            $this->pdo = $db->connect();
        }
        
        // Modular Create + Update + Delete Operator
        public function processForm(array $formData) {
            try { 
                // Absorb form data
                $start = $formData['StartDatum'];
                $tocht = $formData['Tocht'];
                $boekid = $formData['boek_id'];
    
                // Verify which form was submitted
                if (isset($_POST['AddBoek'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("INSERT INTO boekingen (StartDatum, FKtochtenID) VALUES (?, ?)");
                    $stmt->execute([$start, $tocht]);

                    // Provide message
                    $_SESSION['success'] = "Boeking is Aangevraagd.";
                }
                elseif (isset($_POST['EditBoek'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("UPDATE boekingen SET StartDatum = ?, FKtochtenID = ? WHERE ID = ?;");
                    $stmt->execute([$start, $tocht, $boekid]);

                    // Provide message
                    $_SESSION['success'] = "Boeking is bijgewerkt.";
                }
                elseif (isset($_POST['DeleteBoek'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("DELETE FROM boekingen WHERE ID = ?");
                    $stmt->execute([$boekid]);

                    // Provide message
                    $_SESSION['success'] = "Boeking is verwijderd.";
                }
    
                // Redirect to client environment
                header("Location: ../../donkey_client.php");
                exit();
            } catch (PDOException $e) {
                // Log the error
                error_log("PDO Exception: " . $e->getMessage());
                
                // Provide message
                $_SESSION['error'] = "Database inquisitie mislukt.";
            } catch (Exception $e) {
                // Log the error
                error_log("Exception: " . $e->getMessage());
                
                // Provide message
                $_SESSION['error'] = "Database inquisitie mislukt.";
            }
        }
    }
    
    // Create instances and call the processForm function
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $db = new Database();
            $multiProcessor = new Boeking($db);
            $multiProcessor->processForm($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }