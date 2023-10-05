<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'classes/database.class.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['adres'];
    $email = $_POST['email'];
    $coordinates = $_POST['coordinates'];

    require_once 'herberg_control.php';

    $herbergControl = new HerbergControl();
    $herbergControl->addHerberg($name, $address, $email, $coordinates);
}
?>