<div class="container">
    <div class="row justify-content-center">
        <div class="mb-2">
            <button id="showMapBtn" type="button" class="btn btn-primary mx-sm-2 mb-2">Kaart</button>
        </div>
        <div class="mx-sm-4 mb-2">
            <small id="mapHelp" class="form-text text-muted">Track een huifkar met Coördinaten, Plaatsen, Straatnamen en Bedrijfslocaties door gebruik te maken van  A+B, of op de map te klikken.</small>
        </div>

        <div id='map'></div>
    </div>
    <div id="menu">
        <input id="satellite-streets-v12" type="radio" name="rtoggle" value="satellite">
        <label for="satellite-streets-v12">Satellite streets</label>
        <input id="streets-v12" type="radio" name="rtoggle" value="streets" checked="checked">
        <label for="streets-v12">streets</label>
        <input id="outdoors-v12" type="radio" name="rtoggle" value="outdoors">
        <label for="outdoors-v12">outdoors</label>
    </div>
</div>