<!-- Buttons for switching tables -->
<div class="btn-group mb-3" role="group" aria-label="Table Selection">
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#boekingTable">Boekingen</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#herbergTable">Herbergen</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#klantTable">Klanten</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#overnachtTable">Overnachting</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#pauzeTable">Pauzeplaats</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#restaurantsTable">Restaurants</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#statusTable">Statussen</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#tochtTable">Tochten</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#trackersTable">Trackers</button>
</div>

<!-- Boekingen -->
<div id="boekingTable" class="table-container">
    <h3>Boekingen</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>StartDatum</th>
                <th>PINCode</th>
                <th>Tochten ID</th>
                <th>Klanten ID</th>
                <th>Statussen ID</th>
                <th>
                    <form id="AddBoek" action="main_forms.php" method="post">
                        <button type="submit" name="CreateBoek" value="CreateBoek" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Buttons -->
                    <form id="Boekingen" action="main_forms.php" method="post">
                        <button type="submit" name="EditBoek" value="EditBoek" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="submit" name="DeleteBoek" value="DeleteBoek" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Herbergen -->
<div id="herbergTable" class="table-container" style="display: none;">
    <h3>Herbergen</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>Email</th>
                <th>Coordinaten</th>
                <th>
                    <form id="AddHerb" action="main_forms.php" method="post">
                        <button type="submit" name="CreateHerb" value="CreateHerb" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Buttons -->
                    <form id="Herbergen" action="main_forms.php" method="post">
                        <button type="submit" name="EditHerb" value="EditHerb" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="submit" name="DeleteHerb" value="DeleteHerb" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Klanten -->
<div id="klantTable" class="table-container" style="display: none;">
    <h3>Klanten</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Telefoon</th>
                <th>Wachtwoord</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John Wick</td>
                <td>johhny_english@yahoo.com</td>
                <td>123-456-7890</td>
                <td>********</td>
                <td>
                    <!-- Buttons -->
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Overnachting -->
<div id="overnachtTable" class="table-container" style="display: none;">
    <h3>Overnachting</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>FKboekingenID</th>
                <th>FKherbergenID</th>
                <th>FKstatussenID</th>
                <th></th>
                <th></th>
                <th>
                    <form id="AddOvernacht" action="main_forms.php" method="post">
                        <button type="submit" name="CreateOvern" value="CreateOvern" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Buttons -->
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Pauzeplaats -->
<div id="pauzeTable" class="table-container" style="display: none;">
    <h3>Overnachting</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>FKboekingenID</th>
                <th>FKrestaurantsID</th>
                <th>FKstatussenID</th>
                <th></th>
                <th></th>
                <th>
                    <form id="AddPauze" action="main_forms.php" method="post">
                        <button type="submit" name="CreatePauze" value="CreatePauze" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Buttons -->
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Restaurants -->
<div id="restaurantsTable" class="table-container" style="display: none;">
    <h3>Restaurants</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>Email</th>
                <th>Telefoon</th>
                <th>Coordinaten</th>
                <th>
                    <form id="AddRest" action="main_forms.php" method="post">
                        <button type="submit" name="CreateRest" value="CreateRest" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Buttons -->
                    <form id="Restaurant" action="main_forms.php" method="post">
                        <button type="submit" name="EditRest" value="EditRest" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="submit" name="DeleteRest" value="DeleteRest" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Statussen -->
<div id="statusTable" class="table-container" style="display: none;">
    <h3>Statussen</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>StatusCode</th>
                <th>Status</th>
                <th>Verwijderbaar</th>
                <th>PINtoekennen</th>
                <th></th>
                <th>
                    <form id="AddStatus" action="main_forms.php" method="post">
                        <button type="submit" name="CreateStatus" value="CreateStatus" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Buttons -->
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Tochten -->
<div id="tochtTable" class="table-container" style="display: none;">
    <h3>Tochten</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Omschrijving</th>
                <th>Route</th>
                <th>AantalDagen</th>
                <th></th>
                <th></th>
                <th>
                    <form id="AddTocht" action="main_forms.php" method="post">
                        <button type="submit" name="CreateTocht" value="CreateTocht" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Buttons -->
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Trackers -->
<div id="trackersTable" class="table-container" style="display: none;">
    <h3>Tracker</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>PINCode</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Time</th>
                <th>
                    <form id="AddTrack" action="main_forms.php" method="post">
                        <button type="submit" name="CreateTrackr" value="CreateTrackr" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Buttons -->
                    <form id="Trackers" action="main_forms.php" method="post">
                        <button type="submit" name="EditTrack" value="EditTrack" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="submit" name="DeleteTrack" value="DeleteTrack" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>