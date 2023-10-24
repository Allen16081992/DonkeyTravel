<?php // Dhr. Allen Pieter
    include_once 'session_management.class.php';
    require_once 'database.class.php'; 

    class Tochten {
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
                // Check if empty fields were submitted
                $this->validateFormData($formData);

                // Absorb form data
                $desc = $formData['Omschrijving'];
                $route = $formData['Route'];
                $dagen = $formData['AantalDagen'];
                $tochtid = $formData['tocht_id'];
    
                // Verify which form was submitted
                if (isset($_POST['AddTocht'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("INSERT INTO tochten (Omschrijving, Route, AantalDagen) VALUES (?, ?, ?)");
                    $stmt->execute([$desc, $route, $dagen]);

                    // Provide message
                    $_SESSION['success'] = "Tocht is toegevoegd.";
                }
                elseif (isset($_POST['EditTocht'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("UPDATE tochten SET Omschrijving = ?, Route = ?, AantalDagen = ? WHERE ID = ?;");
                    $stmt->execute([$desc, $route, $dagen, $tochtid]);

                    // Provide message
                    $_SESSION['success'] = "Tocht is bijgewerkt.";
                }
                elseif (isset($_POST['DeleteTocht'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("DELETE FROM tochten WHERE ID = ?");
                    $stmt->execute([$tochtid]);

                    // Provide message
                    $_SESSION['success'] = "Tocht is verwijderd.";
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

        // Empty Fields Check
        private function validateFormData(array $formData) {
            $Fields = ['Omschrijving', 'Route', 'AantalDagen'];
    
            foreach ($Fields as $field) {
                if (empty($formData[$field])) {
                    $_SESSION['error'] = 'Vul de nodige velden in.';

                    // Redirect to client environment
                    header("Location: ../../donkey_client.php");
                    exit();
                }
            }
        }
    }
    
    // Create instances and call the processForm function
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $db = new Database();
            $multiProcessor = new Tochten($db);
            $multiProcessor->processForm($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }