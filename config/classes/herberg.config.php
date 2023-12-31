<?php // Dhr. Allen Pieter
    include_once 'session_management.class.php';
    require_once 'database.class.php'; 

    class Herberg {
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
                $name = $formData['Naam'];
                $adres = $formData['Adres'];
                $email = $formData['Email'];
                $tel = $formData['Telefoon'];
                $coordinates = $formData['Latlon'];
                $herbid = $formData['herb_id'];
    
                // Verify which form was submitted
                if (isset($_POST['AddHerb'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("INSERT INTO herbergen (Naam, Adres, Email, Telefoon, Coordinaten) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$name, $adres, $email, $tel, $coordinates]);

                    // Provide message
                    $_SESSION['success'] = "Herberg is toegevoegd.";
                }
                elseif (isset($_POST['EditHerb'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("UPDATE herbergen SET Naam = ?, Adres = ?, Email = ?, Telefoon = ?, Coordinaten = ? WHERE ID = ?;");
                    $stmt->execute([$name, $adres, $email, $tel, $coordinates, $herbid]);

                    // Provide message
                    $_SESSION['success'] = "Herberg is bijgewerkt.";
                }
                elseif (isset($_POST['DeleteHerb'])) {
                    // Prepare and execute SQL query
                    $stmt = $this->pdo->prepare("DELETE FROM herbergen WHERE ID = ?");
                    $stmt->execute([$herbid]);

                    // Provide message
                    $_SESSION['success'] = "Herberg is verwijderd.";
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
            $Fields = ['Naam', 'Adres', 'Email', 'Telefoon', 'Latlon'];
    
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
            $multiProcessor = new Herberg($db);
            $multiProcessor->processForm($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }