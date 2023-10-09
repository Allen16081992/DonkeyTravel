<?php // Loubna Faress
    require_once 'classes/database.class.php'; 
    class klantLogin {
        private $pdo;

        public function __construct() {
            $db = new Database();
            $this->pdo = $db->connect();
        }

        public function loginKlant() {
            try {
                $stmt = $this->pdo->prepare('SELECT ID, Naam FROM klanten WHERE Naam = ? AND Wachtwoord = ?;');
                $stmt->execute([$Naam, $Wachtwoord]);
                $klantID = $stmt->fetch(PDO::FETCH_ASSOC); 
            }   
            catch (PDOException $e) {
                die("Connectie mislukt:" . $e->getMessage());
            }

            $_SESSION['klant_id'] = $klantID['ID'];
            $_SESSION['klant_naam'] = $klantID['Naam'];

            header('location: ../donkey_client.php');

            exit();
        }
    }

   
    
    

    if(isset($_POST['submit'])) {
        $Naam = $_POST['Naam'];
        $Wachtwoord = $_POST['Wachtwoord'];

        $klant1 = new klantLogin();
        $klant1->loginKlant($Naam, $Wachtwoord); 
        echo "<pre>" . print_r($_POST, true) . "</pre>";
    } 
?>