<?php // Loubna Faress
    include_once 'classes/session_management.class.php'; 
    require_once 'classes/database.class.php';

    class klantLogin {
        private $pdo;

        // maakt database connectie
        public function __construct() {
            $db = new Database();
            $this->pdo = $db->connect();
        }

        // zoekt klant uit de database,  
        public function loginKlant($Naam, $Wachtwoord) {
            try {
                $stmt = $this->pdo->prepare('SELECT ID, Naam, role FROM klanten WHERE Naam = ? AND Wachtwoord = ?;');

                // voert het uit,
                $stmt->execute([$Naam, $Wachtwoord]);

                // haalt het op.
                $klantID = $stmt->fetch(PDO::FETCH_ASSOC);

                // geeft error als het mislukt
            } catch (PDOException $e) {
                die("Connectie mislukt:" . $e->getMessage());
            }
            
            // bestaat het? sla klantgegevens op in sessievariabelen
            if ($klantID) {
                $_SESSION['klant_id'] = $klantID['ID'];
                $_SESSION['klant_naam'] = $klantID['Naam'];
                $_SESSION['role'] = $klantID['role'];
                // succesbericht wordt weergegeven als het gelukt is
                $_SESSION['success'] = "U bent ingelogd";

                // de gebruiker wordt doorgestuurd naar 'donkey_client.php' de klant pagina
                header('location: ../donkey_client.php');
                exit();

                // bestaat het niet? wordt er een error weergegeven
            } else {
                // foutmelding bij niet gevonden.
                $_SESSION['error'] = "Deze gebruiker bestaat niet.";

                // Ga naar homepage
                header('location: ../index.php');
                exit();
            }
        }
    }

    // controleert of een HTML-formulier is verzonden.
    if(isset($_POST['submit'])) {
        // zo ja? haal de waarden van de "Naam" en "Wachtwoord" invoervelden op
        $Naam = $_POST['Naam'];
        $Wachtwoord = $_POST['Wachtwoord'];

        // maak een nieuw object aan van de klasse "klantLogin"
        $klant1 = new klantLogin();
        // de methode "loginKlant" wordt aangeroepen
        $klant1->loginKlant($Naam, $Wachtwoord); 
    } 
?>