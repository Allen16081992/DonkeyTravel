<div class="container">
    <div class="row justify-content-center">
        <div class="mb-2">
            <button id="showMapBtn" type="button" class="btn btn-primary mx-sm-2 mb-2">Kaart</button>
        </div>
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