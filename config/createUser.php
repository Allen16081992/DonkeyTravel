<?php // Loubna Faress
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        require_once "classes/database.class.php";
        require_once "classes/createUser.class.php"; // Assuming the class is named SignUpClass
        require_once "controller/createUser.control.php";

        $registrate = new SignUpControl($name, $email, $password, $phone);

        $registrate->signupUser();
    }