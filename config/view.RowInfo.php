<?php // Dhr. Allen P.
    require_once 'classes/database.class.php';

    class viewRowInfo {
        private $pdo;
        
        public function __construct() {
            try {
                $database = new Database();
                $this->pdo = $database->connect();
            } catch (PDOException $e) {
                throw new Exception("Error connecting to the database." . $e->getMessage());
            }
        } 

        public function fetchInfo($rowID) {
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE ID = :rowID");
                $stmt->bindParam(':rowID', $rowID, PDO::PARAM_INT);
                $stmt->execute();
    
                // Fetch the data
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
                return $data;
            } catch (PDOException $e) {
                throw new Exception("Error fetching data from the database." . $e->getMessage());
            }
        }
    }

    // Example usage:
    $viewRowInfo = new viewRowInfo();
    $data = $viewRowInfo->fetchInfo($table, $rowID);