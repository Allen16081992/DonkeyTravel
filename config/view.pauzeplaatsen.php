<?php // Dhr. Allen Pieter
    require_once 'classes/database.class.php';  

    class viewPauzeplaatsen {
        private $pdo;
        
        public function __construct() {
            $database = new Database();
            $this->pdo = $database->connect();
        } 

        public function viewPauzeInfo($table) {
            try {
                // Select table records
                $stmt = $this->pdo->prepare("SHOW COLUMNS FROM $table");
                $stmt->execute();
                $Pcolumns = $stmt->fetchAll(PDO::FETCH_COLUMN);

                $stmt = $this->pdo->prepare("SELECT * FROM $table");
                $stmt->execute();
                $Precords = $stmt->fetchAll();

                return [
                    'columns' => $Pcolumns,
                    'records' => $Precords,
                ];
            } catch (PDOException $e) {
                // Handle the exception (e.g., log the error or display a user-friendly message)
                die("Error: " . $e->getMessage());
            }
        }
    }

    // Create an object from our class
    $viewPa = new viewPauzeplaatsen();
    $allPauze = $viewPa->viewPauzeInfo('pauzeplaatsen');