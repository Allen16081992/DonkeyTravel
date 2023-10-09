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
<br><strong>Note: Let op! Omdat we nu alleen 'herbergen' kunnen ophalen, staat het overal.</strong>

<!-- Boekingen -->
<div id="boekingTable" class="table-container">
    <h3>Boekingen</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <?php
                    foreach ($allInfo['columns'] as $Bcolumn) {
                        echo "<th>$Bcolumn</th>";
                    }
                ?>
                <th>
                    <form id="AddBoek" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateBoek" value="CreateBoek" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allInfo['records'] as $Brecord) {
                    echo "<tr>";
                    foreach ($allInfo['columns'] as $Bcolumn) {
                        echo "<td>{$Brecord[$Bcolumn]}</td>";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$Brecord['ID'].'">
                            <button type="submit" name="EditBoek" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeleteBoek" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Herbergen -->
<div id="herbergTable" class="table-container" style="display: none;">
    <h3>Herbergen</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr id="table-headers">
                <?php
                    if (!empty($allInfo)) {
                        foreach ($allInfo['columns'] as $Hcolumn) {
                            echo "<th>$Hcolumn</th>";
                        }
                    }
                ?>
                <th>
                    <form id="AddHerb" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateHerb" value="CreateHerb" class="btn btn-outline-info btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allInfo['records'] as $Hrecord) {
                    echo "<tr>";
                    foreach ($allInfo['columns'] as $Hcolumn) {
                        echo "<td>{$Hrecord[$Hcolumn]}</td>";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$Hrecord['ID'].'">
                            <button type="submit" name="EditHerb" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeleteHerb" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Klanten -->
<div id="klantTable" class="table-container" style="display: none;">
    <h3>Klanten</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <?php
                    foreach ($allKlant['columns'] as $Kcolumn) {
                        echo "<th>$Kcolumn</th>";
                    }
                ?>
                <th>
                    <form id="AddKlant" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateKlant" value="CreateKlant" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allKlant['records'] as $Krecord) {
                    echo "<tr>";
                    foreach ($allKlant['columns'] as $Kcolumn) {
                        echo "<td>{$Krecord[$Kcolumn]}</td>";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$Krecord['ID'].'">
                            <button type="submit" name="EditKlant" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeleteKlant" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Overnachting -->
<div id="overnachtTable" class="table-container" style="display: none;">
    <h3>Overnachting</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <?php
                    foreach ($allInfo['columns'] as $Ocolumn) {
                        echo "<th>$Ocolumn</th>";
                    }
                ?>
                <th></th>
                <th></th>
                <th>
                    <form id="AddOvernacht" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateOvern" value="CreateOvern" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allInfo['records'] as $Orecord) {
                    echo "<tr>";
                    foreach ($allInfo['columns'] as $Ocolumn) {
                        echo "<td>{$Orecord[$Ocolumn]}</td>";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$Orecord['ID'].'">
                            <button type="submit" name="EditOvern" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeleteOvern" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Pauzeplaats -->
<div id="pauzeTable" class="table-container" style="display: none;">
    <h3>Pauzeplaats</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <?php
                    foreach ($allInfo['columns'] as $Pcolumn) {
                        echo "<th>$Pcolumn</th>";
                    }
                ?>
                <th></th>
                <th></th>
                <th>
                    <form id="AddPauze" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreatePauze" value="CreatePauze" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allInfo['records'] as $Precord) {
                    echo "<tr>";
                    foreach ($allInfo['columns'] as $Pcolumn) {
                        echo "<td>{$Precord[$Pcolumn]}</td>";
                        echo "
                            <td></td>
                            <td></td>
                        ";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$Precord['ID'].'">
                            <button type="submit" name="EditPauze" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeletePauze" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Restaurants -->
<div id="restaurantsTable" class="table-container" style="display: none;">
    <h3>Restaurants</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <?php
                    foreach ($allInfo['columns'] as $Rcolumn) {
                        echo "<th>$Rcolumn</th>";
                    }
                ?>
                <th>
                    <form id="AddRest" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateRest" value="CreateRest" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allInfo['records'] as $Rrecord) {
                    echo "<tr>";
                    foreach ($allInfo['columns'] as $Rcolumn) {
                        echo "<td>{$Rrecord[$Rcolumn]}</td>";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$Rrecord['ID'].'">
                            <button type="submit" name="EditRest" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeleteRest" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Statussen -->
<div id="statusTable" class="table-container" style="display: none;">
    <h3>Statussen</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <?php
                    foreach ($allInfo['columns'] as $Scolumn) {
                        echo "<th>$Scolumn</th>";
                    }
                ?>
                <th></th>
                <th>
                    <form id="AddStatus" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateStatus" value="CreateStatus" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allInfo['records'] as $Srecord) {
                    echo "<tr>";
                    foreach ($allInfo['columns'] as $Scolumn) {
                        echo "<td>{$Srecord[$Scolumn]}</td>";
                        echo "<td></td>";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$Srecord['ID'].'">
                            <button type="submit" name="EditStatus" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeleteStatus" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Tochten -->
<div id="tochtTable" class="table-container" style="display: none;">
    <h3>Tochten</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <?php
                    foreach ($allInfo['columns'] as $TOcolumn) {
                        echo "<th>$TOcolumn</th>";
                    }
                ?>
                <th></th>
                <th></th>
                <th>
                    <form id="AddTocht" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateTocht" value="CreateTocht" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allInfo['records'] as $TOrecord) {
                    echo "<tr>";
                    foreach ($allInfo['columns'] as $TOcolumn) {
                        echo "<td>{$TOrecord[$TOcolumn]}</td>";
                        echo "
                            <td></td>
                            <td></td>
                        ";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$TOrecord['ID'].'">
                            <button type="submit" name="EditTocht" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeleteTocht" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Trackers -->
<div id="trackersTable" class="table-container" style="display: none;">
    <h3>Tracker</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <?php
                    foreach ($allInfo['columns'] as $TRcolumn) {
                        echo "<th>$TRcolumn</th>";
                    }
                ?>
                <th>
                    <form id="AddTrack" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateTrack" value="CreateTrack" class="btn btn-outline-secondary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($allInfo['records'] as $TRrecord) {
                    echo "<tr>";
                    foreach ($allInfo['columns'] as $TRcolumn) {
                        echo "<td>{$TRrecord[$TRcolumn]}</td>";
                    }
                    echo '<td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="row_id" value="'.$TRrecord['ID'].'">
                            <button type="submit" name="EditTrack" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                            <button type="submit" name="DeleteTrack" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                        </form>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>