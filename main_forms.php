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
    <?php include_once 'GUIwidgets/client_navbar.gui.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php 
                if (isset($_POST['CreateBoek'])) {
                    echo "
                        <h3>Boeking Aanvragen</h3>
                        <form action='#' method='post'>
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
                            <button type='submit' class='btn btn-primary'>Aanvragen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditBoek'])) {
                    echo "
                        <h3>Boeking Wijzigen</h3>
                        <form action='#' method='post'>
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
                            <div class'form-group'>
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
                        <form action='#' method='post'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>E-Adres:</label>
                                <input type='text' class='form-control' name='adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>E-mailadres:</label>
                                <input type='email' class='form-control' name='email' placeholder='Email'>
                            </div>
                            <div class='form-group'>
                                <label for='coordinates'>Coördinaten:</label>
                                <input type='text' class='form-control' name='coordinates' placeholder='coordinates'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verzenden</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['EditHerb'])) {
                    echo "
                        <h3>Herberg Wijzigen</h3>
                        <form action='#' method='post'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>E-Adres:</label>
                                <input type='text' class='form-control' name='adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>E-mailadres:</label>
                                <input type='email' class='form-control' name='email' placeholder='Email'>
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
                        <form action='#' method='post'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' value='Name' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>E-Adres:</label>
                                <input type='text' class='form-control' name='adres' value='Adres' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='email'>E-mailadres:</label>
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
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>E-Adres:</label>
                                <input type='text' class='form-control' name='adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>E-mailadres:</label>
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
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>E-Adres:</label>
                                <input type='text' class='form-control' name='adres' placeholder='Adres'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>E-mailadres:</label>
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
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' value='Name' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='adres'>E-Adres:</label>
                                <input type='text' class='form-control' name='adres' value='Adres' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='email'>E-mailadres:</label>
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
                if (isset($_POST['CreateTrack'])) {
                    echo "
                        <h3>Tracker Invoeren</h3>
                        <form action='#' method='post'>
                            <div class='form-group'>
                                <label for='startDate'>StartDatum:</label>
                                <input type='date' class='form-control' name='startDate' placeholder='startDate'>
                            </div>
                            <div class='form-group'>
                                <label for='pincode'>PINCode:</label>
                                <input type='text' class='form-control' name='pincode' placeholder='pincode'>
                            </div>
                            <div class='form-group'>
                                <label for='TochtenID'>E-Tochten ID:</label>
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
                            <div class='form-group'>
                                <label for='startDate'>StartDatum:</label>
                                <input type='date' class='form-control' name='startDate' value='startDate'>
                            </div>
                            <div class='form-group'>
                                <label for='pincode'>PINCode:</label>
                                <input type='text' class='form-control' name='pincode' value='pincode'>
                            </div>
                            <div class='form-group'>
                                <label for='TochtenID'>E-Tochten ID:</label>
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
                            <div class='form-group'>
                                <label for='startDate'>StartDatum:</label>
                                <input type='date' class='form-control' name='startDate' value='startDate' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='pincode'>PINCode:</label>
                                <input type='text' class='form-control' name='pincode' value='pincode' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='TochtenID'>E-Tochten ID:</label>
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
                    echo "
                        <h3>Account Wijzigen</h3>
                        <form action='#' method='post'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' placeholder='Name'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>E-mailadres:</label>
                                <input type='email' class='form-control' name='email' placeholder='Email'>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Mobiel telefoonnummer:</label>
                                <input type='tel' class='form-control' name='phone' placeholder='Phone'>
                            </div>
                            <div class='form-group'>
                                <label for='password'>Wachtwoord:</label>
                                <input type='text' class='form-control' name='password' placeholder='Wachtwoord'>
                            </div>
                            <button type='submit' class='btn btn-primary'>Verwijderen</button>
                        </form>
                    ";
                }
                elseif (isset($_POST['DeleteAccount'])) {
                    echo "
                        <h3>Account Verwijderen</h3>
                        <form action='#' method='post'>
                            <div class='form-group'>
                                <label for='name'>Naam:</label>
                                <input type='text' class='form-control' name='name' value='' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='email'>E-mailadres:</label>
                                <input type='email' class='form-control' name='email' value='' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Mobiel telefoonnummer:</label>
                                <input type='tel' class='form-control' name='phone' value='' readonly>
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