<?php // Dhr. Allen Pieter
    include_once 'classes/session_management.class.php';
    require_once 'classes/database.class.php'; 

    class Herberg {
        private $pdo;
    
        public function __construct(Database $db) {
            $this->pdo = $db->connect();
        }
        
        public function processForm(array $formData) {
            try {
                $this->validateFormData($formData);

                // Retrieve form data
                $name = $formData['Naam'];
                $adres = $formData['Adres'];
                $email = $formData['Email'];
                $tel = $formData['Telefoon'];
                $coordinates = $formData['Latlon'];
                // for update & delete
                $herbid = $formData['herb_id'];
    
                if (isset($_POST['AddHerb'])) {
                    // Prepare and execute the SQL query
                    $stmt = $this->pdo->prepare("INSERT INTO herbergen (Naam, Adres, Email, Telefoon, Coordinaten) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$name, $adres, $email, $tel, $coordinates]);

                    $_SESSION['success'] = "Herberg toegevoegd.";
                }
                elseif (isset($_POST['EditHerb'])) {
                    // Prepare and execute the SQL query
                    $stmt = $this->pdo->prepare("UPDATE herbergen SET Naam = ?, Adres = ?, Email = ?, Telefoon = ?, Coordinaten = ? WHERE ID = ?;");
                    $stmt->execute([$name, $adres, $email, $tel, $coordinates, $herbid]);

                    $_SESSION['success'] = "Herberg is bijgewerkt.";
                }
                elseif (isset($_POST['DeleteHerb'])) {
                    // Prepare and execute the SQL query
                    $stmt = $this->pdo->prepare("DELETE FROM herbergen WHERE ID = ?");
                    $stmt->execute([$herbid]);

                    $_SESSION['success'] = "Herberg verwijderd.";
                } 
                else {
                    $_SESSION['error'] = "No Read functionality.";
                }
    
                // Optionally, you can redirect to a success page or do other actions
                header("Location: ../donkey_client.php");
                exit();
            } catch (PDOException $e) {
                // Log the error
                error_log("PDO Exception: " . $e->getMessage());
                
                // Provide a generic error message to the user
                $_SESSION['error'] = "Database inquisitie mislukt.";
            } catch (Exception $e) {
                // Log the error
                error_log("Exception: " . $e->getMessage());
                
                // Provide a generic error message to the user
                $_SESSION['error'] = "Database inquisitie mislukt.";
            }
        }

        private function validateFormData(array $formData) {
            $Fields = ['Naam', 'Adres', 'Email', 'Telefoon', 'Latlon'];
    
            foreach ($Fields as $field) {
                if (empty($formData[$field])) {
                    $_SESSION['error'] = 'Please fill in all fields.';
                }
            }
        }
    }
    
    // Usage
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $db = new Database();
            $multiProcessor = new Herberg($db);
            $multiProcessor->processForm($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }