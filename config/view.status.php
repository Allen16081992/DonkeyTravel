<?php // Loubna Faress
    require_once 'classes/database.class.php';  

    class viewStatus{
        private $pdo;
        
        public function __construct() {
            $database = new Database();
            $this->pdo = $database->connect();
        } 

        public function viewStatusInfo($table) {
            try {
                // Select table records
                $stmt = $this->pdo->prepare("SHOW COLUMNS FROM $table");
                $stmt->execute();
                $Scolumns = $stmt->fetchAll(PDO::FETCH_COLUMN);

                $stmt = $this->pdo->prepare("SELECT * FROM $table");
                $stmt->execute();
                $Srecords = $stmt->fetchAll();

                return [
                    'columns' => $Scolumns,
                    'records' => $Srecords,
                ];
            } catch (PDOException $e) {
                // Handle the exception (e.g., log the error or display a user-friendly message)
                die("Error: " . $e->getMessage());
            }
        }
    }

    // Create an object from our class
    $viewSt = new viewStatus();
    $allStat = $viewSt->viewStatusInfo('statussen');