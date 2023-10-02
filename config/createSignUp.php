<?php // Loubna Faress
// These variables are free to use by anything.
if($_SERVER["REQUEST_METHODE"] == "POST" && isset($_POST['submit'])) {
        
    // Absorb data in the first step of the registration form
    $name = $_POST['name'];
    // Absorb data in the second step
    $email = $_POST['email'];
    // Absorb data in the third step 
    $password = $_POST['password']; 
    // Absorb data in the fourth and last step
    $phone = $_POST['phone']; 

    // Initialise signup class
    require_once "idb.config.php";
    require_once "Classes/signup.class.config.php";
    require_once "Controller/signup/control.config.php";

    $registrate = new RegistrateControl($name, $email, $password, $phone);

    // Error handlers
    $registrate->signupUser();

    // Dismiss to homepage
    header('location: ../index.php');
    exit();
    
}
?>