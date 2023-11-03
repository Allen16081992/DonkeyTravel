<?php // Dhr. Allen Pieter
    require_once 'classes/database.class.php';  

    class viewOvernachting {
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
                $Ocolumns = $stmt->fetchAll(PDO::FETCH_COLUMN);

                $stmt = $this->pdo->prepare("SELECT * FROM $table");
                $stmt->execute();
                $Orecords = $stmt->fetchAll();

                return [
                    'columns' => $Ocolumns,
                    'records' => $Orecords,
                ];
            } catch (PDOException $e) {
                // Handle the exception (e.g., log the error or display a user-friendly message)
                die("Error: " . $e->getMessage());
            }
        }
    }

    // Create an object from our class
    $viewOv = new viewOvernachting();
    $allOvern = $viewOv->viewHerbergInfo('overnachtingen');