<!-- Signup Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrationModalLabel">Registreren</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<<<<<<< HEAD
                <form method="post" action="config/create.klanten.php">
                    <label>Naam:</label>
                    <input type="text" name="Naam"><br>

                    <label>Email:</label>
                    <input type="text" name="Email"><br>

                    <label>Telefoon:</label>
                    <input type="text" name="Telefoon"><br>

                    <label>Wachtwoord:</label>
                    <input type="password" value="FakePSW" id="myInput" name="Wachtwoord"><br>

                    <input type="submit" name="submit" value="Opslaan">
=======
                <form action="config/createUser.php" method="post">
                    <div class="form-group">
                        <label for="naam">Naam:</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mailadres:</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="wachtwoord">Wachtwoord:</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="telefoon">Mobiel telefoonnummer:</label>
                        <input type="tel" class="form-control" name="phone" placeholder="Phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Verzenden</button>
>>>>>>> master
                </form>
            </div>
        </div>
    </div>
</div>