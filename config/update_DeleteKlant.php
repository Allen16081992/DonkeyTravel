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

                // Haal formuliergegevens op
                $name = $formData['Naam'];
                $adres = $formData['Adres'];
                $email = $formData['Email'];
                $tel = $formData['Telefoon'];
                $coordinates = $formData['Latlon'];
                // voor update & delete
                $klantid = $formData['klant_id'];
                
                if (isset($_POST['Editklant'])) {
                // Bereid de SQL-query voor en voer deze uit
                $stmt = $this->pdo->prepare("UPDATE klanten SET Naam = ?, Adres = ?, Email = ?, Telefoon = ?, Coordinaten = ? WHERE ID = ?;");
                $stmt->execute([$name, $adres, $email, $tel, $coordinates, $klantid]);

                // succes melding wordt weergegeven
                $_SESSION['success'] = "klant is bijgewerkt.";
                }
                elseif (isset($_POST['Deleteklant'])) {
                // Bereid de SQL-query voor en voer deze uit
                $stmt = $this->pdo->prepare("DELETE FROM klanten WHERE ID = ?");
                $stmt->execute([$klantid]);

                // werkt het? succes melding wordt weergegeven
                $_SESSION['success'] = "klant verwijderd.";
                } 

                // zo niet? wordt er een error weergegeven
                else {
                    $_SESSION['error'] = "No Read functionality.";
                }
                
                // Optioneel, je kunt doorverwijzen naar een succespagina of andere acties uitvoeren
                header("Location: ../donkey_client.php");
                exit();

            }  catch (PDOException $e) {
                // Registreer de fout
                error_log("PDO Exception: " . $e->getMessage());
                
                // Geef de gebruiker een generieke foutmelding
                $_SESSION['error'] = "Database inquisitie mislukt.";
            } catch (Exception $e) {
                // Log the error
                error_log("Exception: " . $e->getMessage());
                
                // Geef de gebruiker een generieke foutmelding
                $_SESSION['error'] = "Database inquisitie mislukt.";
            } 
        }
    }

    // Gebruik

    //  reageert op een POST-verzoek en behandelt een update van klantgegevens.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            // maakt een databaseverbinding
            $db = new Database();
            $multiProcessor = new updateKlant($db);

            // de methode "processForm" van de POST-gegevens wordt aangeroepen
            $multiProcessor->processForm($_POST);

            // fouten worden afgehandeld en als foutmelding weergegeven 
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>