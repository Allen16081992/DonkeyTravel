<!-- Dhr. Allen Pieter -->
<?php include_once 'config/classes/session_management.class.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Gegevens Aanpassen</title>
</head>
<body>
    <!-- Navigation Bar -->
    <?php 
        include_once 'GUIwidgets/client_main_navbar.gui.php'; 
        require_once 'config/view.RowInfo.php'; 
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php 
                if (isset($_POST['CreateBoek'])) {
                    require_once 'config/view.tochten.php';
                    echo "<h3>Boeking Aanvragen</h3>
                        <form action='config/classes/boeking.config.php' method='post'>
                            <input type='hidden' name='AddBoek'>
                            <div class='form-group'>
                                <label for='StartDatum'>Startdatum:</label>
                                <input type='date' class='form-control' name='StartDatum' placeholder='Selecteer een datum'>
                            </div>
                            <div class='form-group'>
                                <label for='Tocht'>Tocht:</label>
                                <select class='form-control' name='Tocht'>";
                                // Loop through records
                                foreach ($allTocht['records'] as $optionRecord) {
                                    echo '<option value="' . $optionRecord['ID'] . '">' . $optionRecord['Route'] . '</option>';
                                }
                    echo "</select>
                            </div>
                            <button type='submit' class='btn btn-primary'>Aanvragen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditBoek'])) {
                    require_once 'config/view.tochten.php';
                    echo "<h3>Boeking Wijzigen</h3>
                        <form action='config/classes/boeking.config.php' method='post'>
                            <input type='hidden' name='EditBoek'>
                            <input type='hidden' name='boek_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='StartDatum'>Startdatum:</label>
                                <input type='date' class='form-control' name='StartDatum' value='{$data['StartDatum']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Tocht'>Tocht:</label>
                                <select class='form-control' name='Tocht'>";
                                // Loop through records
                                foreach ($allTocht['records'] as $optionRecord) {
                                    echo '<option value="' . $optionRecord['ID'] . '">' . $optionRecord['Route'] . '</option>';
                                }
                    echo "</select>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteBoek'])) {
                    require_once 'config/view.tochten.php';
                    echo "<h3>Boeking Verwijderen</h3>
                        <form action='config/classes/boeking.config.php' method='post'>
                            <input type='hidden' name='DeleteBoek'>
                            <input type='hidden' name='boek_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='StartDatum'>Startdatum:</label>
                                <input type='date' class='form-control' name='StartDatum' value='{$data['StartDatum']}' readonly>
                            </div>";
                    echo "
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                if (isset($_POST['CreateHerb'])) {
                    echo "
                        <h3>Herberg Aanmaken</h3>
                        <form name='AddHerb' action='config/classes/herberg.config.php' method='post'>
                            <input type='hidden' name='AddHerb'>
                            <div class='form-group'>
                                <label for='Naam'>Naam:</label>
                                <input type='text' class='form-control' name='Naam' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='Adres'>Adres:</label>
                                <input type='text' class='form-control' name='Adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='Email'>Emailadres:</label>
                                <input type='email' class='form-control' name='Email' placeholder='Email'>
                            </div>
                            <div class='form-group'>
                                <label for='Telefoon'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='Telefoon' placeholder='Phone'>
                            </div>
                            <div class='form-group'>
                                <label for='Latlon'>Coördinaten:</label>
                                <input type='text' class='form-control' name='Latlon' placeholder='coordinates'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditHerb'])) {
                    echo "
                        <h3>Herberg Wijzigen</h3>
                        <form name='EditHerb' action='config/classes/herberg.config.php' method='post'>
                            <input type='hidden' name='EditHerb'>
                            <input type='hidden' name='herb_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='{$data['Naam']}'>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>Adres:</label>
                                <input type='text' class='form-control' name='adres' placeholder='{$data['Adres']}'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Emailadres:</label>
                                <input type='email' class='form-control' name='email' placeholder='{$data['Email']}'>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='phone' placeholder='{$data['Telefoon']}'>
                            </div>
                            <div class='form-group'>
                                <label for='coordinates'>Coördinaten:</label>
                                <input type='text' class='form-control' name='coordinates' placeholder='{$data['Coordinaten']}'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteHerb'])) {
                    echo "
                        <h3>Herberg Verwijderen</h3>
                        <form name='DeleteHerb' action='config/classes/herberg.config.php' method='post'>
                            <input type='hidden' name='DeleteHerb'>
                            <input type='hidden' name='herb_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='Naam'>Naam:</label>
                                <input type='text' class='form-control' name='Naam' value='{$data['Naam']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Adres'>Adres:</label>
                                <input type='text' class='form-control' name='Adres' value='{$data['Adres']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Email'>Emailadres:</label>
                                <input type='email' class='form-control' name='Email' value='{$data['Email']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Telefoon'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='Telefoon' value='{$data['Telefoon']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Coordinaten'>Coördinaten:</label>
                                <input type='text' class='form-control' name='Coordinaten' value='{$data['Coordinaten']}' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                if (isset($_POST['EditKlant'])) {
                    echo "
                        <h3>Account Wijzigen</h3>
                        <form action='config/update_DeleteKlant.php' method='post'>
                            <input type='hidden' name='EditKlant'>
                            <input type='hidden' name='klant_id' value='".(isset($data['ID']) ? $data['ID'] : $_SESSION["klant_id"])."'>
                            <div class='form-group'>
                                <label for='Naam'>Naam:</label>
                                <input type='text' class='form-control' name='Naam' value='{$data['Naam']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Email'>Emailadres:</label>
                                <input type='email' class='form-control' name='Email' value='{$data['Email']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Telefoon'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='Telefoon' value='{$data['Telefoon']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Wachtwoord'>Wachtwoord:</label>
                                <input type='password' class='form-control' name='Wachtwoord' value='{$data['Wachtwoord']}'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteKlant'])) {        
                    echo "
                        <h3>Account Verwijderen</h3>
                        <form action='config/update_DeleteKlant.php' method='post'>
                            <input type='hidden' name='DeleteKlant'>
                            <input type='hidden' name='klant_id' value='".(isset($data['ID']) ? $data['ID'] : $_SESSION["klant_id"])."'>
                            <div class='form-group'>
                                <label for='Naam'>Naam:</label>
                                <input type='text' class='form-control' name='Naam' value='{$data['Naam']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Email'>Emailadres:</label>
                                <input type='email' class='form-control' name='Email' value='{$data['Email']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Telefoon'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='Telefoon' value='{$data['Telefoon']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Wachtwoord'>Wachtwoord:</label>
                                <input type='password' class='form-control' name='Wachtwoord' value='{$data['Wachtwoord']}' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                } 
                if (isset($_POST['CreateRest'])) {
                    echo "
                        <h3>Restaurant Aanmaken</h3>
                        <form action='config/create.restaurant.php' method='post'>
                            <input type='hidden' name='CreateRest'>
                            <div class='form-group'>
                                <label for='Naam'>Naam:</label>
                                <input type='text' class='form-control' name='Naam' placeholder='Naam'>
                            </div>
                            <div class='form-group'>
                                <label for='Adres'>Adres:</label>
                                <input type='text' class='form-control' name='Adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='Email'>Emailadres:</label>
                                <input type='Email' class='form-control' name='Email' placeholder='Email'>
                            </div>
                            <div class='form-group'>
                                <label for='Telefoon'>Mobiel telefoonnummer:</label>
                                <input type='telefoon' class='form-control' name='Telefoon' placeholder='Telefoon'>
                            </div>
                            <div class='form-group'>
                                <label for='Coordinaten'>Coördinaten:</label>
                                <input type='text' class='form-control' name='Coordinaten' placeholder='Coordinaten'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditRest'])) {        
                    echo "
                        <h3>Restaurant Wijzigen</h3>
                        <form action='config/update.restaurant.php' method='post'>
                            <input type='hidden' name='EditRest'>
                            <input type='hidden' name='rest_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='Naam'>Naam:</label>
                                <input type='text' class='form-control' name='Naam' value='{$data['Naam']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Adres'>Adres:</label>
                                <input type='text' class='form-control' name='Adres' value='{$data['Adres']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Email'>Emailadres:</label>
                                <input type='email' class='form-control' name='Email' value='{$data['Email']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Telefoon'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='Telefoon' value='{$data['Telefoon']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Coordinaten'>Coördinaten:</label>
                                <input type='text' class='form-control' name='Coordinaten' value='{$data['Coordinaten']}'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteRest'])) {
                    echo "
                        <h3>Restaurant Verwijderen</h3>
                        <form action='config/delete.restaurant.php' method='post'>
                            <input type='hidden' name='DeleteRest'>
                            <input type='hidden' name='rest_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='Naam'>Naam:</label>
                                <input type='text' class='form-control' name='Naam' value='{$data['Naam']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Adres'>Adres:</label>
                                <input type='text' class='form-control' name='Adres' value='{$data['Adres']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Email'>Emailadres:</label>
                                <input type='email' class='form-control' name='Email' value='{$data['Email']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Telefoon'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='Telefoon' value='{$data['Telefoon']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Coordinaten'>Coördinaten:</label>
                                <input type='text' class='form-control' name='Coordinaten' value='{$data['Coordinaten']}' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                if (isset($_POST['CreateStat'])) {
                    echo "
                        <h3>Status Aanmaken</h3>
                        <form action='config/classes/status.config.php' method='post'>
                            <input type='hidden' name='AddStat'>
                            <div class='form-group'>
                                <label for='StatusCode'>Status Code:</label>
                                <input type='tel' class='form-control' name='StatusCode' placeholder='Statuscode'>
                            </div>
                            <div class='form-group'>
                                <label for='Status'>Status:</label>
                                <input type='text' class='form-control' name='Status' placeholder='Offerte'>
                            </div>
                            <div class='form-group'>
                                <input type='checkbox' name='Verwijderbaar'>
                                <label for='Verwijderbaar'>Verwijderbaar:</label>
                            </div>
                            <div class='form-group'>
                                <input type='checkbox' name='PIN'>
                                <label for='PIN'>PIN Toekennen:</label>
                            </div>
                            <button type='submit' class='btn btn-primary'>Bewaren</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditStat'])) {        
                    echo "
                        <h3>Status Wijzigen</h3>
                        <form action='config/classes/status.config.php' method='post'>
                            <input type='hidden' name='EditStat'>
                            <input type='hidden' name='status_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='StatusCode'>Status Code:</label>
                                <input type='tel' class='form-control' name='StatusCode' value='{$data['StatusCode']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Status'>Status:</label>
                                <input type='text' class='form-control' name='Status' value='{$data['Status']}'>
                            </div>
                            <div class='form-group'>
                                <input type='checkbox' name='Verwijderbaar' value='1'>
                                <label for='Verwijderbaar'>Verwijderbaar</label>
                            </div>
                            <div class='form-group'>
                                <input type='checkbox' name='PIN' value='1'>
                                <label for='PIN'>PIN Toekennen</label>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteStat'])) {
                    echo "
                        <h3>Status Verwijderen</h3>
                        <form action='config/classes/status.config.php' method='post'>
                            <input type='hidden' name='DeleteStat'>
                            <input type='hidden' name='status_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='StatusCode'>Status Code:</label>
                                <input type='tel' class='form-control' name='StatusCode' value='{$data['StatusCode']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Status'>Status:</label>
                                <input type='text' class='form-control' name='Status' value='{$data['Status']}' readonly>
                            </div>
                            <div class='form-group'>
                                <input type='hidden' name='Verwijderbaar'> 
                                <label for='Verwijderbaar'>Verwijderbaar:</label>";
                                if (isset($data['Verwijderbaar'])) { echo ' <strong>Ja</strong>'; } else { echo ' <strong>Nee</strong>'; };
                        echo"
                            </div>
                            <div class='form-group'>
                                <input type='hidden' name='PIN'>
                                <label for='PIN'>PIN Toegekend:</label>";
                        if (isset($data['Verwijderbaar'])) { echo ' <strong>Ja</strong>'; } else { echo ' <strong>Nee</strong>'; };
                        echo"
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                if (isset($_POST['CreatePauze'])) {
                    echo "
                        <h3>Status Aanmaken</h3>
                        <form action='config/classes/status.config.php' method='post'>
                            <input type='hidden' name='AddPauze'>
                            <div class='form-group'>
                                <label for='StatusCode'>Status Code:</label>
                                <input type='tel' class='form-control' name='StatusCode' placeholder='Statuscode'>
                            </div>
                            <div class='form-group'>
                                <label for='Status'>Status:</label>
                                <input type='text' class='form-control' name='Status' placeholder='Offerte'>
                            </div>
                            <div class='form-group'>
                                <input type='checkbox' name='Verwijderbaar'>
                                <label for='Verwijderbaar'>Verwijderbaar:</label>
                            </div>
                            <div class='form-group'>
                                <input type='checkbox' name='PIN'>
                                <label for='PIN'>PIN Toekennen:</label>
                            </div>
                            <button type='submit' class='btn btn-primary'>Bewaren</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditPauze'])) {        
                    echo "
                        <h3>Status Wijzigen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='EditPauze'>
                            <input type='hidden' name='status_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='StatusCode'>Status Code:</label>
                                <input type='tel' class='form-control' name='StatusCode' value='{$data['FKboekingenID']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Status'>Status:</label>
                                <input type='text' class='form-control' name='Status' value='{$data['FKrestaurantsID']}'>
                            </div>
                            <div class='form-group'>
                                <input type='checkbox' name='Verwijderbaar' value='{$data['FKstatussenID']}'>
                                <label for='Verwijderbaar'>Verwijderbaar</label>
                            </div>
                            <div class='form-group'>
                                <input type='checkbox' name='PIN' value='1'>
                                <label for='PIN'>PIN Toekennen</label>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeletePauze'])) {
                    echo "
                        <h3>Status Verwijderen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='DeletePauze'>
                            <input type='hidden' name='status_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='StatusCode'>Status Code:</label>
                                <input type='tel' class='form-control' name='StatusCode' value='{$data['FKboekingenID']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Status'>Status:</label>
                                <input type='text' class='form-control' name='Status' value='{$data['FKrestaurantsID']}' readonly>
                            </div>
                            <div class='form-group'>
                                <input type='hidden' name='Verwijderbaar'> 
                                <label for='Verwijderbaar'>Verwijderbaar:</label>";
                                if (isset($data['Verwijderbaar'])) { echo ' <strong>Ja</strong>'; } else { echo ' <strong>Nee</strong>'; };
                        echo"
                            </div>
                            <div class='form-group'>
                                <input type='hidden' name='PIN'>
                                <label for='PIN'>PIN Toegekend:</label>";
                        if (isset($data['Verwijderbaar'])) { echo ' <strong>Ja</strong>'; } else { echo ' <strong>Nee</strong>'; };
                        echo"
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                if (isset($_POST['CreateTocht'])) {
                    echo "
                        <h3>Tochten Invoeren</h3>
                        <form action='config/classes/tochten.config.php' method='post'>
                            <input type='hidden' name='AddTocht'>
                            <div class='form-group'>
                                <label for='Omschrijving'>Omschrijving</label>
                                <textarea class='form-control' name='Omschrijving' rows='2'></textarea>
                            </div>
                            <div class='form-group'>
                                <label for='Route'>Route:</label>
                                <input type='text' class='form-control' name='Route' placeholder='Route'>
                            </div>
                            <div class='form-group'>
                                <label for='AantalDagen'>AantalDagen:</label>
                                <input type='text' class='form-control' name='AantalDagen' placeholder='AantalDagen'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditTocht'])) {
                    echo "
                        <h3>Tochten Wijzigen</h3>
                        <form action='config/classes/tochten.config.php' method='post'>
                            <input type='hidden' name='EditTocht'>
                            <input type='hidden' name='tocht_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='Omschrijving'>Example textarea</label>
                                <textarea class='form-control' name='Omschrijving' rows='2'>{$data['Omschrijving']}</textarea>
                            </div>
                            <div class='form-group'>
                                <label for='Route'>Route:</label>
                                <input type='text' class='form-control' name='Route' value='{$data['Route']}'>
                            </div>
                            <div class='form-group'>
                                <label for='AantalDagen'>AantalDagen:</label>
                                <input type='text' class='form-control' name='AantalDagen' value='{$data['AantalDagen']}'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteTocht'])) {
                    echo "
                        <h3>Tochten Verwijderen</h3>
                        <form name='DeleteTocht' action='config/classes/tochten.config.php' method='post'>
                            <input type='hidden' name='DeleteTocht'>
                            <input type='hidden' name='tocht_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='Omschrijving'>Example textarea</label>
                                <textarea class='form-control' name='Omschrijving' rows='2' readonly>{$data['Omschrijving']}</textarea>
                            </div>
                            <div class='form-group'>
                                <label for='Route'>Route:</label>
                                <input type='text' class='form-control' name='Route' value='{$data['Route']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='AantalDagen'>AantalDagen:</label>
                                <input type='text' class='form-control' name='AantalDagen' value='{$data['AantalDagen']}' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                if (isset($_POST['CreateTrack'])) {
                    echo "
                        <h3>Tracker Invoeren</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='EditTrack'>
                            <div class='form-group'>
                                <label for='Pincode'>Pincode:</label>
                                <input type='tel' class='form-control' name='Pincode'>
                            </div>
                            <div class='form-group'>
                                <label for='Breedtegraad'>Breedtegraad:</label>
                                <input type='text' class='form-control' name='Breedtegraad'>
                            </div>
                            <div class='form-group'>
                                <label for='Lengtegraad'>Lengtegraad:</label>
                                <input type='text' class='form-control' name='Lengtegraad'>
                            </div>
                            <div class='form-group'>
                                <label for='Tijd'>Tijd:</label>
                                <input type='text' class='form-control' name='Tijd'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditTrack'])) {
                    echo "
                        <h3>Tracker Wijzigen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='EditTrack'>
                            <input type='hidden' name='track_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='Pincode'>Pincode:</label>
                                <input type='tel' class='form-control' name='Pincode' value='{$data['PINCode']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Breedtegraad'>Breedtegraad:</label>
                                <input type='text' class='form-control' name='Breedtegraad' value='{$data['StartLat']},{$data['StartLon']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Lengtegraad'>Lengtegraad:</label>
                                <input type='text' class='form-control' name='Lengtegraad' value='{$data['EndLat']},{$data['EndLon']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Tijd'>Tijd:</label>
                                <input type='text' class='form-control' name='Tijd' value='{$data['Time']}'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteTrack'])) {
                    echo "
                        <h3>Tracker Verwijderen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='DeleteTrack'>
                            <input type='hidden' name='track_id' value='{$data['ID']}'>
                            <div class='form-group'>
                                <label for='Pincode'>Pincode:</label>
                                <input type='tel' class='form-control' name='Pincode' value='{$data['PINCode']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Breedtegraad'>Breedtegraad:</label>
                                <input type='text' class='form-control' name='Breedtegraad' value='{$data['StartLat']},{$data['StartLon']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Lengtegraad'>Lengtegraad:</label>
                                <input type='text' class='form-control' name='Lengtegraad' value='{$data['EndLat']},{$data['EndLon']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='Tijd'>Tijd:</label>
                                <input type='text' class='form-control' name='Tijd' value='{$data['Time']}' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Annuleren</a>
                        </form>
                    ";
                }
                elseif (isset($_POST['loginPIN'])) {
                    echo "
                        <h3>Donkey Travel Follow Me Aanmelden</h3>
                        <form action='config/classes/pincode.config.php' method='post'>
                            <input type='hidden' name='loginPIN' value='{$_SESSION['klant_id']}'>
                            <span>Let op: Vul NIET uw pincode van uw betaalpas in.</span>
                            <div class='form-group'>
                                <label for='Pincode'>Boeking Pincode:</label>
                                <input type='tel' class='form-control' name='Pincode'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Aanmelden</button>
                            <a href='donkey_client.php' class='btn btn-primary'>Terug</a>
                        </form>
                    ";          
                }
            ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>