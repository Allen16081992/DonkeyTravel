<!-- Buttons for switching tables -->
<div class="btn-group mb-3" role="group" aria-label="Table Selection">
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#boekingTable">Boekingen</button>
    <button type="button" class="btn btn-primary" data-toggle="table" data-target="#klantTable">Account</button>
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
                <th>Tocht</th>
                <th></th>
                <th>Status</th>
                <th>
                    <form id="AddBoek" action="donkey_client_forms.php" method="post">
                        <button type="submit" name="CreateBoek" value="CreateBoek" class="btn btn-outline-info btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                        </button>
                    </form>                  
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (!isset($allBoek) && !isset($allTocht)) {
                    echo "
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    ";
                } else {
                    foreach ($allBoek['records'] as $Brecord) {
                        echo "<tr>";
                        
                        // Display specific columns
                        echo "<td>{$Brecord['ID']}</td>";
                        echo "<td>{$Brecord['StartDatum']}</td>
                        <td></td>
                        <td></td>
                        <td></td>";
                        //echo "<td>{$TOrecord['Route']}</td>";
                        echo "<td>{$Brecord['FKstatussenID']}</td>";
                    
                        echo '<td>
                            <form action="donkey_client_forms.php" method="post">
                                <input type="hidden" name="boek_id" value="'.$Brecord['ID'].'">
                                <button type="submit" name="EditBoek" class="btn btn-outline-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg></button>
                                <button type="submit" name="DeleteBoek" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                            </form>
                            </td>
                        </tr>';
                    }
                    
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
                <th>ID</th>						
                <th>Naam</th>
                <th>Mijn Account...</th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo '<tr>
                    <td>'.$_SESSION['klant_id'].'</td>
                    <td>'.$_SESSION['klant_naam'].'</td>
                    <td>
                        <form action="donkey_client_forms.php" method="post">
                            <input type="hidden" name="klant_id" value="'.$_SESSION['klant_id'].'">
                            <button type="submit" name="EditKlant" class="btn btn-outline-secondary btn-sm">Wijzigen</button>
                            <button type="submit" name="DeleteKlant" class="btn btn-outline-danger btn-sm">Verwijderen</button>
                        </form>
                    </td>
                </tr>';
            ?>
        </tbody>
    </table>
</div>