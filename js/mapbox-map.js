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

// Initialise
document.addEventListener("DOMContentLoaded", initializeMap);