<?php // Dhr. Allen Pieter
    require_once 'classes/database.class.php';  

    class viewHerbergen {
        private $pdo;
        
        public function __construct() {
            $database = new Database();
            $this->pdo = $database->connect();
        } 

        public function viewHerbergInfo($table) {
            try {
                // Select table records
                $stmt = $this->pdo->prepare("SHOW COLUMNS FROM $table");
                $stmt->execute();
                $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);

                $stmt = $this->pdo->prepare("SELECT * FROM $table");
                $stmt->execute();
                $records = $stmt->fetchAll();

                return [
                    'columns' => $columns,
                    'records' => $records,
                ];
            } catch (PDOException $e) {
                // Handle the exception (e.g., log the error or display a user-friendly message)
                die("Error: " . $e->getMessage());
            }
        }
    }

    // Create an object from our class
    $viewHb = new viewHerbergen();
    $allInfo = $viewHb->viewHerbergInfo('herbergen');