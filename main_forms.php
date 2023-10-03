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
                    echo "Loading form...";
                }
                elseif (isset($_POST['EditBoek'])) {
                    echo "
                        <h3>Boeking Wijzigen</h3>
                        <form>
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
                        <form>
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
                else {
                    echo "I don't see values.";
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