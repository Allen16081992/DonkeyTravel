<div class="container">
    <div class="row justify-content-center">
        <div class="mb-2">
            <button id="showMapBtn" type="button" class="btn btn-primary mx-sm-2 mb-2">Kaart</button>
        </div>
        <form id="track-form" class="form-inline">
            <div class="form-group mx-sm-4 mb-2">
                <label for="latitude" class="sr-only">Latitude:</label>
                <input type="text" class="form-control" id="latitude" placeholder="Breedtegraad" required>
            </div>
            <div class="form-group mx-sm-1 mb-2">
                <label for="longitude" class="sr-only">Longitude:</label>
                <input type="text" class="form-control" id="longitude" placeholder="Lengtegraad" required>
            </div>
            <button type="submit" class="btn btn-primary mx-sm-2 mb-2">Track</button>
        </form>
        <div class="mx-sm-4 mb-2">
            <small id="mapHelp" class="form-text text-muted">Track een huifkar met coördinaten of stad, wijk, straat en zelfs bedrijfsnamen.</small>
        </div>

        <div id='map'></div>
    </div>
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
</div>