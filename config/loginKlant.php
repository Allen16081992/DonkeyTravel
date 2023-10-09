<?php // Loubna Faress
    include_once 'config/classes/session_management.class.php'; 
    require_once 'classes/database.class.php';

    class klantLogin {
        private $pdo;

        public function __construct() {
            $db = new Database();
            $this->pdo = $db->connect();
        }

        public function loginKlant($Naam, $Wachtwoord) {
            try {
                $stmt = $this->pdo->prepare('SELECT ID, Naam FROM klanten WHERE Naam = ? AND Wachtwoord = ?;');
                $stmt->execute([$Naam, $Wachtwoord]);
                $klantID = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Connectie mislukt:" . $e->getMessage());
            }

            if ($klantID) {
                $_SESSION['klant_id'] = $klantID['ID'];
                $_SESSION['klant_naam'] = $klantID['Naam'];
                $_SESSION['success'] = "Login successful";

                header('location: ../donkey_client.php');
                exit();
            } else {
                echo "Login failed. Invalid credentials.";
            }
        }
    }

    if(isset($_POST['submit'])) {
        $Naam = $_POST['Naam'];
        $Wachtwoord = $_POST['Wachtwoord'];

        $klant1 = new klantLogin();
        $klant1->loginKlant($Naam, $Wachtwoord); 
    } 
?>