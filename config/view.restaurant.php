<?php // Khaqan Awan
require_once 'classes/database.class.php';

class viewRestaurants {

    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    public function viewRestaurantInfo($table) {
        try {
            // Select table records
            $stmt = $this->pdo->prepare("SHOW COLUMNS FROM $table");
            $stmt->execute();
            $Rcolumns = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $stmt = $this->pdo->prepare("SELECT * FROM $table");
            $stmt->execute();
            $Rrecords = $stmt->fetchAll();

            return [
                'columns' => $Rcolumns,
                'records' => $Rrecords,
            ];
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a user-friendly message)
            die("Error: " . $e->getMessage());
        }
    }
}

// Create an object from our class
$viewR = new viewRestaurants();
$allRestaurant = $viewR->viewRestaurantInfo('restaurants');
