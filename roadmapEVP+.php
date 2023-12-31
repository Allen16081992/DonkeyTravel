<?php // Dhr. Allen Pieter
    include_once 'config/classes/session_management.class.php';
    redirectUnauthorized(); 
    require_once 'config/view.boekingen.php';
    require_once 'config/view.trackers.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donkey Travel Follow Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Mapbox -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" type="text/css" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" />
    <style>
        #map {
            height: 450px;
            width: 95%;
            margin:20px;
            border-radius: 15px;
            border-width: 5px;
            border-style: solid;
            border-color: silver;
        }
        #menu {
            background: #efefef;
            margin-top:0;
            padding: 10px;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body>
    <!-- Widgets -->
    <?php 
        include_once 'GUIwidgets/client_main_navbar.gui.php'; 
        if (isset ($allBoek)) {
            echo "
                <table class='table table-hover table-bordered table-striped'>
                    <thead class='table-success'>
                        <tr>
                            <th>Uw Tochten Overzicht</th>
                            <th><a href='donkey_client.php' class='btn btn-primary btn-sm'>PIN Uitloggen</a></th>
                        </tr>
                    </thead>
            ";
            foreach ($allBoek['records'] as $Brecord) {
                echo "
                    <tbody>
                        <td>{$Brecord['Route']}<td>
                    </tbody>
                ";
            }
            echo "</table>";
        }
        if (isset($allTrack)) {
            foreach ($allTrack['records'] as $TRrecord) {
                // Display specific columns
                echo "
                    <table class='table table-hover table-bordered table-striped'>
                        <thead class='table-success'>
                            <tr>
                                <th>Start Locatie</th>
                                <th>Eind Locatie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>{$TRrecord['StartLat']},{$TRrecord['StartLon']}</td>
                            <td>{$TRrecord['EndLat']},{$TRrecord['EndLon']}</td>
                        </tbody>
                    </table>
                ";
            }
        }
    ?>
    <!-- Table Controls -->
    <div class="container mt-5">
        <h2>FollowMe - Locatie Tracker</h2>    
    </div>

    <div class="mx-sm-4 mb-2">
        <small id="mapHelp" class="form-text text-muted">Track een huifkar met Coördinaten, Plaatsen, Straatnamen en Bedrijfslocaties door gebruik te maken van  A+B, of op de map te klikken.</small>
    </div>

    <div id='map'></div>
    <div id="menu">
        <input id="satellite-streets-v12" type="radio" name="rtoggle" value="satellite">
        <label for="satellite-streets-v12">Satellite streets</label>
        <input id="streets-v12" type="radio" name="rtoggle" value="streets" checked="checked">
        <label for="streets-v12">streets</label>
        <input id="outdoors-v12" type="radio" name="rtoggle" value="outdoors">
        <label for="outdoors-v12">outdoors</label>
    </div>

    <script>
        function initializeMap() {
            mapboxgl.accessToken = 'pk.eyJ1IjoiYWxkeW5hc3R5IiwiYSI6ImNsbXAweng4YzAxbWEydG4yeWEwdDVrbTAifQ.6aU5PgNzNYcOwTCE15KVIA';

            const map = new mapboxgl.Map({
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [4.531361, 51.94271],
                zoom: 13,
                pitch: 45,
                bearing: -8.6,
                container: 'map',
                antialias: true
            });

            const directions = new MapboxDirections({
                accessToken: mapboxgl.accessToken,
                unit: 'metric',
                profile: 'mapbox/driving-traffic',
                controls: {
                    instructions: true,
                },
                interactive: true,
            });

            map.addControl(directions, 'top-left');

            const layerList = document.getElementById('menu');
            const inputs = layerList.getElementsByTagName('input');

                for (const input of inputs) {
                    input.onclick = (layer) => {
                    const layerId = layer.target.id;
                    map.setStyle('mapbox://styles/mapbox/' + layerId);
                };
            }

            map.on('style.load', () => {
                const layers = map.getStyle().layers;
                const labelLayerId = layers.find(
                    (layer) => layer.type === 'symbol' && layer.layout['text-field']
                ).id;

                map.addLayer({
                    'id': 'add-3d-buildings',
                    'source': 'composite',
                    'source-layer': 'building',
                    'filter': ['==', 'extrude', 'true'],
                    'type': 'fill-extrusion',
                    'minzoom': 15,
                    'paint': {
                        'fill-extrusion-color': '#aaa',
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            15,
                            0,
                            15.05,
                            ['get', 'height']
                        ],
                        'fill-extrusion-base': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            15,
                            0,
                            15.05,
                            ['get', 'min_height']
                        ],
                        'fill-extrusion-opacity': 0.6
                    },
                },
                labelLayerId
                );
            });

            map.addControl(new mapboxgl.NavigationControl());
        }

        // Initialise Everything!!!
        document.addEventListener("DOMContentLoaded", initializeMap);
    </script>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>