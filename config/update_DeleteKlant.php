<?php // Loubna Faress
    include_once 'classes/session_management.class.php';
    require_once 'classes/database.class.php'; 

    class updateKlant {
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
                $klantid = $formData['klant_id'];
                
                if (isset($_POST['Editklant'])) {
                // Prepare and execute the SQL query
                $stmt = $this->pdo->prepare("UPDATE klant SET Naam = ?, Adres = ?, Email = ?, Telefoon = ?, Coordinaten = ? WHERE ID = ?;");
                $stmt->execute([$name, $adres, $email, $tel, $coordinates, $klantid]);

                $_SESSION['success'] = "klant is bijgewerkt.";
                }
                elseif (isset($_POST['Deleteklant'])) {
                // Prepare and execute the SQL query
                $stmt = $this->pdo->prepare("DELETE FROM klanten WHERE ID = ?");
                $stmt->execute([$klantid]);

                $_SESSION['success'] = "klant verwijderd.";
                } 
                else {
                    $_SESSION['error'] = "No Read functionality.";
                }
                
                // Optionally, you can redirect to a success page or do other actions
                header("Location: ../donkey_client.php");
                exit();

            }  catch (PDOException $e) {
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
    }

    // Usage
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $db = new Database();
            $multiProcessor = new klant($db);
            $multiProcessor->processForm($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>