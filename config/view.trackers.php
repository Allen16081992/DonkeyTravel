<?php // Dhr. Allen Pieter
    require_once 'classes/database.class.php';  

    class viewTracker {
        private $pdo;
        
        public function __construct() {
            $database = new Database();
            $this->pdo = $database->connect();
        } 

        public function viewTrackerInfo($table) {
            try {
                // Select table records
                $stmt = $this->pdo->prepare("SHOW COLUMNS FROM $table");
                $stmt->execute();
                $TRcolumns = $stmt->fetchAll(PDO::FETCH_COLUMN);

                $stmt = $this->pdo->prepare("SELECT * FROM $table");
                $stmt->execute();
                $TRrecords = $stmt->fetchAll();

                // Dhr. Allen Pieter, needed for customers, display route coordinates.
                // Fetch 'Route' data from 'tracker' based on corresponding pincode.
                foreach ($TRrecords as &$record) {
                    $trackingcode = $record['PINCode'];
                    //$trackerID = $record['id'];
    
                    $stmt = $this->pdo->prepare("SELECT * FROM trackers WHERE PINCode = :PIN");
                    $stmt->bindParam(':PIN', $trackingcode, PDO::PARAM_INT);
                    //$stmt->bindParam(':id', $trackerID, PDO::PARAM_INT);
                    $stmt->execute();
                    $data = $stmt->fetchColumn();
    
                    // Add 'Route' data to the record
                    $record1['StartLat'] = $data;
                    $record2['StartLon'] = $data;
                    $record3['EndLat'] = $data;
                    $record4['EndLon'] = $data;
                }
                // // // // // // // // // // // //

                return [
                    'columns' => $TRcolumns,
                    'records' => $TRrecords,
                ];
            } catch (PDOException $e) {
                // Handle the exception (e.g., log the error or display a user-friendly message)
                die("Error: " . $e->getMessage());
            }
        }
    }

    // Create an object from our class
    $viewTr = new viewTracker();
    $allTrack = $viewTr->viewTrackerInfo('trackers');