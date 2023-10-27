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

            if (isset($_POST['EditKlant'])) {
                // Get form data
                $klantid = $formData['klant_id'];
                $name = $formData['Naam'];
                $email = $formData['Email'];
                $tel = $formData['Telefoon'];
                $wachtwoord = $formData['Wachtwoord'];

                // Prepare and execute the SQL query to update customer data
                $stmt = $this->pdo->prepare("UPDATE klanten SET Naam = ?, Email = ?, Telefoon = ?, Wachtwoord = ? WHERE ID = ?");
                $stmt->execute([$name, $email, $tel, $wachtwoord, $klantid]);

                // Success message
                $_SESSION['success'] = "Klant is bijgewerkt.";
            } elseif (isset($_POST['DeleteKlant'])) {
                // Get form data
                $klantid = $formData['klant_id'];

                // Prepare and execute the SQL query to update customer data
                $stmt = $this->pdo->prepare("DELETE FROM klanten WHERE ID = ?");
                $stmt->execute([$klantid]);

                // Success message
                $_SESSION['success'] = "Account is verwijderd.";
            } else {
                $_SESSION['error'] = "No valid action selected.";
            }

            // Redirect to a success page or perform other actions
            header("Location: ../donkey_client.php");
            exit();
        } catch (PDOException $e) {
            // Log and display a database error
            $_SESSION['error'] = "Database query failed: " . $e->getMessage();
            header("Location: ../donkey_client.php");
            exit();
        }
    }

    private function validateFormData(array $formData) {
        // You can add validation logic here as needed
        if (empty($formData['Naam'])) {
            $_SESSION['error'] = "Vul een naam in!";
            header("Location: ../donkey_client.php");
            exit();
        }
        if (empty($formData['Email'])) {
            $_SESSION['error'] = "Vul een email in!";
            header("Location: ../donkey_client.php");
            exit();
        }
        if (empty($formData['Telefoon'])) {
            $_SESSION['error'] = "Vul een telefoon in!";
            header("Location: ../donkey_client.php");
            exit();
        }
        if (empty($formData['Wachtwoord'])) {
            $_SESSION['error'] = "Vul een wachtwoord in!";
            header("Location: ../donkey_client.php");
            exit();
        }
    }

    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $db = new Database();
        $multiProcessor = new updateKlant($db);
        $multiProcessor->processForm($_POST);
    } catch (Exception $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: ../donkey_client.php");
        exit();
    }
}
?>
