<?php // Dhr. Allen Pieter
    require_once 'classes/database.class.php';

    class viewRowInfo {
        private $pdo;

        // Establish a PDO-connection by new Database instance, throw error if it sucks to be you
        public function __construct() {
            try {
                $database = new Database();
                $this->pdo = $database->connect();
            } catch (PDOException $e) {
                throw new Exception("Error connecting to the database." . $e->getMessage());
            }
        }

        // Try to fetch data based on the provided table and ID, throw error if life sucks
        public function fetchRowData($tableName, $rowID) {
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM $tableName WHERE ID = :rowID");

                // Associate the variable with placeholder
                $stmt->bindParam(':rowID', $rowID, PDO::PARAM_INT);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                return $row;
            } catch (PDOException $e) {
                throw new Exception("Error fetching row data." . $e->getMessage());
            }
        }
    }

    // Create an instance of this class.
    $viewRowInfo = new viewRowInfo();

    // Fetches row data based on the specified form action.
    // Determine the table and ID based on the submitted form. 
    if (isset($_POST['EditBoek']) || isset($_POST['DeleteBoek'])) {
        $rowID = $_POST['boek_id']; // You
        $tableName = 'boekingen';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    } elseif (isset($_POST['EditHerb']) || isset($_POST['DeleteHerb'])) {
        $rowID = $_POST['herb_id']; // You
        $tableName = 'herbergen';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    } elseif (isset($_POST['EditKlant']) || isset($_POST['DeleteKlant'])) {
        $rowID = $_POST['klant_id']; // You
        $tableName = 'klanten';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    } elseif (isset($_POST['EditOvern']) || isset($_POST['DeleteOvern'])) {
        $rowID = $_POST['overn_id']; // You
        $tableName = 'overnachtingen';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    } elseif (isset($_POST['EditPauze']) || isset($_POST['DeletePauze'])) {
        $rowID = $_POST['pauze_id']; // You
        $tableName = 'pauzeplaatsen';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    } elseif (isset($_POST['EditRest']) || isset($_POST['DeleteRest'])) {
        $rowID = $_POST['rest_id']; // You
        $tableName = 'restaurants';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    } elseif (isset($_POST['EditStat']) || isset($_POST['DeleteStat'])) {
        $rowID = $_POST['status_id']; // You
        $tableName = 'statussen';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    } elseif (isset($_POST['EditTocht']) || isset($_POST['DeleteTocht'])) {
        $rowID = $_POST['tocht_id']; // You
        $tableName = 'tochten';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    } elseif (isset($_POST['EditTrack']) || isset($_POST['DeleteTrack'])) {
        $rowID = $_POST['track_id']; // You
        $tableName = 'trackers';
        $data = $viewRowInfo->fetchRowData($tableName, $rowID);
    }