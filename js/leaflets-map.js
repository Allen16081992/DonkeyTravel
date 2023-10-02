// leaflet-map.js

function applyLeafletStyles() {
    var mapLink = document.getElementById('map-link');
    var mapScript = document.getElementById('map-script');

    // Leaflet styles and script URLs
    mapLink.href = 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css';
    mapScript.src = 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js';

    // Leaflet-related JavaScript code
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
}
