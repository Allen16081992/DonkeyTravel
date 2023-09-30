<?php
    require_once 'config/autoload.config.php';

    try {
        // Attempt to connect to Database class
        //$database = new Database();

        SessionManagement::setSession();
        //SessionManagement::redirectUnauthorized();
        
    } catch (InvalidArgumentException $e) {
        echo 'Error: ' . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn DonkeyTravel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <?php 
        include_once 'GUIwidgets/client_navbar.gui.php'; 
        include_once 'GUIwidgets/client_tables.gui.php';
    ?>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom script for switching tables -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="table"]').on('click', function() {
                var target = $(this).data('target');
                $('.table-container').hide();
                $(target).show();
            });
        });
    </script>
</body>
</html>