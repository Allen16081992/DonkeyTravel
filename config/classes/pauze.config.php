<?php // Dhr. Allen Pieter
    include_once 'session_management.class.php';
    require_once 'database.class.php'; 

    class Pauzeplaats {
        private $pdo;

        // Connect to the Database
        public function __construct(Database $db) {
            $this->pdo = $db->connect();
        }

        // Modular Create + Update + Delete Operator
        public function processForm(array $formData) {

            // Absorb form data
            $statid = $formData['stat_id'];
            $restid = $formData['rest_id'];
            $boekid = $formData['boek_id'];
            $pausid = $formData['pauze_id'];

            // Verify which form was submitted
            if (isset($_POST['AddPauze'])) {
                // Prepare and execute SQL query
                $stmt = $this->pdo->prepare("INSERT INTO pauzeplaatsen (FKboekingenID, FKrestaurantsID, FKrestaurantsID) VALUES (?, ?, ?)");
                $stmt->execute([$statid, $restid, $boekid]);

                if (!$stmt) {
                    // Provide message
                    $_SESSION['error'] = "Pauzeplaats maken mislukt.";
                } else {
                    // Provide message
                    $_SESSION['success'] = "Pauzeplaats is toegevoegd.";
                }
            }
            elseif (isset($_POST['EditPauze'])) {
                // Prepare and execute SQL query
                $stmt = $this->pdo->prepare("UPDATE pauzeplaatsen SET FKboekingenID = ?, FKrestaurantsID = ?, FKrestaurantsID = ? WHERE ID = ?;");
                $stmt->execute([$statid, $restid, $boekid, $pausid]);

                if (!$stmt) {
                    // Provide message
                    $_SESSION['error'] = "Pauzeplaats bijwerken mislukt.";
                } else {
                    // Provide message
                    $_SESSION['success'] = "Pauzeplaats is bijgewerkt.";
                }
            }
            elseif (isset($_POST['DeletePauze'])) {
                // Prepare and execute SQL query
                $stmt = $this->pdo->prepare("DELETE FROM pauzeplaatsen WHERE ID = ?");
                $stmt->execute([$pausid]);

                if (!$stmt) {
                    // Provide message
                    $_SESSION['error'] = "Pauzeplaats weghalen mislukt.";
                } else {
                    // Provide message
                    $_SESSION['success'] = "Pauzeplaats is verwijderd.";
                }
            }

            // Redirect to client environment
            header("Location: ../../donkey_client.php");
            exit();
        }
    }

    // Create instances and call the processForm function
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $db = new Database();
            $multiProcessor = new Pauzeplaats($db);
            $multiProcessor->processForm($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }