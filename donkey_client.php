<?php 
    include_once 'config/classes/session_management.class.php'; 
    redirectUnauthorized();
    require_once 'config/view.boekingen.php';
    require_once 'config/view.herberg.php';
    require_once 'config/view.tochten.php';
    require_once 'config/view.trackers.php';
    require_once 'config/view.status.php';
    require_once 'config/view.klanten.php';
    require_once 'config/view.restaurant.php';
    require_once 'config/view.overnachtingen.php';
    require_once 'config/view.pauzeplaatsen.php';
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
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" type="text/css" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" />
    <!--<link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>-->
</head>
<body>
    <!-- Widgets -->
    <?php include_once 'GUIwidgets/client_main_navbar.gui.php'; ?>
    <?php include_once 'config/server_messages.config.php'; ?>

    <!-- Table Controls -->
    <div class="container mt-5">
        <h2>Overzicht</h2>
        <?php 
            if (isset($_SESSION['klant_id']) && $_SESSION['role'] == 1) {
                include_once 'GUIwidgets/client_admin_navbar.gui.php'; 
                echo '
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="mb-2">
                                <button id="showFindBtn" type="button" class="btn btn-primary mx-sm-2 mb-2" onclick="redirectToRoadmap()">Vind een locatie</button>
                                <button id="showMapBtn" type="button" class="btn btn-primary mx-sm-2 mb-2">Vind een Route</button>
                            </div>
                            <div class="mx-sm-4 mb-2">
                                <small id="mapHelp" class="form-text text-muted">Track een huifkar met Coördinaten, Plaatsen, Straatnamen en Bedrijfslocaties door gebruik te maken van  A+B, of ergens op de map te klikken.</small>
                            </div>
                            <div id="map"></div>
                        </div>
                    </div>
                ';
            } else {
                include_once 'GUIwidgets/client_klant_navbar.gui.php'; 
                echo '
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="mb-2">
                                <button id="showFindBtn" type="button" class="btn btn-primary mx-sm-2 mb-2" onclick="redirectToRoadmap()">Vind een locatie</button>
                            </div>
                            <div class="mx-sm-4 mb-2">
                                <small id="mapHelp" class="form-text text-muted">Track een huifkar met Coördinaten, Plaatsen, Straatnamen en Bedrijfslocaties door gebruik te maken van  A+B, of ergens op de map te klikken.</small>
                            </div>
                            <div id="map"></div>
                        </div>
                    </div>
                ';
            }
        ?>        
    </div>

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
        function redirectToRoadmap() {
            window.location.href = 'roadmapEVP.php';
        };
        document.getElementById('showMapBtn').addEventListener('click', function() {
            var map = document.getElementById('map');
            //var menu = document.getElementById('menu');

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