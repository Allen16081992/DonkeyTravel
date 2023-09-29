<!DOCTYPE html>
<html>
<head>
    <title>Klanten Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
// Include the database configuration file (database.config.php)
require_once("config/database.config.php");

// Create an instance of the Database class
$db = new Database();

try {
    // Establish a database connection
    $pdo = $db->connect(); // Call the connect() method and store the PDO instance

    // Query to select all data from the 'klanten' table
    $sql = "SELECT * FROM klanten";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);

    if ($stmt === false) {
        throw new Exception("Failed to prepare the SQL statement.");
    }

    $stmt->execute();

    // Fetch the results and display them in a table
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Naam</th><th>Email</th><th>Telefoon</th><th>Wachtwoord</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td>" . $row["Naam"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Telefoon"] . "</td>";
            echo "<td>" . $row["Wachtwoord"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

</body>
</html>