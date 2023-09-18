<!-- Include Leaflet from CDN -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


<!DOCTYPE html>
<html>
<head>
    <title>Object Tracking</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Object Tracking</h1>

    <form id="track-form">
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" required>

        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" required>

        <input type="submit" value="Track">
    </form>

    <div id="map"></div>

    <script>
        var map = L.map('map').setView([0, 0], 14); // Initial view at (0, 0)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker;

        document.getElementById('track-form').addEventListener('submit', function (e) {
            e.preventDefault();
            var latitude = parseFloat(document.getElementById('latitude').value);
            var longitude = parseFloat(document.getElementById('longitude').value);

            if (!isNaN(latitude) && !isNaN(longitude)) {
                if (marker) {
                    marker.setLatLng([latitude, longitude]).update();
                } else {
                    marker = L.marker([latitude, longitude]).addTo(map);
                }

                map.setView([latitude, longitude], 14);
            } else {
                alert('Please enter valid coordinates.');
            }
        });
    </script>
</body>
</html>