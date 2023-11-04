<?php include_once 'config/classes/session_management.class.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donkey Travel - Adventure Awaits</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DK Styling -->
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>

<!-- Header -->
<?php include_once 'GUIwidgets/index_navbar.gui.php'; ?>
<?php include_once 'config/server_messages.config.php'; ?>

<!-- Featured Tours Section -->
<section class="container">
    <img src="css/banner.jpg" alt="Flowers in Chania" width="540">
</section>

<!-- Banner Section -->
<section class="jumbotron text-center">
    <h1>Welcome bij Donkey Travel</h1>
    <p>Het Avontuur Wacht</p>
    <!-- Add images or other content here -->
</section>

<!-- Contact Us Section -->
<section class="container">
    <!-- Add contact information and form here -->
</section>

<!-- GUIwidgets -->
<?php 
    include_once 'GUIwidgets/login.gui.php'; 
    include_once 'GUIwidgets/signup.gui.php'; 
    include_once 'GUIwidgets/footer.gui.php';
?>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>