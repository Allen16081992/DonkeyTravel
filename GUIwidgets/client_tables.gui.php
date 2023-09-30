<div class="container mt-5">
    <h2>Overzicht</h2>

    <!-- Buttons for switching tables -->
    <div class="btn-group mb-3" role="group" aria-label="Table Selection">
        <button type="button" class="btn btn-primary" data-toggle="table" data-target="#boekingenTable">Boekingen</button>
        <button type="button" class="btn btn-primary" data-toggle="table" data-target="#herbergenTable">Herbergen</button>
        <button type="button" class="btn btn-primary" data-toggle="table" data-target="#klantenTable">Klanten</button>
        <button type="button" class="btn btn-primary" data-toggle="table" data-target="#restaurantsTable">Restaurants</button>
        <button type="button" class="btn btn-primary" data-toggle="table" data-target="#trackersTable">Trackers</button>
    </div>

    <!-- Boekingen Table -->
    <div id="boekingenTable" class="table-container">
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
                    <th></th>
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
                        <button type="button" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Herbergen Table -->
    <div id="herbergenTable" class="table-container" style="display: none;">
        <h3>Herbergen</h3>
        <table class="table table-hover table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Adres</th>
                    <th>Email</th>
                    <th>Coordinaten</th>
                    <th></th>
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
                        <button type="button" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Klanten Table -->
    <div id="klantenTable" class="table-container" style="display: none;">
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
                        <button type="button" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Restaurants Table -->
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
                    <th></th>
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
                        <button type="button" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
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
                    <th></th>
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
                        <button type="button" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>        
</div>