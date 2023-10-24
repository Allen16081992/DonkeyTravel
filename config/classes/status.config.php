<?php // Dhr. Allen Pieter
    include_once 'session_management.class.php';
    require_once 'database.class.php'; 

    class Status {
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
                $code = $formData['StatusCode'];
                $status = $formData['Status'];
                
                $verw = isset($_POST['Verwijderbaar']) ? $_POST['Verwijderbaar'] : 0;
                $pin = isset($_POST['PIN']) ? $_POST['PIN'] : 0;
    
                // Verify which form was submitted
                if (isset($_POST['AddStat'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("INSERT INTO statussen (StatusCode, Status, Verwijderbaar, PIN) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$code, $status, $verw, $pin]);
                
                    // Provide message
                    $_SESSION['success'] = "Status is toegevoegd.";
                }                
                elseif (isset($_POST['EditStat'])) {
                    $statid = $formData['status_id'];

                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("UPDATE statussen SET StatusCode = ?, Status = ?, Verwijderbaar = ?, PIN = ? WHERE ID = ?;");
                    $stmt->execute([$code, $status, $verw, $pin, $statid]);

                    // Provide message
                    $_SESSION['success'] = "Status is bijgewerkt.";
                }
                elseif (isset($_POST['DeleteStat'])) {
                    $statid = $formData['status_id'];

                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("DELETE FROM statussen WHERE ID = ?");
                    $stmt->execute([$statid]);

                    // Provide message
                    $_SESSION['success'] = "Status is verwijderd.";
                }
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
            $Fields = ['StatusCode', 'Status'];
    
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
            $multiProcessor = new Status($db);
            $multiProcessor->processForm($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }