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

            // Dhr. Allen Pieter, needed for customers, display the route instead of ID.
            // Fetch 'Route' data from 'tochten' based on 'Tochten' ID
            foreach ($Brecords as &$record) {
                $tochtenID = $record['FKtochtenID'];

                $stmt = $this->pdo->prepare("SELECT Route FROM tochten WHERE ID = :id");
                $stmt->bindParam(':id', $tochtenID, PDO::PARAM_INT);
                $stmt->execute();
                $route = $stmt->fetchColumn();

                // Add 'Route' data to the record
                $record['Route'] = $route;
            }
            // // // // // // // // // // // //

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