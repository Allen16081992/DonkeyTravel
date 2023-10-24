<?php // Dhr. Allen Pieter
    include_once 'session_management.class.php';
    require_once 'database.class.php'; 

    class Herberg {
        private $naam;
        private $adres;
        private $email;
        private $tel;
        private $latlon;
        private $herbID;
        private $pdo;

        public function __construct() {
            $db = new Database();
            $this->pdo = $db->connect();
        }

        // Verify if fields were submitted empty
        public function verifyInput() {
            $this->naam = $_POST['Naam'];
            $this->adres = $_POST['Adres'];
            $this->email = $_POST['Email'];
            $this->tel = $_POST['Telefoon'];
            $this->latlon = $_POST['Latlon'];
        
            if (empty($this->naam) || empty($this->adres) || empty($this->email) || empty($this->tel) || empty($this->latlon)) {
                $_SESSION['error'] = 'Please fill in all fields.';
            } else { $this->queryLocator(); }
        }        

        protected function queryLocator() {
            //Probleem gevonden: forms MOETEN blijkbaar hidden input 'AddHerb' hebben, werkt niet voor form names of button types.
            if (isset($_POST['AddHerb'])) { 
                $this->setHerb();
            } elseif (isset($_POST['EditHerb'])) {
                $this->updateHerb();
            } elseif (isset($_POST['DeleteHerb'])) {
                $this->crusifyHerb();
            } else {
                $_SESSION['error'] = 'Geen geldige actie opgegeven. Kies Toevoegen, Bewerken, of Verwijderen.';
            }
            header("Location: ../../donkey_client.php");
            exit();
        }

        private function setHerb() { // database not populated  
            try { // Prepare and execute the SQL query
                $stmt = $this->pdo->prepare("INSERT INTO herbergen (Naam, Adres, Email, Telefoon, Coordinaten) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$this->naam, $this->adres, $this->email, $this->tel, $this->latlon]);
            } catch (PDOException $e) {
                // Handle the SQL query error, you can log it or throw a more specific exception
                die("Error executing SQL query: " . $e->getMessage());
            }
        }              
            
        private function updateHerb() {
            try { // Prepare and execute the SQL query
                $stmt = $this->pdo->prepare("UPDATE herbergen SET Naam = ?, Adres = ?, Email = ?, Telefoon = ?, Coordinaten = ? WHERE ID = ?;");
                $stmt->execute([$this->naam, $this->adres, $this->email, $this->tel, $this->latlon, $this->herbID]);
            } catch (PDOException $e) {
                // Handle the SQL query error, you can log it or throw a more specific exception
                die("Error executing SQL query: " . $e->getMessage());
            }
        }
        private function crusifyHerb() {
            try { // Prepare and execute the SQL query
                $stmt = $this->pdo->prepare("DELETE FROM herbergen WHERE ID = ?");
                $stmt->execute([$this->herbID]);
            } catch (PDOException $e) {
                // Handle the SQL query error, you can log it or throw a more specific exception
                die("Error executing SQL query: " . $e->getMessage());
            }
        }
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $naam = $_POST['Naam'];
        $adres = $_POST['Adres'];
        $email = $_POST['Email'];
        $tel = $_POST['Telefoon'];
        $latlon = $_POST['Latlon'];

        // for operations requiring the ID
        $herbID = $_POST['herb_id'];

        // Creating an object of Herberg
        $Cr60 = new Herberg();
        $Cr60->verifyInput($naam, $adres, $email, $tel, $latlon);
    }