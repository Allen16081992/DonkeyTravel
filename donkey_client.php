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
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Mijn DonkeyTravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DK Styling -->
    <link rel="stylesheet" href="css/main.css" />
    <!-- Navigation -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
</head>
<body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <!-- Widgets -->
    <?php include_once 'GUIwidgets/client_navbar.gui.php'; ?>

    <!-- Table Controls -->
    <div class="container mt-5">
        <h2>Overzicht</h2>
        <?php 
            if (isset($_SESSION['ID']) && isset($_SESSION['admin'])) {
                include_once 'GUIwidgets/client_admin_navbar.gui.php'; 
            } else { 
                //include_once 'GUIwidgets/client_klant_navbar.gui.php'; 
                include_once 'GUIwidgets/client_admin_navbar.gui.php';
            }
        ?>        
    </div>

    <!-- GPS-Tracking -->
    <?php include_once 'GUIwidgets/client_navigate.gui.php'; ?>

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
    <script>
        document.getElementById('showMapBtn').addEventListener('click', function() {
            var map = document.getElementById('map');
            var menu = document.getElementById('menu');

            if (map.style.opacity === '0') {
                map.style.opacity = '1';
                menu.style.display = 'flex';
            } else {
                map.style.opacity = '1';
                menu.style.display = 'flex';
            }
        });
    </script>
    <script src="js/mapbox-map.js"></script>
</body>
</html>