<?php // Dhr. Allen Pieter
    require_once 'classes/database.class.php';  

    class viewTochten {
        private $pdo;
        
        public function __construct() {
            $database = new Database();
            $this->pdo = $database->connect();
        } 

        public function viewTochtenInfo($table) {
            try {
                // Select table records
                $stmt = $this->pdo->prepare("SHOW COLUMNS FROM $table");
                $stmt->execute();
                $TOcolumns = $stmt->fetchAll(PDO::FETCH_COLUMN);

                $stmt = $this->pdo->prepare("SELECT * FROM $table");
                $stmt->execute();
                $TOrecords = $stmt->fetchAll();

                return [
                    'columns' => $TOcolumns,
                    'records' => $TOrecords,
                ];
            } catch (PDOException $e) {
                // Handle the exception (e.g., log the error or display a user-friendly message)
                die("Error: " . $e->getMessage());
            }
        }
    }

    // Create an object from our class
    $viewTo = new viewTochten();

    if (!isset($_POST['CreateBoek'])) {
        $allTocht = $viewTo->viewTochtenInfo('tochten');
    } else {
        
    }