<?php // Khaqan Ul Haq Awan
require_once 'classes/database.class.php';

class viewBoekingen {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    public function viewBoekingenInfo($table) {
        try {
            // Select table records
            $stmt = $this->pdo->prepare("SHOW COLUMNS FROM $table");
            $stmt->execute();
            $Bcolumns = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $stmt = $this->pdo->prepare("SELECT * FROM $table");
            $stmt->execute();
            $Brecords = $stmt->fetchAll();

            return [
                'columns' => $Bcolumns,
                'records' => $Brecords,
            ];
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a user-friendly message)
            die("Error: " . $e->getMessage());
        }
    }
}

// Create an object from our class
$viewR = new viewBoekingen();
$allBoek = $viewR->viewBoekingenInfo('boekingen');