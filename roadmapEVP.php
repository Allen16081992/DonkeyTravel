<?php 
    include_once 'config/classes/session_management.class.php'; 
    redirectUnauthorized();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Object Tracking with Mapbox</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <style>
        #map {
            height: 500px;
            width: 60%;
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
    <?php include_once 'GUIwidgets/client_main_navbar.gui.php'; ?>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <h1>Locatie Zoekfunctie</h1>
    <a href='donkey_client.php' class='btn btn-primary'>Terug</a>
    <div class="mx-sm-4 mb-2">
        <small id="mapHelp" class="form-text text-muted">Vindt een Stad of straat in het zoekveld.</small>
    </div>

    <div id='map'></div>
    <div id="menu">
        <input id="satellite-streets-v12" type="radio" name="rtoggle" value="satellite">
        <!-- See a list of Mapbox-hosted public styles at -->
        <!-- https://docs.mapbox.com/api/maps/styles/#mapbox-styles -->
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
                // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [4.531361, 51.94271], 
                zoom: 13,
                pitch: 45,
                bearing: -8.6,
                container: 'map',
                antialias: true
            });

            /* Given a query in the form "lng, lat" or "lat, lng"
            * returns the matching geographic coordinate(s)
            * as search results in carmen geojson format,
            * https://github.com/mapbox/carmen/blob/master/carmen-geojson.md */
            const coordinatesGeocoder = function (query) {
            // Match anything which looks like
            // decimal degrees coordinate pair.
            const matches = query.match(
            /^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i);
            if (!matches) {
                return null;
            }

            function coordinateFeature(lng, lat) {
                return {
                    center: [lng, lat],
                    geometry: {
                    type: 'Point',
                    coordinates: [lng, lat]
                    },
                    place_name: 'Lat: ' + lat + ' Lng: ' + lng,
                    place_type: ['coordinate'],
                    properties: {},
                    type: 'Feature'
                };
            }

            const coord1 = Number(matches[1]);
            const coord2 = Number(matches[2]);
            const geocodes = [];

            if (coord1 < -90 || coord1 > 90) {
                    // must be lng, lat
                    geocodes.push(coordinateFeature(coord1, coord2));
                }
                
                if (coord2 < -90 || coord2 > 90) {
                    // must be lat, lng
                    geocodes.push(coordinateFeature(coord2, coord1));
                }
                
                if (geocodes.length === 0) {
                    // else could be either lng, lat or lat, lng
                    geocodes.push(coordinateFeature(coord1, coord2));
                    geocodes.push(coordinateFeature(coord2, coord1));
                }
                
                return geocodes;
            };

            // Add the control to the map.
            map.addControl(
                new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                localGeocoder: coordinatesGeocoder,
                zoom: 4,
                placeholder: 'Try: Delfshaven',
                mapboxgl: mapboxgl,
                reverseGeocode: true
                })
            );

            const layerList = document.getElementById('menu');
            const inputs = layerList.getElementsByTagName('input');

                for (const input of inputs) {
                    input.onclick = (layer) => {
                    const layerId = layer.target.id;
                    map.setStyle('mapbox://styles/mapbox/' + layerId);
                };
            }

            map.on('style.load', () => {
                // Insert the layer beneath any symbol layer.
                const layers = map.getStyle().layers;
                const labelLayerId = layers.find(
                (layer) => layer.type === 'symbol' && layer.layout['text-field']
                ).id;
                
                // The 'building' layer in the Mapbox Streets
                // vector tileset contains building height data
                // from OpenStreetMap.
                map.addLayer({
                    'id': 'add-3d-buildings',
                    'source': 'composite',
                    'source-layer': 'building',
                    'filter': ['==', 'extrude', 'true'],
                    'type': 'fill-extrusion',
                    'minzoom': 15,
                    'paint': {
                        'fill-extrusion-color': '#aaa',
                        
                        // Use an 'interpolate' expression to
                        // add a smooth transition effect to
                        // the buildings as the user zooms in.
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
                        }
                    },
                labelLayerId
                );
            });

            // Add zoom and rotation controls to the map.
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