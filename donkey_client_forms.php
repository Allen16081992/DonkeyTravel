<!-- Dhr. Allen Pieter -->
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
    <?php include_once 'GUIwidgets/client_main_navbar.gui.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php 
                if (isset($_POST['CreateBoek'])) {
                    echo "
                        <h3>Boeking Aanvragen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='CreateBoek'>
                            <div class'form-group'>
                                <div class='form-group'>
                                    <label for='startdatum'>Startdatum:</label>
                                    <input type='date' class='form-control' name='startdatum' placeholder='Selecteer de startdatum'>
                                </div>
                                <label for='tocht'>Tocht:</label>
                                <select class='form-control' name='tocht'>
                                    <option value='tocht1'>Tocht 1</option>
                                    <option value='tocht2'>Tocht 2</option>
                                    <option value='tocht3'>Tocht 3</option>
                                    <option value='tocht4'>Tocht 4</option>
                                </select>
                            </div><br>
                            <button type='submit' class='btn btn-primary'>Aanvragen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditBoek'])) {
                    echo "
                        <h3>Boeking Wijzigen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='EditBoek'>
                            <div class'form-group'>
                                <div class='form-group'>
                                    <label for='startdatum'>Startdatum:</label>
                                    <input type='date' class='form-control' id='startdatum' placeholder='Selecteer de startdatum'>
                                </div>
                                <label for='tocht'>Tocht:</label>
                                <select class='form-control' id='tocht'>
                                    <option value='tocht1'>Tocht 1</option>
                                    <option value='tocht2'>Tocht 2</option>
                                    <option value='tocht3'>Tocht 3</option>
                                    <option value='tocht4'>Tocht 4</option>
                                </select>
                            </div><br>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteBoek'])) {
                    echo "
                        <h3>Boeking Verwijderen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='DeleteBoek'>
                            <div class='form-group'>
                                <div class='form-group'>
                                    <label for='startdatum'>Startdatum:</label>
                                    <input type='date' class='form-control' id='startdatum' placeholder='Selecteer de startdatum'>
                                </div>
                                <div class='form-group'>
                                    <label for='einddatum'>Einddatum:</label>
                                    <input type='date' class='form-control' id='einddatum' placeholder='Selecteer de einddatum'>
                                </div>
                                <label for='tocht'>Tocht:</label>
                                <select class='form-control' id='tocht'>
                                    <option value='tocht1'>Tocht 1</option>
                                    <option value='tocht2'>Tocht 2</option>
                                    <option value='tocht3'>Tocht 3</option>
                                    <option value='tocht4'>Tocht 4</option>
                                </select>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                        </form>
                    ";
                }
                if (isset($_POST['CreateHerb'])) {
                    echo "
                        <h3>Herberg Aanmaken</h3>
                        <form name='AddHerb' action='config/multi_herberg.php' method='post'>
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
                        </form>
                    ";
                }
                elseif (isset($_POST['EditHerb'])) {
                    echo "
                        <h3>Herberg Wijzigen</h3>
                        <form name='EditHerb' action='config/crud_herberg.config.php' method='post'>
                            <input type='hidden' name='EditHerb'>
                            <input type='hidden' name='herb_id' value='<?php= $your_herb_id; ?>'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>Adres:</label>
                                <input type='text' class='form-control' name='adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Emailadres:</label>
                                <input type='email' class='form-control' name='email' placeholder='Email'>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='phone' placeholder='Phone'>
                            </div>
                            <div class='form-group'>
                                <label for='coordinates'>Coördinaten:</label>
                                <input type='text' class='form-control' name='coordinates' placeholder='coordinates'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteHerb'])) {
                    echo "
                        <h3>Herberg Verwijderen</h3>
                        <form name='DeleteHerb' action='config/crud_herberg.config.php' method='post'>
                            <input type='hidden' name='DeleteHerb'>
                            <input type='hidden' name='herb_id' value='<?php= $your_herb_id; ?>'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' value='Name' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>Adres:</label>
                                <input type='text' class='form-control' name='adres' value='Adres' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Emailadres:</label>
                                <input type='email' class='form-control' name='email' value='Email' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='coordinates'>Coördinaten:</label>
                                <input type='text' class='form-control' name='coordinates' value='coordinates' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                        </form>
                    ";
                }
                if (isset($_POST['CreateRest'])) {
                    echo "
                        <h3>Restaurant Aanmaken</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='CreateRest'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>Adres:</label>
                                <input type='text' class='form-control' name='adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Emailadres:</label>
                                <input type='email' class='form-control' name='email' placeholder='Email'>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Mobiel telefoonnummer:</label>
                                <input type='tel' class='form-control' name='phone' placeholder='Phone'>
                            </div>
                            <div class='form-group'>
                                <label for='coordinates'>Coördinaten:</label>
                                <input type='text' class='form-control' name='coordinates' placeholder='coordinates'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditRest'])) {
                    echo "
                        <h3>Restaurant Wijzigen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='EditRest'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>Adres:</label>
                                <input type='text' class='form-control' name='adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Emailadres:</label>
                                <input type='email' class='form-control' name='email' placeholder='Email'>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Mobiel telefoonnummer:</label>
                                <input type='tel' class='form-control' name='phone' placeholder='Phone'>
                            </div>
                            <div class='form-group'>
                                <label for='coordinates'>Coördinaten:</label>
                                <input type='text' class='form-control' name='coordinates' placeholder='coordinates'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteRest'])) {
                    echo "
                        <h3>Restaurant Verwijderen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='DeleteRest'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' value='Name' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>Adres:</label>
                                <input type='text' class='form-control' name='adres' value='Adres' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Emailadres:</label>
                                <input type='email' class='form-control' name='email' value='Email' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Mobiel telefoonnummer:</label>
                                <input type='tel' class='form-control' name='phone' value='Phone' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='coordinates'>Coördinaten:</label>
                                <input type='text' class='form-control' name='coordinates' value='coordinates' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                        </form>
                    ";
                }
                if (isset($_POST['CreateTocht'])) {
                    echo "
                        <h3>Tochten Invoeren</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='CreateTocht'>
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
                        </form>
                    ";
                }
                elseif (isset($_POST['EditTocht'])) {
                    echo "
                        <h3>Tracker Invoeren</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='EditTocht'>
                            <div class='form-group'>
                                <label for='Omschrijving'>Example textarea</label>
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
                            <button type='submit' class='btn btn-primary'>Wijzigen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteTocht'])) {
                    echo "
                        <h3>Tracker Invoeren</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='DeleteTocht'>
                            <div class='form-group'>
                                <label for='Omschrijving'>Example textarea</label>
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
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                        </form>
                    ";
                }
                if (isset($_POST['CreateTrack'])) {
                    echo "
                        <h3>Tracker Invoeren</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='CreateTrack'>
                            <div class='form-group'>
                                <label for='startDate'>StartDatum:</label>
                                <input type='date' class='form-control' name='startDate' placeholder='startDate'>
                            </div>
                            <div class='form-group'>
                                <label for='pincode'>PINCode:</label>
                                <input type='text' class='form-control' name='pincode' placeholder='pincode'>
                            </div>
                            <div class='form-group'>
                                <label for='TochtenID'>Tochten ID:</label>
                                <input type='text' class='form-control' name='TochtenID' placeholder='TochtenID'>
                            </div>
                            <div class='form-group'>
                                <label for='KlantenID'>Klanten ID:</label>
                                <input type='text' class='form-control' name='KlantenID' placeholder='KlantenID'>
                            </div>
                            <div class='form-group'>
                                <label for='StatussenID'>Statussen ID:</label>
                                <input type='text' class='form-control' name='StatussenID' placeholder='StatussenID'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditTrack'])) {
                    echo "
                        <h3>Tracker Wijzigen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='EditTrack'>
                            <div class='form-group'>
                                <label for='startDate'>StartDatum:</label>
                                <input type='date' class='form-control' name='startDate' value='startDate'>
                            </div>
                            <div class='form-group'>
                                <label for='pincode'>PINCode:</label>
                                <input type='text' class='form-control' name='pincode' value='pincode'>
                            </div>
                            <div class='form-group'>
                                <label for='TochtenID'>Tochten ID:</label>
                                <input type='text' class='form-control' name='TochtenID' value='TochtenID'>
                            </div>
                            <div class='form-group'>
                                <label for='KlantenID'>Klanten ID:</label>
                                <input type='text' class='form-control' name='KlantenID' value='KlantenID'>
                            </div>
                            <div class='form-group'>
                                <label for='StatussenID'>Statussen ID:</label>
                                <input type='text' class='form-control' name='StatussenID' value='StatussenID'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteTrack'])) {
                    echo "
                        <h3>Tracker Verwijderen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='DeleteTrack'>
                            <div class='form-group'>
                                <label for='startDate'>StartDatum:</label>
                                <input type='date' class='form-control' name='startDate' value='startDate' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='pincode'>PINCode:</label>
                                <input type='text' class='form-control' name='pincode' value='pincode' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='TochtenID'>Tochten ID:</label>
                                <input type='text' class='form-control' name='TochtenID' value='TochtenID' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='KlantenID'>Klanten ID:</label>
                                <input type='text' class='form-control' name='KlantenID' value='KlantenID' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='StatussenID'>Statussen ID:</label>
                                <input type='text' class='form-control' name='StatussenID' value='StatussenID' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                        </form>
                    ";
                }
                if (isset($_POST['EditAccount'])) {
                    // Create an instance of the viewRowInfo class
                    require_once 'config/view.RowInfo.php'; 
                    $viewRowInfo = new viewRowInfo();
                
                    $rowID = $_POST['row_id'];
                    $rowData = $viewRowInfo->fetchInfo($rowID);

                    echo "
                        <h3>Account Wijzigen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='id' value='".(isset($rowData['ID']) ? $rowID : $_SESSION["klant_id"])."'>
                            <input type='hidden' name='EditAccount'>
                            <div class='form-group'>
                                <label for='Naam'>Naam:</label>
                                <input type='text' class='form-control' name='Naam' value='{$rowData['Naam']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Email'>Emailadres:</label>
                                <input type='email' class='form-control' name='Email' value='{$rowData['Email']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Telefoon'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='Telefoon' value='{$rowData['Telefoon']}'>
                            </div>
                            <div class='form-group'>
                                <label for='Wachtwoord'>Wachtwoord:</label>
                                <input type='password' class='form-control' name='Wachtwoord' placeholder='{$rowData['Wachtwoord']}'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteAccount'])) {
                    // Create an instance of the viewRowInfo class
                    require_once 'config/view.RowInfo.php'; 
                    $viewRowInfo = new viewRowInfo();
                
                    $rowID = $_POST['row_id'];
                    $rowData = $viewRowInfo->fetchInfo($rowID);
                
                    echo "
                        <h3>Account Verwijderen</h3>
                        <form action='#' method='post'>
                            <input type='hidden' name='DeleteAccount'>
                            <div class='form-group'>
                                <label for='ID'>ID:</label>
                                <input type='text' class='form-control' name='ID' value='{$rowData['ID']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' value='{$rowData['Naam']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Emailadres:</label>
                                <input type='email' class='form-control' name='email' value='{$rowData['Email']}' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Telefoonnummer:</label>
                                <input type='tel' class='form-control' name='phone' value='{$rowData['Telefoon']}' readonly>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
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